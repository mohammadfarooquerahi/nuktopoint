<?php
/**
 * Nukto Point Theme Functions and Definitions
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include Module Files
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Theme Setup
 */
function nukto_setup() {
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable Featured Images (Post Thumbnails)
	add_theme_support( 'post-thumbnails' );

	// Custom Image Sizes
	add_image_size( 'nukto-project-cover', 808, 600, true );
	add_image_size( 'nukto-project-wide', 1400, 800, true );
	add_image_size( 'nukto-project-gallery', 1000, 750, true );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'nukto' ),
			'footer'  => __( 'Footer Navigation', 'nukto' ),
		)
	);

	// HTML5 markup support
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Custom Logo Support
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Translation Domain
	load_theme_textdomain( 'nukto', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'nukto_setup' );

/**
 * Custom Clean Navigation Walker for Primary Menu
 */
class Nukto_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * Starts the element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nk-nav-item';
		if ( in_array( 'current-menu-item', $classes, true ) ) {
			$classes[] = 'is-active';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		$atts['class']  = 'nk-nav-link nk-interactive' . ( in_array( 'current-menu-item', $classes, true ) ? ' is-active' : '' );

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Filter Body Classes
 *
 * @param array $classes Existing body classes.
 * @return array Modified classes.
 */
function nukto_body_classes( $classes ) {
	$classes[] = 'nk-theme-dark';
	$classes[] = 'nk-has-custom-cursor';
	return $classes;
}
add_filter( 'body_class', 'nukto_body_classes' );


/**
 * Automatically Create Core Pages & Multi-Page Menus if not already present
 */
function nukto_auto_create_core_pages() {
	if ( get_option( 'nukto_pages_installed_v2' ) ) {
		return;
	}

	$pages = array(
		'work'     => array(
			'title'    => __( 'Selected Work', 'nukto' ),
			'template' => 'page-work.php',
		),
		'services' => array(
			'title'    => __( 'Capabilities & Services', 'nukto' ),
			'template' => 'page-services.php',
		),
		'about'    => array(
			'title'    => __( 'About Studio', 'nukto' ),
			'template' => 'page-about.php',
		),
		'reviews'  => array(
			'title'    => __( 'Client Reviews', 'nukto' ),
			'template' => 'page-reviews.php',
		),
		'contact'  => array(
			'title'    => __( 'Start A Project', 'nukto' ),
			'template' => 'page-contact.php',
		),
	);

	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug );
		if ( ! $existing ) {
			$page_id = wp_insert_post(
				array(
					'post_title'     => $data['title'],
					'post_name'      => $slug,
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'comment_status' => 'closed',
				)
			);
			if ( $page_id && ! is_wp_error( $page_id ) && ! empty( $data['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $data['template'] );
			}
		} elseif ( ! empty( $data['template'] ) ) {
			update_post_meta( $existing->ID, '_wp_page_template', $data['template'] );
		}
	}

	// Auto-create / configure Primary Menu
	$menu_name   = 'Primary Navigation';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

		$menu_items = array(
			array(
				'title' => __( 'Home', 'nukto' ),
				'url'   => home_url( '/' ),
			),
			array(
				'title' => __( 'Work', 'nukto' ),
				'url'   => home_url( '/work/' ),
			),
			array(
				'title' => __( 'Services', 'nukto' ),
				'url'   => home_url( '/services/' ),
			),
			array(
				'title' => __( 'About', 'nukto' ),
				'url'   => home_url( '/about/' ),
			),
			array(
				'title' => __( 'Reviews', 'nukto' ),
				'url'   => home_url( '/reviews/' ),
			),
			array(
				'title' => __( 'Contact', 'nukto' ),
				'url'   => home_url( '/contact/' ),
			),
		);

		foreach ( $menu_items as $order => $item ) {
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'    => $item['title'],
					'menu-item-url'      => $item['url'],
					'menu-item-status'   => 'publish',
					'menu-item-type'     => 'custom',
					'menu-item-position' => $order + 1,
				)
			);
		}

		$locations = get_theme_mod( 'nav_menu_locations', array() );
		$locations['primary'] = $menu_id;
		$locations['footer']  = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	flush_rewrite_rules( false );
	update_option( 'nukto_pages_installed_v2', 1 );
}
add_action( 'init', 'nukto_auto_create_core_pages' );
