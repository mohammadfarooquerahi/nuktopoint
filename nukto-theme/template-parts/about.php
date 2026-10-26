<?php
/**
 * Template Part: About Us
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_tag = get_theme_mod( 'nukto_about_tag', 'About Studio' );
$headline    = get_theme_mod( 'nukto_about_headline', 'The Creatives Behind Your Brand Magic' );
$badge_text  = get_theme_mod( 'nukto_about_badge', '🪄 Design & Strategy' );
$p1          = get_theme_mod(
	'nukto_about_p1',
	'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.'
);
$p2          = get_theme_mod(
	'nukto_about_p2',
	'Having worked across educational institutions and corporate sectors, I bring a multidisciplinary approach to every project — from concept development to final execution. We create impactful, purposeful designs that communicate clearly, inspire audiences, and add real value.'
);
$p3          = get_theme_mod(
	'nukto_about_p3',
	'From establishing nationwide university admissions campaigns and large-format outdoor billboards to crafting high-converting Amazon E-Commerce listing designs, Nukto Point operates at the intersection of aesthetic distinction and commercial conversion.'
);
?>
<section class="nk-section nk-about-section" id="about">
	<div class="nk-container">
		<span class="nk-section-tag"><?php echo esc_html( $section_tag ); ?></span>
		<h2 class="nk-about-headline">
			<?php echo esc_html( $headline ); ?> <?php if ( ! empty( $badge_text ) ) : ?><span class="nk-highlight-badge"><?php echo esc_html( $badge_text ); ?></span><?php endif; ?>
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
				<p><?php echo esc_html( $p3 ); ?></p>
			</div>
		</div>

		<!-- Live Counter Stats Grid -->
		<?php get_template_part( 'template-parts/stats' ); ?>
	</div>
</section>
