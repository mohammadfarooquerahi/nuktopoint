<?php
/**
 * Template for displaying a Single Project case study.
 *
 * @package Nukto_Point
 */

get_header();

while (have_posts()) :
    the_post();
    $project_id   = get_the_ID();
    $client_name  = get_post_meta($project_id, '_nukto_client_name', true);
    $project_year = get_post_meta($project_id, '_nukto_project_year', true);
    $services     = get_post_meta($project_id, '_nukto_project_services', true);
    $ext_link     = get_post_meta($project_id, '_nukto_project_link', true);
    $card_size    = get_post_meta($project_id, '_nukto_card_size', true);

    $terms = get_the_terms($project_id, 'project_category');
    $category_names = array();
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $category_names[] = $term->name;
        }
    }

    $featured_img_url = get_the_post_thumbnail_url($project_id, 'full');
    if (!$featured_img_url) {
        $featured_img_url = get_template_directory_uri() . '/assets/images/projects/' . $post->post_name . '/cover.png';
    }

    // Get adjacent projects
    $prev_post = get_previous_post(true, '', 'project_category');
    if (!$prev_post) {
        $prev_post = get_previous_post();
    }
    $next_post = get_next_post(true, '', 'project_category');
    if (!$next_post) {
        $next_post = get_next_post();
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('nk-single-project'); ?>>
    <!-- Project Hero Header -->
    <header class="nk-project-hero">
        <div class="nk-container">
            <div class="nk-project-breadcrumb">
                <a href="<?php echo esc_url(get_post_type_archive_link('project') ?: home_url('/#work')); ?>" class="nk-breadcrumb-back nk-interactive">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    <span><?php esc_html_e('All Projects', 'nukto-point'); ?></span>
                </a>
                <?php if (!empty($category_names)) : ?>
                    <span class="nk-breadcrumb-sep">/</span>
                    <span class="nk-breadcrumb-cat"><?php echo esc_html(implode(', ', $category_names)); ?></span>
                <?php endif; ?>
            </div>

            <div class="nk-project-header-grid">
                <div class="nk-project-header-title">
                    <h1 class="nk-project-title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="nk-project-lead"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </div>

                <div class="nk-project-meta-box">
                    <?php if ($client_name) : ?>
                        <div class="nk-meta-item">
                            <span class="nk-meta-label"><?php esc_html_e('Client', 'nukto-point'); ?></span>
                            <span class="nk-meta-val"><?php echo esc_html($client_name); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($project_year) : ?>
                        <div class="nk-meta-item">
                            <span class="nk-meta-label"><?php esc_html_e('Year', 'nukto-point'); ?></span>
                            <span class="nk-meta-val"><?php echo esc_html($project_year); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($services) : ?>
                        <div class="nk-meta-item">
                            <span class="nk-meta-label"><?php esc_html_e('Disciplines', 'nukto-point'); ?></span>
                            <span class="nk-meta-val"><?php echo esc_html($services); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($ext_link) : ?>
                        <div class="nk-meta-item nk-meta-action">
                            <a href="<?php echo esc_url($ext_link); ?>" target="_blank" rel="noopener noreferrer" class="nk-btn nk-btn-primary nk-interactive">
                                <span><?php esc_html_e('View Live Project', 'nukto-point'); ?></span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Project Full Width Featured Media Banner -->
    <section class="nk-project-featured-media">
        <div class="nk-container-fluid">
            <div class="nk-project-banner-wrap">
                <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="nk-project-banner-img" loading="eager" />
            </div>
        </div>
    </section>

    <!-- Project Main Body & Content Narrative -->
    <section class="nk-project-body">
        <div class="nk-container">
            <div class="nk-project-body-grid">
                <div class="nk-project-sidebar">
                    <div class="nk-sidebar-sticky">
                        <h4 class="nk-sidebar-title"><?php esc_html_e('The Brief', 'nukto-point'); ?></h4>
                        <p class="nk-sidebar-text">
                            <?php esc_html_e('Strategic visual communication engineered to elevate brand perception, captivate target demographics, and convert viewers into loyal advocates.', 'nukto-point'); ?>
                        </p>

                        <div class="nk-sidebar-share">
                            <span class="nk-share-title"><?php esc_html_e('Share Project', 'nukto-point'); ?></span>
                            <div class="nk-share-links">
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="nk-share-btn nk-interactive" aria-label="Share on X">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="nk-share-btn nk-interactive" aria-label="Share on LinkedIn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-project-content-column">
                    <div class="nk-project-wysiwyg">
                        <?php if (get_the_content()) : ?>
                            <?php the_content(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e('This project represents a comprehensive design execution crafted by Nukto Point. From conceptual exploration and typography hierarchy to high-fidelity production, every asset was meticulously constructed to achieve measurable market impact and aesthetic distinction.', 'nukto-point'); ?></p>
                            
                            <h3><?php esc_html_e('Strategic Objectives', 'nukto-point'); ?></h3>
                            <ul>
                                <li><?php esc_html_e('Establish an instantly recognizable, premium visual identity.', 'nukto-point'); ?></li>
                                <li><?php esc_html_e('Optimize communication clarity across physical and digital customer touchpoints.', 'nukto-point'); ?></li>
                                <li><?php esc_html_e('Deliver scalable design frameworks ready for omni-channel deployment.', 'nukto-point'); ?></li>
                            </ul>

                            <h3><?php esc_html_e('Creative Direction & Execution', 'nukto-point'); ?></h3>
                            <p><?php esc_html_e('Drawing upon over a decade of communication design expertise and academic research rigor, our studio synthesized modern minimalism with high-impact color psychology and precision layout structures.', 'nukto-point'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adjacent Projects Navigation -->
    <section class="nk-project-nav-section">
        <div class="nk-container">
            <div class="nk-project-nav-grid">
                <?php if ($prev_post) : 
                    $prev_thumb = get_the_post_thumbnail_url($prev_post->ID, 'medium_large');
                    if (!$prev_thumb) {
                        $prev_thumb = get_template_directory_uri() . '/assets/images/projects/' . $prev_post->post_name . '/cover.png';
                    }
                ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="nk-project-nav-item nk-prev nk-interactive">
                        <div class="nk-nav-direction">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                            <span><?php esc_html_e('Previous Project', 'nukto-point'); ?></span>
                        </div>
                        <h4 class="nk-nav-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></h4>
                        <?php if ($prev_thumb) : ?>
                            <div class="nk-nav-thumb-preview">
                                <img src="<?php echo esc_url($prev_thumb); ?>" alt="<?php echo esc_attr(get_the_title($prev_post->ID)); ?>" />
                            </div>
                        <?php endif; ?>
                    </a>
                <?php else : ?>
                    <div class="nk-project-nav-item nk-disabled"></div>
                <?php endif; ?>

                <?php if ($next_post) : 
                    $next_thumb = get_the_post_thumbnail_url($next_post->ID, 'medium_large');
                    if (!$next_thumb) {
                        $next_thumb = get_template_directory_uri() . '/assets/images/projects/' . $next_post->post_name . '/cover.png';
                    }
                ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nk-project-nav-item nk-next nk-interactive">
                        <div class="nk-nav-direction">
                            <span><?php esc_html_e('Next Project', 'nukto-point'); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                        <h4 class="nk-nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></h4>
                        <?php if ($next_thumb) : ?>
                            <div class="nk-nav-thumb-preview">
                                <img src="<?php echo esc_url($next_thumb); ?>" alt="<?php echo esc_attr(get_the_title($next_post->ID)); ?>" />
                            </div>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Bottom Case Study Call-to-Action -->
    <section class="nk-project-cta">
        <div class="nk-container text-center">
            <h2 class="nk-project-cta-heading"><?php esc_html_e('Ready to elevate your visual identity?', 'nukto-point'); ?></h2>
            <p class="nk-project-cta-sub"><?php esc_html_e('Let us collaborate to produce award-winning communication design for your brand.', 'nukto-point'); ?></p>
            <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="nk-btn nk-btn-primary nk-interactive">
                <span><?php esc_html_e('Start a Project', 'nukto-point'); ?></span>
                <span class="nk-btn-arrow">&rarr;</span>
            </a>
        </div>
    </section>
</article>

<?php
endwhile;

get_footer();
