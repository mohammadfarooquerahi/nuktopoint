<?php
/**
 * Template Part: Hero Section & Video Showcase
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prefix       = get_theme_mod( 'nukto_hero_prefix', 'Leading Full-Service' );
$ticker_raw   = get_theme_mod( 'nukto_hero_ticker_items', "Creative Agency\nBranding Studio\nE-Commerce Design\nAdvertising Hub\nMedia Production" );
$ticker_items = array_filter( array_map( 'trim', explode( "\n", $ticker_raw ) ) );
$video_url    = get_theme_mod( 'nukto_hero_video_url', 'https://vjs.zencdn.net/v/oceans.mp4' );
?>
<section class="nk-hero" id="hero">
	<div class="nk-container">
		<div class="nk-hero-heading-wrap">
			<h1 class="nk-hero-title">
				<span><?php echo esc_html( $prefix ); ?></span><br>
				<span class="nk-ticker-container">
					<span class="nk-ticker-track">
						<?php foreach ( $ticker_items as $item ) : ?>
							<span class="nk-ticker-item"><?php echo esc_html( $item ); ?></span>
						<?php endforeach; ?>
						<?php if ( ! empty( $ticker_items ) ) : ?>
							<span class="nk-ticker-item"><?php echo esc_html( $ticker_items[0] ); ?></span>
						<?php endif; ?>
					</span>
				</span>
			</h1>
		</div>
	</div>

	<!-- Scroll-Expanding Hero Video Track -->
	<div class="nk-hero-video-sticky-track">
		<div class="nk-container">
			<div class="nk-hero-video-wrapper" id="heroVideoWrapper">
				<video id="heroVideo" class="nk-hero-video" autoplay muted loop playsinline preload="auto">
					<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
				</video>

				<!-- Audio Toggle Button -->
				<button id="heroAudioToggle" class="nk-audio-btn nk-interactive" aria-label="<?php esc_attr_e( 'Toggle Sound', 'nukto' ); ?>">
					<div class="nk-sound-bars">
						<span class="nk-sound-bar"></span>
						<span class="nk-sound-bar"></span>
						<span class="nk-sound-bar"></span>
						<span class="nk-sound-bar"></span>
					</div>
					<span id="heroAudioText"><?php esc_html_e( 'Sound Off', 'nukto' ); ?></span>
				</button>
			</div>
		</div>
	</div>
</section>
