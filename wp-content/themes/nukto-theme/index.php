<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main nk-index-page">
    <div class="nk-page-hero">
        <div class="nk-container">
            <span class="nk-badge nk-badge-pulse"><?php esc_html_e('DISPATCHES & INSIGHTS', 'nukto-point'); ?></span>
            <h1 class="nk-page-title"><?php single_post_title(); ?></h1>
        </div>
    </div>

    <div class="nk-container">
        <?php if (have_posts()) : ?>
            <div class="nk-posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('nk-blog-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="nk-blog-card-media nk-interactive">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="nk-blog-card-body">
                            <div class="nk-blog-meta">
                                <span class="nk-meta-date"><?php echo esc_html(get_the_date('M d, Y')); ?></span>
                                <span class="nk-meta-cat"><?php the_category(', '); ?></span>
                            </div>
                            <h2 class="nk-blog-card-title">
                                <a href="<?php the_permalink(); ?>" class="nk-interactive"><?php the_title(); ?></a>
                            </h2>
                            <p class="nk-blog-card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                            <a href="<?php the_permalink(); ?>" class="nk-text-link nk-interactive">
                                <span><?php esc_html_e('Read Article', 'nukto-point'); ?></span>
                                <span>&rarr;</span>
                            </a>
                        </div>
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
            <div class="nk-no-posts text-center">
                <h3><?php esc_html_e('Nothing Found', 'nukto-point'); ?></h3>
                <p><?php esc_html_e('It seems we cannot find what you are looking for. Perhaps searching can help.', 'nukto-point'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
