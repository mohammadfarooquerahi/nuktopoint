<?php
/**
 * Template Part: Services Section (Sticky Split Screen)
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_tag = get_theme_mod( 'nukto_services_tag', 'Our Capabilities' );
$statement   = get_theme_mod( 'nukto_services_statement', "We're a creative communication agency making brands people remember." );
$subtext     = get_theme_mod( 'nukto_services_subtext', 'Big ideas. Bold design. Real results. You bring the vision; we engineer it into market presence.' );

$default_services = array(
	1 => array(
		'num'   => '01',
		'title' => 'Branding & Visual Identity',
		'desc'  => 'Complete brand strategy, iconic marks, bespoke typography systems, and comprehensive style manuals that make your organization unmistakable.',
		'pills' => 'Brand Systems, Logo & Mark, Typography, Brand Manuals, Stationery Design',
	),
	2 => array(
		'num'   => '02',
		'title' => 'E-Commerce & Amazon Creative',
		'desc'  => 'High-converting digital storefront assets, Amazon listing images, A+ EBC modules, and custom product packaging dielines engineered to sell.',
		'pills' => 'Amazon Listing Sets, A+ / EBC Design, Packaging Dielines, 3D Product Retouching, Infographics',
	),
	3 => array(
		'num'   => '03',
		'title' => 'Advertising & Print Media',
		'desc'  => 'High-impact outdoor highway billboards, event exhibition standees, and publication materials crafted with precision color profiles.',
		'pills' => 'Billboards & Hoardings, Exhibition Standees, Corporate Brochures, Print Production QA, Spatial Branding',
	),
	4 => array(
		'num'   => '04',
		'title' => 'Social Media & Campaigns',
		'desc'  => 'Data-informed creative campaigns, seasonal holiday marketing, and public relations graphics designed to command attention on social feeds.',
		'pills' => 'Social Ad Campaigns, Seasonal Marketing, PR & Advocacy Graphics, Motion Micro-Assets, Social Brand Kits',
	),
	5 => array(
		'num'   => '05',
		'title' => 'Media & Video Production',
		'desc'  => 'Compelling visual storytelling through commercial video editing, institutional documentaries, color grading, and commercial photography.',
		'pills' => 'Commercial Video Editing, Documentaries, Product Photography, Post-Production, Broadcast Overlays',
	),
);

$services_list = array();
foreach ( $default_services as $i => $defaults ) {
	$title     = get_theme_mod( "nukto_s{$i}_title", $defaults['title'] );
	$desc      = get_theme_mod( "nukto_s{$i}_desc", $defaults['desc'] );
	$pills_raw = get_theme_mod( "nukto_s{$i}_pills", $defaults['pills'] );
	$pills     = array_filter( array_map( 'trim', explode( ',', $pills_raw ) ) );

	$services_list[] = array(
		'num'   => sprintf( '%02d', $i ),
		'title' => $title,
		'desc'  => $desc,
		'pills' => $pills,
	);
}
?>
<section class="nk-section nk-services-section" id="services">
	<div class="nk-container">
		<div class="nk-services-split">
			<!-- Pinned Sticky Left Column -->
			<div class="nk-services-sticky-col">
				<span class="nk-section-tag"><?php echo esc_html( $section_tag ); ?></span>
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
						<?php if ( ! empty( $svc['pills'] ) ) : ?>
							<div class="nk-service-items-wrap">
								<?php foreach ( $svc['pills'] as $pill ) : ?>
									<span class="nk-service-pill-item">
										<span class="nk-service-pill-dot"></span>
										<?php echo esc_html( $pill ); ?>
									</span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
