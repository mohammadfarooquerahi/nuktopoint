<?php
/**
 * Theme Footer Template
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$loc1_city    = get_theme_mod( 'nukto_loc1_city', 'Islamabad' );
$loc1_address = get_theme_mod( 'nukto_loc1_address', 'Creative Studio, Sector F-7, Islamabad, Pakistan' );

$loc2_city    = get_theme_mod( 'nukto_loc2_city', 'Karachi' );
$loc2_address = get_theme_mod( 'nukto_loc2_address', 'Media Hub, Clifton Block 5, Karachi, Pakistan' );

$loc3_city    = get_theme_mod( 'nukto_loc3_city', 'Hyderabad' );
$loc3_address = get_theme_mod( 'nukto_loc3_address', 'Communication Design Lab, Auto Bhan, Hyderabad, Pakistan' );

$phone        = get_theme_mod( 'nukto_contact_phone', '+92 324 3601950' );
$email        = get_theme_mod( 'nukto_contact_email', 'nuktopoint@gmail.com' );

$behance_url   = get_theme_mod( 'nukto_social_behance', 'https://www.behance.net/nukto-poin' );
$instagram_url = get_theme_mod( 'nukto_social_instagram', 'https://www.instagram.com/nuktopoint' );
$facebook_url  = get_theme_mod( 'nukto_social_facebook', 'https://www.facebook.com/p/NUKTO-61560572120480/' );
$watermark = get_theme_mod( 'nukto_footer_watermark', 'NUKTO POINT' );
$tagline   = get_theme_mod( 'nukto_footer_tagline', 'The Point of Creativity. All Rights Reserved.' );
?>
</main><!-- #primary -->

<footer class="nk-footer" id="footer">
	<div class="nk-container">
		<!-- Multi-City Locations & Socials Grid -->
		<div class="nk-footer-locations-grid">
			<!-- Col 1: Islamabad -->
			<div class="nk-location-col">
				<h4 class="nk-location-col-title"><?php echo esc_html( $loc1_city ); ?></h4>
				<div class="nk-location-info">
					<p><?php echo esc_html( $loc1_address ); ?></p>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>
			</div>

			<!-- Col 2: Karachi -->
			<div class="nk-location-col">
				<h4 class="nk-location-col-title"><?php echo esc_html( $loc2_city ); ?></h4>
				<div class="nk-location-info">
					<p><?php echo esc_html( $loc2_address ); ?></p>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>
			</div>

			<!-- Col 3: Hyderabad -->
			<div class="nk-location-col">
				<h4 class="nk-location-col-title"><?php echo esc_html( $loc3_city ); ?></h4>
				<div class="nk-location-info">
					<p><?php echo esc_html( $loc3_address ); ?></p>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>
			</div>

			<!-- Col 4: Socials & Back to Top -->
			<div class="nk-location-col">
				<h4 class="nk-location-col-title"><?php esc_html_e( 'Connect & Follow', 'nukto' ); ?></h4>
				<div class="nk-location-info" style="margin-bottom: 1.5rem;">
					<?php if ( ! empty( $behance_url ) ) : ?>
						<a href="<?php echo esc_url( $behance_url ); ?>" target="_blank" rel="noopener noreferrer" class="nk-interactive">Behance Portfolio ↗</a>
					<?php endif; ?>
					<?php if ( ! empty( $instagram_url ) ) : ?>
						<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" class="nk-interactive">Instagram ↗</a>
					<?php endif; ?>
					<?php if ( ! empty( $facebook_url ) ) : ?>
						<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer" class="nk-interactive">Facebook ↗</a>
					<?php endif; ?>
				</div>

				<!-- Let's Go Up Back-To-Top Button -->
				<button id="nkBackToTop" class="nk-btt-btn nk-interactive" aria-label="<?php esc_attr_e( 'Back to top', 'nukto' ); ?>">
					<span><?php esc_html_e( "Let's go up", 'nukto' ); ?></span>
					<span class="nk-btt-icon" aria-hidden="true">↑</span>
				</button>
			</div>
		</div>

		<!-- Interactive Physics Canvas -->
		<?php get_template_part( 'template-parts/footer-canvas' ); ?>

		<!-- Giant Watermark Logo -->
		<div class="nk-footer-watermark" aria-hidden="true">
			<?php echo esc_html( $watermark ); ?>
		</div>

		<!-- Bottom Bar -->
		<div class="nk-footer-bottom">
			<div class="nk-footer-bottom-left">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( $tagline ); ?></p>
				<a href="https://www.linkedin.com/in/mohammadfarooque/" target="_blank" rel="noopener noreferrer" class="nk-dev-credit">Developed by Mohammad Farooque</a>
			</div>
			<div class="nk-footer-links">
				<a href="<?php echo esc_url( home_url( '/work/' ) ); ?>" class="nk-interactive"><?php esc_html_e( 'Work', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="nk-interactive"><?php esc_html_e( 'Services', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="nk-interactive"><?php esc_html_e( 'About', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" class="nk-interactive"><?php esc_html_e( 'Reviews', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-interactive"><?php esc_html_e( 'Contact', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'nukto' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms', 'nukto' ); ?></a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
