<?php
/**
 * Template Part: Preloader
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nk-preloader" id="nkPreloader">
	<div class="nk-preloader-inner">
		<div class="nk-preloader-text"><?php esc_html_e( 'Nukto Point — Creative Studio', 'nukto' ); ?></div>
		<div class="nk-preloader-bar-wrap">
			<div class="nk-preloader-bar-fill" id="nkPreloaderBar"></div>
		</div>
		<div class="nk-preloader-counter">
			<span id="nkPreloaderNum">0</span>%
		</div>
	</div>
</div>
