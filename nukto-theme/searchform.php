<?php
/**
 * Search form template.
 *
 * @package Nukto_Point
 */
?>
<form role="search" method="get" class="nk-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="nk-search-field"><?php esc_html_e('Search for:', 'nukto-point'); ?></label>
    <div class="nk-search-input-wrap">
        <input type="search" id="nk-search-field" class="nk-search-field" placeholder="<?php echo esc_attr_x('Search projects, articles...', 'placeholder', 'nukto-point'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="nk-search-submit nk-interactive" aria-label="<?php esc_attr_e('Submit search', 'nukto-point'); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </button>
    </div>
</form>
