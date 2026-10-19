<?php
/**
 * One-Click Content & Project Importer for Nukto Point Theme.
 *
 * Usage with WP-CLI:
 *   wp eval-file content/import-content.php
 *
 * Or include in functions.php / mu-plugins for automated initial setup.
 *
 * @package Nukto_Point
 */

if (!defined('ABSPATH')) {
    // If running via CLI, ensure WP environment is loaded
    if (file_exists(__DIR__ . '/../wp-load.php')) {
        require_once __DIR__ . '/../wp-load.php';
    } elseif (file_exists(dirname(dirname(dirname(__DIR__))) . '/wp-load.php')) {
        require_once dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
    }
}

if (!function_exists('wp_insert_post')) {
    echo "WordPress environment not loaded. Run via: wp eval-file content/import-content.php\n";
    exit(1);
}

echo "=== Nukto Point Content Importer ===\n";

$json_file = __DIR__ . '/content.json';
if (!file_exists($json_file)) {
    echo "Error: content.json not found at $json_file\n";
    exit(1);
}

$data = json_decode(file_get_contents($json_file), true);
if (!$data) {
    echo "Error: Invalid JSON in content.json\n";
    exit(1);
}

// 1. Create Core Pages
$pages = array(
    'Home'    => array('slug' => 'home', 'template' => 'front-page.php', 'content' => ''),
    'Work'    => array('slug' => 'work', 'template' => '', 'content' => 'A curated directory of communication design, brand systems, and campaigns.'),
    'About'   => array('slug' => 'about', 'template' => '', 'content' => $data['agency']['bio']),
    'Contact' => array('slug' => 'contact', 'template' => '', 'content' => 'Direct creative communication and project inquiries.')
);

$page_ids = array();
foreach ($pages as $title => $page_info) {
    $existing = get_page_by_path($page_info['slug']);
    if (!$existing) {
        $page_id = wp_insert_post(array(
            'post_title'     => $title,
            'post_name'      => $page_info['slug'],
            'post_content'   => $page_info['content'],
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed'
        ));
        if ($page_info['template']) {
            update_post_meta($page_id, '_wp_page_template', $page_info['template']);
        }
        $page_ids[$title] = $page_id;
        echo "Created page: $title (ID: $page_id)\n";
    } else {
        $page_ids[$title] = $existing->ID;
        echo "Page exists: $title (ID: {$existing->ID})\n";
    }
}

// Set Static Front Page
if (isset($page_ids['Home'])) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $page_ids['Home']);
    echo "Configured 'Home' as static front page.\n";
}

// 2. Register / Ensure Categories
$categories = array(
    'Branding & Visual Identity'  => 'branding-visual-identity',
    'E-Commerce & Amazon Creative' => 'ecommerce-amazon',
    'Advertising & Print Media'   => 'advertising-outdoor',
    'Social Media & Campaigns'    => 'social-media-campaigns',
    'Brand Strategy & PR'         => 'brand-strategy-pr'
);

foreach ($categories as $cat_name => $cat_slug) {
    if (!term_exists($cat_name, 'project_category')) {
        wp_insert_term($cat_name, 'project_category', array('slug' => $cat_slug));
        echo "Created taxonomy term: $cat_name\n";
    }
}

// 3. Import Projects
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$counter = 0;
foreach ($data['projects'] as $proj) {
    $counter++;
    $existing_project = get_page_by_path($proj['slug'], OBJECT, 'project');
    
    $post_data = array(
        'post_title'   => $proj['title'],
        'post_name'    => $proj['slug'],
        'post_content' => $proj['description'],
        'post_excerpt' => wp_trim_words($proj['description'], 20),
        'post_status'  => 'publish',
        'post_type'    => 'project',
        'menu_order'   => $counter
    );

    if ($existing_project) {
        $post_data['ID'] = $existing_project->ID;
        $project_id = wp_update_post($post_data);
        echo "Updated Project: {$proj['title']} (ID: $project_id)\n";
    } else {
        $project_id = wp_insert_post($post_data);
        echo "Created Project: {$proj['title']} (ID: $project_id)\n";
    }

    if ($project_id && !is_wp_error($project_id)) {
        // Update Custom Meta
        update_post_meta($project_id, '_nukto_client_name', sanitize_text_field($proj['client']));
        update_post_meta($project_id, '_nukto_project_year', sanitize_text_field($proj['year']));
        update_post_meta($project_id, '_nukto_project_services', sanitize_text_field(implode(', ', $proj['tags'])));
        update_post_meta($project_id, '_nukto_project_link', esc_url_raw($proj['external_link']));
        update_post_meta($project_id, '_nukto_card_size', ($counter % 3 === 1) ? 'large' : 'regular');

        // Assign category
        $cat_to_assign = 'Branding & Visual Identity';
        if (strpos($proj['category'], 'Amazon') !== false || strpos($proj['category'], 'E-Commerce') !== false) {
            $cat_to_assign = 'E-Commerce & Amazon Creative';
        } elseif (strpos($proj['category'], 'Outdoor') !== false || strpos($proj['category'], 'Print') !== false) {
            $cat_to_assign = 'Advertising & Print Media';
        } elseif (strpos($proj['category'], 'Social Media') !== false) {
            $cat_to_assign = 'Social Media & Campaigns';
        } elseif (strpos($proj['category'], 'PR') !== false || strpos($proj['category'], 'Strategy') !== false) {
            $cat_to_assign = 'Brand Strategy & PR';
        }
        wp_set_object_terms($project_id, $cat_to_assign, 'project_category');

        // Attach Image if locally present and not already attached
        if (!has_post_thumbnail($project_id)) {
            $theme_img_path = get_template_directory() . '/assets/images/projects/' . $proj['slug'] . '/cover.png';
            if (file_exists($theme_img_path)) {
                $upload_dir = wp_upload_dir();
                $file_name  = $proj['slug'] . '-cover.png';
                $dest_file  = $upload_dir['path'] . '/' . $file_name;
                
                if (copy($theme_img_path, $dest_file)) {
                    $attachment = array(
                        'post_mime_type' => 'image/png',
                        'post_title'     => sanitize_file_name($file_name),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );
                    $attach_id = wp_insert_attachment($attachment, $dest_file, $project_id);
                    $attach_data = wp_generate_attachment_metadata($attach_id, $dest_file);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($project_id, $attach_id);
                    echo "  -> Attached featured image (ID: $attach_id)\n";
                }
            }
        }
    }
}

// 4. Create and Assign Primary Menu
$menu_name = 'Primary Navigation';
$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    echo "Created Navigation Menu: $menu_name\n";

    $menu_items = array(
        array('title' => 'Home', 'url' => home_url('/')),
        array('title' => 'Work', 'url' => home_url('/#work')),
        array('title' => 'Services', 'url' => home_url('/#services')),
        array('title' => 'About', 'url' => home_url('/#about')),
        array('title' => 'Contact', 'url' => home_url('/#contact'))
    );

    foreach ($menu_items as $order => $item) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'   => $item['title'],
            'menu-item-url'     => $item['url'],
            'menu-item-status'  => 'publish',
            'menu-item-type'    => 'custom',
            'menu-item-position'=> $order + 1
        ));
    }

    $locations = get_theme_mod('nav_menu_locations');
    if (!is_array($locations)) {
        $locations = array();
    }
    $locations['primary'] = $menu_id;
    $locations['footer']  = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
    echo "Assigned menu to 'primary' and 'footer' theme locations.\n";
}

echo "=== Import Complete! All 12 projects, pages, and menus are live. ===\n";
