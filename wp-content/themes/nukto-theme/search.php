<?php
/**
 * The template for displaying search results pages.
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main nk-search-page">
    <div class="nk-page-hero">
        <div class="nk-container">
            <span class="nk-badge nk-badge-pulse"><?php esc_html_e('SEARCH RESULTS', 'nukto-point'); ?></span>
            <h1 class="nk-page-title">
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Results for: "%s"', 'nukto-point'), '<span>' . esc_html(get_search_query()) . '</span>');
                ?>
            </h1>
        </div>
    </div>

    <div class="nk-container">
        <?php if (have_posts()) : ?>
            <div class="nk-search-results-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    $is_project = (get_post_type() === 'project');
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('nk-search-card'); ?>>
                        <div class="nk-search-card-meta">
                            <span class="nk-search-badge"><?php echo esc_html($is_project ? __('Project', 'nukto-point') : __('Post / Page', 'nukto-point')); ?></span>
                            <span class="nk-search-date"><?php echo esc_html(get_the_date('M d, Y')); ?></span>
                        </div>
                        <h2 class="nk-search-card-title">
                            <a href="<?php the_permalink(); ?>" class="nk-interactive"><?php the_title(); ?></a>
                        </h2>
                        <div class="nk-search-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="nk-text-link nk-interactive">
                            <span><?php esc_html_e('Explore', 'nukto-point'); ?></span>
                            <span>&rarr;</span>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

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
            <div class="nk-no-results text-center">
                <h2><?php esc_html_e('No matching results found', 'nukto-point'); ?></h2>
                <p><?php esc_html_e('Sorry, nothing matched your search criteria. Please try again with different keywords.', 'nukto-point'); ?></p>
                <div class="nk-search-form-wrap">
                    <?php get_search_form(); ?>
                </div>
                <div class="nk-search-back-home">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nk-btn nk-btn-primary nk-interactive">
                        <span><?php esc_html_e('Return to Home', 'nukto-point'); ?></span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
