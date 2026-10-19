<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Nukto_Point
 */

get_header();
?>

<main id="primary" class="site-main nk-main nk-404-page">
    <div class="nk-404-hero">
        <div class="nk-container text-center">
            <span class="nk-badge nk-badge-pulse"><?php esc_html_e('ERROR 404', 'nukto-point'); ?></span>
            <div class="nk-404-number-wrap">
                <h1 class="nk-404-glitch" data-text="404">404</h1>
            </div>
            <h2 class="nk-404-headline"><?php esc_html_e('OUT OF BOUNDS', 'nukto-point'); ?></h2>
            <p class="nk-404-desc">
                <?php esc_html_e('The creative coordinate you navigated to does not exist, has been archived, or moved to another dimension.', 'nukto-point'); ?>
            </p>
            <div class="nk-404-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nk-btn nk-btn-primary nk-interactive">
                    <span><?php esc_html_e('Return to Home', 'nukto-point'); ?></span>
                    <span class="nk-btn-arrow">&rarr;</span>
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('project') ?: home_url('/#work')); ?>" class="nk-btn nk-btn-outline nk-interactive">
                    <span><?php esc_html_e('Browse Portfolio', 'nukto-point'); ?></span>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
