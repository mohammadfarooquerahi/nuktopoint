<?php
/**
 * Template Part: Services Section (Sticky Split Screen)
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$statement = get_theme_mod( 'nukto_services_statement', "We're a creative communication agency making brands people remember." );
$subtext   = get_theme_mod( 'nukto_services_subtext', 'Big ideas. Bold design. Real results. You bring the vision; we engineer it into market presence.' );

$services_list = array(
	array(
		'num'   => '01',
		'title' => __( 'Branding & Visual Identity', 'nukto' ),
		'desc'  => __( 'Complete brand strategy, iconic marks, bespoke typography systems, and comprehensive style manuals that make your organization unmistakable.', 'nukto' ),
		'pills' => array( 'Brand Systems', 'Logo & Mark', 'Typography', 'Brand Manuals', 'Stationery Design' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'E-Commerce & Amazon Creative', 'nukto' ),
		'desc'  => __( 'High-converting digital storefront assets, Amazon listing images, A+ EBC modules, and custom product packaging dielines engineered to sell.', 'nukto' ),
		'pills' => array( 'Amazon Listing Sets', 'A+ / EBC Design', 'Packaging Dielines', '3D Product Retouching', 'Infographics' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Advertising & Print Media', 'nukto' ),
		'desc'  => __( 'High-impact outdoor highway billboards, event exhibition standees, and publication materials crafted with precision color profiles.', 'nukto' ),
		'pills' => array( 'Billboards & Hoardings', 'Exhibition Standees', 'Corporate Brochures', 'Print Production QA', 'Spatial Branding' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Social Media & Campaigns', 'nukto' ),
		'desc'  => __( 'Data-informed creative campaigns, seasonal holiday marketing, and public relations graphics designed to command attention on social feeds.', 'nukto' ),
		'pills' => array( 'Social Ad Campaigns', 'Seasonal Marketing', 'PR & Advocacy Graphics', 'Motion Micro-Assets', 'Social Brand Kits' ),
	),
	array(
		'num'   => '05',
		'title' => __( 'Media & Video Production', 'nukto' ),
		'desc'  => __( 'Compelling visual storytelling through commercial video editing, institutional documentaries, color grading, and commercial photography.', 'nukto' ),
		'pills' => array( 'Commercial Video Editing', 'Documentaries', 'Product Photography', 'Post-Production', 'Broadcast Overlays' ),
	),
);
?>
<section class="nk-section nk-services-section" id="services">
	<div class="nk-container">
		<div class="nk-services-split">
			<!-- Pinned Sticky Left Column -->
			<div class="nk-services-sticky-col">
				<span class="nk-section-tag"><?php esc_html_e( 'Our Capabilities', 'nukto' ); ?></span>
				<h2 class="nk-services-headline"><?php echo esc_html( $statement ); ?></h2>
				<p class="nk-services-subtext"><?php echo esc_html( $subtext ); ?></p>
			</div>

			<!-- Scrolling Cards Right Column -->
			<div class="nk-services-cards-col">
				<?php foreach ( $services_list as $svc ) : ?>
					<div class="nk-service-card nk-interactive">
						<div class="nk-service-header">
							<span class="nk-service-number"><?php echo esc_html( $svc['num'] ); ?></span>
							<h3 class="nk-service-title"><?php echo esc_html( $svc['title'] ); ?></h3>
						</div>
						<p class="nk-service-desc"><?php echo esc_html( $svc['desc'] ); ?></p>
						<div class="nk-service-items-wrap">
							<?php foreach ( $svc['pills'] as $pill ) : ?>
								<span class="nk-service-pill-item">
									<span class="nk-service-pill-dot"></span>
									<?php echo esc_html( $pill ); ?>
								</span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
