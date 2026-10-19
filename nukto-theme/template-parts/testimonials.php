<?php
/**
 * Template Part: Testimonials Carousel
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = array(
	array(
		'quote'  => __( '“Nukto Point delivered extraordinary visual assets for our university admissions campaign. Their attention to institutional prestige, typography, and large-format outdoor legibility exceeded our highest benchmarks.”', 'nukto' ),
		'author' => 'Director of Communications',
		'role'   => 'SZABIST University',
		'avatar' => 'SZ',
	),
	array(
		'quote'  => __( '“The Amazon listing graphics and packaging dielines Nukto Point engineered took our product straight into the top 5% bestseller category. Pure conversion-driven craftsmanship.”', 'nukto' ),
		'author' => 'Brand Operations Lead',
		'role'   => 'Apex Cutlery & Retail',
		'avatar' => 'AC',
	),
	array(
		'quote'  => __( '“Working with Nukto Point on our international exhibition standees and public relations collateral was effortless. They blend deep creative theory with sharp execution timelines.”', 'nukto' ),
		'author' => 'Head of Corporate Affairs',
		'role'   => 'Pak-Turk Maarif International',
		'avatar' => 'PT',
	),
);
?>
<section class="nk-section nk-testimonials-section" id="testimonials">
	<div class="nk-container">
		<div class="nk-section-title-wrap" style="text-align: center;">
			<span class="nk-section-tag"><?php esc_html_e( 'Client Endorsements', 'nukto' ); ?></span>
			<h2 class="nk-section-h2"><?php esc_html_e( 'Trusted by Institutions & Global Sellers', 'nukto' ); ?></h2>
		</div>

		<div class="nk-testimonials-slider" id="nkTestimonialsSlider">
			<div class="nk-testimonials-track" id="nkTestimonialsTrack">
				<?php foreach ( $testimonials as $index => $t ) : ?>
					<div class="nk-testimonial-slide">
						<div class="nk-testimonial-card">
							<p class="nk-testimonial-quote"><?php echo esc_html( $t['quote'] ); ?></p>
							<div class="nk-testimonial-author">
								<div class="nk-author-avatar" aria-hidden="true"><?php echo esc_html( $t['avatar'] ); ?></div>
								<div>
									<h4 class="nk-author-name"><?php echo esc_html( $t['author'] ); ?></h4>
									<p class="nk-author-role"><?php echo esc_html( $t['role'] ); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- Navigation Dots -->
			<div class="nk-slider-nav" id="nkSliderNav" aria-label="<?php esc_attr_e( 'Testimonial Slide Controls', 'nukto' ); ?>">
				<?php foreach ( $testimonials as $index => $t ) : ?>
					<button class="nk-slider-dot <?php echo 0 === $index ? 'is-active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'nukto' ), $index + 1 ) ); ?>"></button>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
