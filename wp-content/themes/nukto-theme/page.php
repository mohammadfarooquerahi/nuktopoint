<?php
/**
 * The template for displaying all pages.
 *
 * @package Nukto
 */

get_header();

$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : __( 'NUKTO POINT', 'nukto' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_the_title();
?>

<main id="primary" class="site-main nk-main nk-default-page">
    <div class="nk-page-hero">
        <div class="nk-container">
            <span class="nk-section-tag"><?php echo esc_html( $hero_tag ); ?></span>
            <h1 class="nk-page-h1"><?php echo esc_html( $hero_headline ); ?></h1>
            <?php if ( ! empty( $meta_lead ) ) : ?>
                <p class="nk-page-lead"><?php echo esc_html( $meta_lead ); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="nk-container" style="padding-top: var(--nk-space-md); padding-bottom: var(--nk-space-lg);">
        <div class="nk-page-content-wrap">
            <article id="post-<?php the_ID(); ?>" <?php post_class('nk-article-entry'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="nk-entry-thumbnail" style="margin-bottom: 2rem;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="nk-entry-body nk-wysiwyg">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nukto'),
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
