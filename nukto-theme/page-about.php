<?php
/**
 * Template Name: About Studio & Leadership
 *
 * @package Nukto
 */

get_header();

$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : get_theme_mod( 'nukto_ap_hero_tag', 'The Studio & Ethos' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_theme_mod( 'nukto_ap_hero_headline', 'Think Big. Create Bold. Make Something Matter.' );
$hero_lead     = ! empty( $meta_lead ) ? $meta_lead : get_theme_mod( 'nukto_ap_hero_lead', 'Nukto Point is an avant-garde communication design and branding studio operating at the intersection of academic research rigor and high-converting commercial execution.' );

// Profile Badges
$badge_title = get_theme_mod( 'nukto_ap_badge_title', 'NUKTO POINT' );
$badge_sub   = get_theme_mod( 'nukto_ap_badge_sub', 'Lead Communication Designer • M.Phil Art & Design' );

// Narrative
$narrative_tag      = get_theme_mod( 'nukto_ap_narrative_tag', 'Background & Vision' );
$narrative_headline = get_theme_mod( 'nukto_ap_narrative_headline', 'A Decade of Transforming Strategic Ideas into Visual Reality' );
$narrative_p1       = get_theme_mod(
	'nukto_ap_p1',
	'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.'
);
$narrative_p2       = get_theme_mod(
	'nukto_ap_p2',
	'Having worked across prestigious educational institutions, corporate sectors, and broadcast media, I bring a multidisciplinary approach to every project — from concept development to final execution. I am passionate about visual storytelling, detail-oriented design, and continuous learning.'
);
$narrative_p3       = get_theme_mod(
	'nukto_ap_p3',
	'Every layout, color palette, and typographic decision we produce is backed by strategic rationale designed to communicate clearly, inspire audiences, and generate measurable market value for ambitious brands.'
);

// Credentials
$c1_num   = get_theme_mod( 'nukto_ap_c1_num', '10+' );
$c1_label = get_theme_mod( 'nukto_ap_c1_label', 'Years Industry Experience' );
$c2_num   = get_theme_mod( 'nukto_ap_c2_num', 'M.Phil' );
$c2_label = get_theme_mod( 'nukto_ap_c2_label', 'Art & Design Degree' );
$c3_num   = get_theme_mod( 'nukto_ap_c3_num', 'SZABIST' );
$c3_label = get_theme_mod( 'nukto_ap_c3_label', 'Visiting Faculty Role' );

// Milestones
$tl_tag      = get_theme_mod( 'nukto_ap_tl_tag', 'Institutional Experience' );
$tl_headline = get_theme_mod( 'nukto_ap_tl_headline', 'Career Milestones & Institutional Leadership' );
$milestone_defaults = array(
	1 => array(
		'year' => '2022 — Present',
		'role' => 'PR & IT Officer',
		'org'  => 'Pak-Turk Maarif International',
		'loc'  => 'Hyderabad, Pakistan',
		'desc' => 'Spearheading public relations communication, convention branding, institutional advertising, and cross-media design standards for international campuses.',
	),
	2 => array(
		'year' => '2019 — 2022',
		'role' => 'Graphic Designer & Visiting Faculty',
		'org'  => 'SZABIST UNIVERSITY',
		'loc'  => 'Larkana / Sindh, Pakistan',
		'desc' => 'Directed university admissions billboard campaigns, event collateral, and academic branding while instructing higher education students in graphic design and visual theory.',
	),
	3 => array(
		'year' => '2018 — 2019',
		'role' => 'Graphic Designer & Brand Specialist',
		'org'  => 'Eastline Communication',
		'loc'  => 'Hyderabad, Pakistan',
		'desc' => 'Delivered high-volume advertising campaigns, corporate identity packages, and pre-press quality assurance for regional enterprise clients.',
	),
	4 => array(
		'year' => '2016 — 2018',
		'role' => 'Graphic Designer & Creative Lead',
		'org'  => 'Switch Studio',
		'loc'  => 'Karachi, Pakistan',
		'desc' => 'Led commercial social media campaigns, Amazon brand assets, packaging dieline design, and lifestyle photography for retail accounts.',
	),
	5 => array(
		'year' => '2014 — 2016',
		'role' => 'N.L Editor & Motion Designer',
		'org'  => 'KTN TV Entertainment',
		'loc'  => 'Karachi, Pakistan',
		'desc' => 'Commercial television broadcast video editing, motion graphic titles, promotional segment packaging, and audio-visual synchronization.',
	),
);

// CTA
$cta_tag      = get_theme_mod( 'nukto_ap_cta_tag', 'Let Us Connect' );
$cta_headline = get_theme_mod( 'nukto_ap_cta_headline', 'Ready to work with a dedicated, research-backed design partner?' );
$cta_lead     = get_theme_mod( 'nukto_ap_cta_lead', 'Let us build an enduring visual identity for your business.' );
$cta_btn      = get_theme_mod( 'nukto_ap_cta_btn', 'Get in Touch' );
$cta_url      = get_theme_mod( 'nukto_ap_cta_url', home_url( '/contact/' ) );
if ( empty( $cta_url ) || '/contact/' === $cta_url ) {
	$cta_url = home_url( '/contact/' );
}
?>

<main id="primary" class="nk-main-content nk-about-page">
	<!-- About Page Hero -->
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

	<!-- Leadership & Biography Split -->
	<section class="nk-section nk-about-profile-section">
		<div class="nk-container">
			<div class="nk-about-profile-grid">
				<div class="nk-about-avatar-column">
					<div class="nk-profile-card nk-interactive">
						<div class="nk-profile-image-wrap">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/branding/nukto-avatar.jpg' ); ?>" alt="<?php esc_attr_e( 'Nukto Point Founder — Communication Designer', 'nukto' ); ?>" loading="lazy" />
						</div>
						<div class="nk-profile-badge-strip">
							<span class="nk-badge-title"><?php echo esc_html( $badge_title ); ?></span>
							<span class="nk-badge-sub"><?php echo esc_html( $badge_sub ); ?></span>
						</div>
					</div>
				</div>

				<div class="nk-about-narrative-column">
					<span class="nk-section-tag"><?php echo esc_html( $narrative_tag ); ?></span>
					<h2 class="nk-narrative-h2"><?php echo esc_html( $narrative_headline ); ?></h2>
					<div class="nk-narrative-wysiwyg">
						<p class="nk-lead-p">
							<?php echo esc_html( $narrative_p1 ); ?>
						</p>
						<p>
							<?php echo esc_html( $narrative_p2 ); ?>
						</p>
						<p>
							<?php echo esc_html( $narrative_p3 ); ?>
						</p>
					</div>

					<div class="nk-credentials-strip">
						<div class="nk-cred-item">
							<span class="nk-cred-num"><?php echo esc_html( $c1_num ); ?></span>
							<span class="nk-cred-label"><?php echo esc_html( $c1_label ); ?></span>
						</div>
						<div class="nk-cred-item">
							<span class="nk-cred-num"><?php echo esc_html( $c2_num ); ?></span>
							<span class="nk-cred-label"><?php echo esc_html( $c2_label ); ?></span>
						</div>
						<div class="nk-cred-item">
							<span class="nk-cred-num"><?php echo esc_html( $c3_num ); ?></span>
							<span class="nk-cred-label"><?php echo esc_html( $c3_label ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Career Milestones & Institutional Leadership Timeline -->
	<section class="nk-section nk-timeline-section">
		<div class="nk-container">
			<div class="nk-section-title-wrap">
				<span class="nk-section-tag"><?php echo esc_html( $tl_tag ); ?></span>
				<h2 class="nk-section-h2"><?php echo esc_html( $tl_headline ); ?></h2>
			</div>

			<div class="nk-timeline-track">
				<?php foreach ( $milestone_defaults as $mi => $md ) : ?>
					<?php
					$m_year = get_theme_mod( "nukto_ap_m{$mi}_year", $md['year'] );
					$m_role = get_theme_mod( "nukto_ap_m{$mi}_role", $md['role'] );
					$m_org  = get_theme_mod( "nukto_ap_m{$mi}_org", $md['org'] );
					$m_loc  = get_theme_mod( "nukto_ap_m{$mi}_loc", $md['loc'] );
					$m_desc = get_theme_mod( "nukto_ap_m{$mi}_desc", $md['desc'] );
					?>
					<div class="nk-timeline-item nk-interactive">
						<div class="nk-timeline-year"><?php echo esc_html( $m_year ); ?></div>
						<div class="nk-timeline-card">
							<span class="nk-timeline-role"><?php echo esc_html( $m_role ); ?></span>
							<h3 class="nk-timeline-org"><?php echo esc_html( $m_org ); ?></h3>
							<?php if ( ! empty( $m_loc ) ) : ?>
								<p class="nk-timeline-loc"><?php echo esc_html( $m_loc ); ?></p>
							<?php endif; ?>
							<p class="nk-timeline-desc"><?php echo esc_html( $m_desc ); ?></p>
						</div>
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
