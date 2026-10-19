<?php
/**
 * Template Part: Partner & Client Infinite Marquee
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$partners_raw = get_theme_mod(
	'nukto_marquee_partners',
	"Pak-Turk Maarif\nSZABIST University\nEastline Communication\nSwitch Studio\nKTN TV\nApex Cutlery\nAmazon Global Retail"
);
$partners     = array_filter( array_map( 'trim', explode( "\n", $partners_raw ) ) );
?>
<section class="nk-marquee-section" aria-label="<?php esc_attr_e( 'Our Partners and Clients', 'nukto' ); ?>">
	<div class="nk-marquee-track">
		<div class="nk-marquee-group">
			<?php foreach ( $partners as $partner ) : ?>
				<div class="nk-marquee-item">
					<span><?php echo esc_html( $partner ); ?></span>
					<span class="nk-marquee-dot" aria-hidden="true"></span>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="nk-marquee-group" aria-hidden="true">
			<?php foreach ( $partners as $partner ) : ?>
				<div class="nk-marquee-item">
					<span><?php echo esc_html( $partner ); ?></span>
					<span class="nk-marquee-dot"></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
