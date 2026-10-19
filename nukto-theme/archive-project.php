<?php
/**
 * Template for displaying the Projects Archive / Portfolio page.
 *
 * @package Nukto_Point
 */

get_header();

$terms = get_terms(array(
    'taxonomy'   => 'project_category',
    'hide_empty' => true,
));
?>

<main id="primary" class="site-main nk-main nk-archive-project-page">
    <!-- Archive Hero Header -->
    <section class="nk-archive-hero">
        <div class="nk-container">
            <div class="nk-archive-header-wrap">
                <span class="nk-badge nk-badge-pulse"><?php esc_html_e('PORTFOLIO DIRECTORY', 'nukto-point'); ?></span>
                <h1 class="nk-archive-title"><?php esc_html_e('SELECTED WORKS', 'nukto-point'); ?></h1>
                <p class="nk-archive-subtitle">
                    <?php esc_html_e('A curated index of strategic communication design, brand systems, advertising campaigns, and high-conversion e-commerce visuals.', 'nukto-point'); ?>
                </p>
            </div>

            <!-- Category Filter Pills -->
            <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                <div class="nk-filter-bar">
                    <button class="nk-filter-btn active nk-interactive" data-filter="all">
                        <?php esc_html_e('All Projects', 'nukto-point'); ?>
                        <span class="nk-filter-count"><?php echo esc_html(wp_count_posts('project')->publish); ?></span>
                    </button>
                    <?php foreach ($terms as $term) : ?>
                        <button class="nk-filter-btn nk-interactive" data-filter=".cat-<?php echo esc_attr($term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                            <span class="nk-filter-count"><?php echo esc_html($term->count); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Projects Grid Section -->
    <section class="nk-archive-grid-section">
        <div class="nk-container">
            <?php if (have_posts()) : ?>
                <div class="nk-work-grid nk-filterable-grid">
                    <?php
                    $counter = 0;
                    while (have_posts()) :
                        the_post();
                        $counter++;
                        $size = ($counter % 3 === 1) ? 'large' : 'regular';
                        $project_terms = get_the_terms(get_the_ID(), 'project_category');
                        $cat_classes = array();
                        if ($project_terms && !is_wp_error($project_terms)) {
                            foreach ($project_terms as $pt) {
                                $cat_classes[] = 'cat-' . $pt->slug;
                            }
                        }
                        ?>
                        <div class="nk-filter-item <?php echo esc_attr(implode(' ', $cat_classes)); ?>">
                            <?php
                            set_query_var('card_size', $size);
                            set_query_var('card_index', $counter);
                            get_template_part('template-parts/project-card');
                            ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="nk-pagination-wrap">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '&larr; ' . esc_html__('Previous', 'nukto-point'),
                        'next_text' => esc_html__('Next', 'nukto-point') . ' &rarr;',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="nk-no-projects">
                    <h3><?php esc_html_e('No projects found.', 'nukto-point'); ?></h3>
                    <p><?php esc_html_e('Please check back soon or explore our featured case studies on the home page.', 'nukto-point'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nk-btn nk-btn-primary nk-interactive">
                        <span><?php esc_html_e('Return Home', 'nukto-point'); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
