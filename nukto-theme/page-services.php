<?php
/**
 * Template Name: Capabilities & Services
 *
 * @package Nukto
 */

get_header();

$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : get_theme_mod( 'nukto_sp_hero_tag', 'Our Capabilities' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_theme_mod( 'nukto_sp_hero_headline', 'Visual Systems Engineered for Authority & Conversion' );
$hero_lead     = ! empty( $meta_lead ) ? $meta_lead : get_theme_mod( 'nukto_sp_hero_lead', 'From complete brand identity systems and Amazon storefront assets to high-impact highway billboards, we combine academic design rigor with commercial execution.' );

// 5 Services Defaults
$sp_service_defaults = array(
	1 => array(
		'title' => 'Branding & Visual Identity Systems',
		'lead'  => 'Distinctive identities built from first principles to endure, inspire, and separate your organization from generic market competitors.',
		'items' => "Comprehensive Brand Identity & Strategy Architecture\nPrimary, Secondary & Icon Mark Vector Formats\nBespoke Typography Hierarchy & Color Matrix\nBrand Guidelines Manual (Print & Digital Deployment)\nStationery Suite, Corporate Business Cards & Letterheads",
	),
	2 => array(
		'title' => 'E-Commerce & Amazon Creative',
		'lead'  => 'Conversion-optimized visual architectures engineered for Amazon US/EU and high-volume direct-to-consumer digital shelves.',
		'items' => "High-Converting Amazon 7-Image Listing Sequences\nAmazon A+ Content & Enhanced Brand Content (EBC) Modules\nCustom Packaging Box Dielines & Label Graphic Standards\n3D Photorealistic Product Retouching & Rendering\nTechnical Feature Infographics & Dimensional Breakdowns",
	),
	3 => array(
		'title' => 'Advertising & Large-Format Outdoor Print',
		'lead'  => 'High-impact physical media crafted to command highway visibility, convention attention, and lasting consumer recall.',
		'items' => "Highway Hoarding & High-Visibility Billboards\nConvention Rollup Standees & Event Exhibition Displays\nInstitutional Admissions & Corporate Promotional Banners\nCorporate Product Catalogues & Annual Review Publications\nPre-Press Color Profiles (CMYK) & Print Quality Assurance",
	),
	4 => array(
		'title' => 'Social Media Visuals & Campaign Strategy',
		'lead'  => 'Scroll-stopping campaign creative designed to cut through social media feed saturation and drive authentic community engagement.',
		'items' => "Digital Ad Creatives for Meta, LinkedIn & Instagram\nSeasonal Holiday Campaigns (Mother's Day, Summer Promos)\nPublic Relations & Social Advocacy Graphic Direction\nTypographic Templates & Social Grid Master Kits\nMotion Graphic Micro-Assets & Video Ad Overlays",
	),
	5 => array(
		'title' => 'Commercial Media & Video Production',
		'lead'  => 'Compelling narrative video editing, broadcast overlays, and photography developed with television and digital studio experience.',
		'items' => "Commercial Video Editing & Cinematic Color Grading\nInstitutional Brand Documentaries & Founder Stories\nCommercial Studio & Outdoor Product Photography\nTelevision Broadcast Graphics & Motion Titles\nAudio Synchronization & Sound Design Sweetening",
	),
);

// 4-Stage Process Defaults
$proc_tag      = get_theme_mod( 'nukto_sp_proc_tag', 'Our Methodology' );
$proc_headline = get_theme_mod( 'nukto_sp_proc_headline', 'The 4-Stage Creative Engine' );
$process_defaults = array(
	1 => array( 'title' => 'Strategic Discovery', 'desc' => 'We interrogate your market landscape, competitive positioning, and consumer psychology before touching any visual software.' ),
	2 => array( 'title' => 'Concept Direction', 'desc' => 'We develop diverse conceptual paths combining typography hierarchy, color theory, and bespoke spatial layouts.' ),
	3 => array( 'title' => 'High-Fidelity Craft', 'desc' => 'Selected concepts are forged into perfection with vector precision, 3D dieline rendering, and rigorous attention to detail.' ),
	4 => array( 'title' => 'Omni-Channel Rollout', 'desc' => 'Complete asset packages delivered in production-ready formats (print-ready CMYK PDFs, web SVGs, and brand manuals).' ),
);

// CTA Defaults
$cta_tag      = get_theme_mod( 'nukto_sp_cta_tag', 'Commission Our Studio' );
$cta_headline = get_theme_mod( 'nukto_sp_cta_headline', 'Ready to engineer your brand into an industry leader?' );
$cta_lead     = get_theme_mod( 'nukto_sp_cta_lead', 'Let us define the visual standard for your organization.' );
$cta_btn      = get_theme_mod( 'nukto_sp_cta_btn', 'Start A Project' );
$cta_url      = get_theme_mod( 'nukto_sp_cta_url', home_url( '/contact/' ) );
if ( empty( $cta_url ) || '/contact/' === $cta_url ) {
	$cta_url = home_url( '/contact/' );
}
?>

<main id="primary" class="nk-main-content nk-services-page">
	<!-- Services Page Hero -->
	<section class="nk-page-hero">
		<div class="nk-container">
			<div class="nk-page-hero-inner">
				<span class="nk-section-tag"><?php echo esc_html( $hero_tag ); ?></span>
				<h1 class="nk-page-h1"><?php echo esc_html( $hero_headline ); ?></h1>
				<p class="nk-page-lead">
					<?php echo esc_html( $hero_lead ); ?>
				</p>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if ( get_the_content() ) : ?>
							<div class="nk-page-editor-content" style="margin-top: 1.5rem; color: var(--nk-text-muted); font-size: 1.05rem; line-height: 1.7;">
								<?php the_content(); ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Detailed Service Deep Dives -->
	<section class="nk-section nk-services-detail-section">
		<div class="nk-container">
			<?php foreach ( $sp_service_defaults as $spi => $spd ) : ?>
				<?php
				$s_title = get_theme_mod( "nukto_sp_s{$spi}_title", $spd['title'] );
				$s_lead  = get_theme_mod( "nukto_sp_s{$spi}_lead", $spd['lead'] );
				$s_raw   = get_theme_mod( "nukto_sp_s{$spi}_items", $spd['items'] );
				$s_items = array_filter( array_map( 'trim', explode( "\n", $s_raw ) ) );
				?>
				<div class="nk-service-detail-row">
					<div class="nk-service-detail-meta">
						<span class="nk-service-number"><?php echo esc_html( sprintf( '%02d', $spi ) ); ?></span>
						<h2 class="nk-service-h2"><?php echo esc_html( $s_title ); ?></h2>
						<p class="nk-service-lead"><?php echo esc_html( $s_lead ); ?></p>
					</div>
					<div class="nk-service-detail-body">
						<div class="nk-deliverables-box">
							<h4 class="nk-box-title"><?php esc_html_e( 'Core Deliverables', 'nukto' ); ?></h4>
							<?php if ( ! empty( $s_items ) ) : ?>
								<ul class="nk-deliverable-list">
									<?php foreach ( $s_items as $item ) : ?>
										<li><span class="nk-check-dot"></span> <?php echo esc_html( $item ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- The 4-Stage Creative Engine -->
	<section class="nk-section nk-process-section">
		<div class="nk-container">
			<div class="nk-section-title-wrap text-center">
				<span class="nk-section-tag"><?php echo esc_html( $proc_tag ); ?></span>
				<h2 class="nk-section-h2"><?php echo esc_html( $proc_headline ); ?></h2>
			</div>

			<div class="nk-process-grid">
				<?php foreach ( $process_defaults as $step_i => $step_data ) : ?>
					<?php
					$st_title = get_theme_mod( "nukto_sp_step{$step_i}_title", $step_data['title'] );
					$st_desc  = get_theme_mod( "nukto_sp_step{$step_i}_desc", $step_data['desc'] );
					?>
					<div class="nk-process-step nk-interactive">
						<span class="nk-step-num"><?php echo esc_html( sprintf( '%02d', $step_i ) ); ?></span>
						<h3 class="nk-step-title"><?php echo esc_html( $st_title ); ?></h3>
						<p class="nk-step-desc"><?php echo esc_html( $st_desc ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Call To Action -->
	<section class="nk-section nk-inner-cta-section">
		<div class="nk-container text-center">
			<span class="nk-section-tag"><?php echo esc_html( $cta_tag ); ?></span>
			<h2 class="nk-cta-h2"><?php echo esc_html( $cta_headline ); ?></h2>
			<p class="nk-cta-lead"><?php echo esc_html( $cta_lead ); ?></p>
			<a href="<?php echo esc_url( $cta_url ); ?>" class="nk-btn-work nk-btn-large nk-interactive">
				<span class="nk-pulse-dot" aria-hidden="true"></span>
				<span><?php echo esc_html( $cta_btn ); ?> &rarr;</span>
			</a>
		</div>
	</section>
</main>

<?php
get_footer();
