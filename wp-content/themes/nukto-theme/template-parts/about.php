<?php
/**
 * Template Part: About Us
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = get_theme_mod( 'nukto_about_headline', 'The Creatives Behind Your Brand Magic' );
$p1       = get_theme_mod(
	'nukto_about_p1',
	'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.'
);
$p2       = get_theme_mod(
	'nukto_about_p2',
	'Having worked across educational institutions and corporate sectors, I bring a multidisciplinary approach to every project — from concept development to final execution. We create impactful, purposeful designs that communicate clearly, inspire audiences, and add real value.'
);
?>
<section class="nk-section nk-about-section" id="about">
	<div class="nk-container">
		<span class="nk-section-tag"><?php esc_html_e( 'About Studio', 'nukto' ); ?></span>
		<h2 class="nk-about-headline">
			<?php echo esc_html( $headline ); ?> <span class="nk-highlight-badge">🪄 <?php esc_html_e( 'Design & Strategy', 'nukto' ); ?></span>
		</h2>

		<div class="nk-about-grid">
			<!-- Founder Avatar Showcase -->
			<div class="nk-about-avatar-card">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/branding/nukto-avatar.jpg' ); ?>" alt="<?php esc_attr_e( 'Nukto Point Founder — Communication Designer', 'nukto' ); ?>" loading="lazy" />
			</div>

			<!-- Narrative Storytelling -->
			<div class="nk-about-narrative">
				<p><strong><?php echo esc_html( $p1 ); ?></strong></p>
				<p><?php echo esc_html( $p2 ); ?></p>
				<p><?php esc_html_e( 'From establishing nationwide university admissions campaigns and large-format outdoor billboards to crafting high-converting Amazon E-Commerce listing designs, Nukto Point operates at the intersection of aesthetic distinction and commercial conversion.', 'nukto' ); ?></p>
			</div>
		</div>

		<!-- Live Counter Stats Grid -->
		<?php get_template_part( 'template-parts/stats' ); ?>
	</div>
</section>
