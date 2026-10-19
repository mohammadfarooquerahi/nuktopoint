<?php
/**
 * The template for displaying all pages.
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main nk-default-page">
    <div class="nk-page-hero">
        <div class="nk-container">
            <span class="nk-badge nk-badge-pulse"><?php esc_html_e('NUKTO POINT', 'nukto-point'); ?></span>
            <h1 class="nk-page-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="nk-container">
        <div class="nk-page-content-wrap">
            <article id="post-<?php the_ID(); ?>" <?php post_class('nk-article-entry'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="nk-entry-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="nk-entry-body nk-wysiwyg">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nukto-point'),
                            'after'  => '</div>',
                        ));
                    endwhile;
                    ?>
                </div>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
        </div>
    </div>
</main>

<?php
get_footer();
