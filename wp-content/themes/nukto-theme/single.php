<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main nk-single-post">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('nk-article'); ?>>
            <header class="nk-post-header">
                <div class="nk-container">
                    <div class="nk-post-meta-top">
                        <span class="nk-badge nk-badge-pulse"><?php the_category(', '); ?></span>
                        <span class="nk-meta-date"><?php echo esc_html(get_the_date('M d, Y')); ?></span>
                        <span class="nk-meta-author"><?php echo esc_html__('By', 'nukto-point') . ' ' . esc_html(get_the_author()); ?></span>
                    </div>
                    <h1 class="nk-single-post-title"><?php the_title(); ?></h1>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="nk-post-featured-media">
                    <div class="nk-container">
                        <div class="nk-post-thumb-wrap">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="nk-container">
                <div class="nk-post-body-wrap">
                    <div class="nk-entry-body nk-wysiwyg">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nukto-point'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="nk-post-footer">
                        <?php if (has_tag()) : ?>
                            <div class="nk-post-tags">
                                <span class="nk-tags-label"><?php esc_html_e('Tags:', 'nukto-point'); ?></span>
                                <?php the_tags('', ' ', ''); ?>
                            </div>
                        <?php endif; ?>

                        <div class="nk-post-nav-links">
                            <div class="nk-post-prev">
                                <?php previous_post_link('%link', '&larr; %title'); ?>
                            </div>
                            <div class="nk-post-next">
                                <?php next_post_link('%link', '%title &rarr;'); ?>
                            </div>
                        </div>
                    </footer>

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
