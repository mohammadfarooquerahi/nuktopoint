<?php
/**
 * Template Part: Testimonials Carousel
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_tag      = get_theme_mod( 'nukto_testi_tag', 'Client Endorsements' );
$section_headline = get_theme_mod( 'nukto_testi_headline', 'Trusted by Institutions & Global Sellers' );

$default_testimonials = array(
	1 => array(
		'quote'  => '“Nukto Point delivered extraordinary visual assets for our university admissions campaign. Their attention to institutional prestige, typography, and large-format outdoor legibility exceeded our highest benchmarks.”',
		'author' => 'Director of Communications',
		'role'   => 'SZABIST University',
		'avatar' => 'SZ',
	),
	2 => array(
		'quote'  => '“The Amazon listing graphics and packaging dielines Nukto Point engineered took our product straight into the top 5% bestseller category. Pure conversion-driven craftsmanship.”',
		'author' => 'Brand Operations Lead',
		'role'   => 'Apex Cutlery & Retail',
		'avatar' => 'AC',
	),
	3 => array(
		'quote'  => '“Working with Nukto Point on our international exhibition standees and public relations collateral was effortless. They blend deep creative theory with sharp execution timelines.”',
		'author' => 'Head of Corporate Affairs',
		'role'   => 'Pak-Turk Maarif International',
		'avatar' => 'PT',
	),
);

$testimonials = array();
foreach ( $default_testimonials as $i => $defaults ) {
	$quote  = get_theme_mod( "nukto_t{$i}_quote", $defaults['quote'] );
	$author = get_theme_mod( "nukto_t{$i}_author", $defaults['author'] );
	$role   = get_theme_mod( "nukto_t{$i}_role", $defaults['role'] );
	$avatar = get_theme_mod( "nukto_t{$i}_avatar", $defaults['avatar'] );

	if ( ! empty( $quote ) ) {
		$testimonials[] = array(
			'quote'  => $quote,
			'author' => $author,
			'role'   => $role,
			'avatar' => $avatar ? $avatar : 'NK',
		);
	}
}
?>
<section class="nk-section nk-testimonials-section" id="testimonials">
	<div class="nk-container">
		<div class="nk-section-title-wrap" style="text-align: center;">
			<span class="nk-section-tag"><?php echo esc_html( $section_tag ); ?></span>
			<h2 class="nk-section-h2"><?php echo esc_html( $section_headline ); ?></h2>
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
