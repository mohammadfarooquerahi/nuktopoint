<?php
/**
 * Template Name: Reviews & Endorsements
 *
 * @package Nukto
 */

get_header();

$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : get_theme_mod( 'nukto_rp_hero_tag', 'Client Endorsements' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_theme_mod( 'nukto_rp_hero_headline', 'Endorsed by Institutional Leaders & Global Brands' );
$hero_lead     = ! empty( $meta_lead ) ? $meta_lead : get_theme_mod( 'nukto_rp_hero_lead', 'Discover how our strategic communication design and high-conversion visual assets have elevated organizations across academic, commercial, and e-commerce sectors.' );

$reviews_defaults = array(
	1 => array(
		'quote'  => 'Nukto Point completely redefined our university admissions campaign visuals. The billboards and social graphics commanded immediate attention across all target cities. The academic rigor behind their design rationale is unmatched.',
		'author' => 'Institutional Director',
		'role'   => 'SZABIST University',
	),
	2 => array(
		'quote'  => 'From international convention standees to institutional PR collateral, Nukto Point consistently delivers world-class design standards. They understand both complex messaging and clean aesthetic execution.',
		'author' => 'Communications Committee',
		'role'   => 'Pak-Turk Maarif International',
	),
	3 => array(
		'quote'  => 'Our Amazon listing conversion rate increased by over 34% within the first month of deploying the new 7-image sequence and A+ EBC modules. Truly exceptional 3D product rendering and visual hierarchy.',
		'author' => 'Managing Director',
		'role'   => 'Apex Cutlery / Amazon Brand',
	),
	4 => array(
		'quote'  => 'Having worked with Nukto Point across dozens of commercial advertising campaigns, their ability to take high-stakes creative briefs and deliver ready-to-print perfection every single time makes them an indispensable partner.',
		'author' => 'Creative Director',
		'role'   => 'Switch Studio',
	),
	5 => array(
		'quote'  => 'The box dieline and unboxing experience Nukto designed for our D2C consumer product earned rave customer reviews. They understand packaging ergonomics and retail shelf presence like true masters.',
		'author' => 'Brand Co-Founder',
		'role'   => 'Retail D2C Goods',
	),
	6 => array(
		'quote'  => 'Their social awareness and holiday campaign graphics consistently achieve our highest organic engagement rates. Nukto Point knows how to tell emotional visual stories that stop the scroll.',
		'author' => 'Senior PR Lead',
		'role'   => 'Community Advocacy Council',
	),
);

// CTA
$cta_tag      = get_theme_mod( 'nukto_rp_cta_tag', 'Join Our Partners' );
$cta_headline = get_theme_mod( 'nukto_rp_cta_headline', 'Experience the difference research-backed design makes.' );
$cta_lead     = get_theme_mod( 'nukto_rp_cta_lead', "Let's build an iconic visual identity for your organization." );
$cta_btn      = get_theme_mod( 'nukto_rp_cta_btn', 'Start Your Project' );
$cta_url      = get_theme_mod( 'nukto_rp_cta_url', home_url( '/contact/' ) );
if ( empty( $cta_url ) || '/contact/' === $cta_url ) {
	$cta_url = home_url( '/contact/' );
}
?>

<main id="primary" class="nk-main-content nk-reviews-page">
	<!-- Reviews Page Hero -->
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

	<!-- Reviews Masonry Cards -->
	<section class="nk-section nk-reviews-grid-section">
		<div class="nk-container">
			<div class="nk-reviews-cards-grid">
				<?php foreach ( $reviews_defaults as $ri => $rd ) : ?>
					<?php
					$quote  = get_theme_mod( "nukto_rp_r{$ri}_quote", $rd['quote'] );
					$author = get_theme_mod( "nukto_rp_r{$ri}_author", $rd['author'] );
					$role   = get_theme_mod( "nukto_rp_r{$ri}_role", $rd['role'] );
					?>
					<div class="nk-review-card nk-interactive">
						<div class="nk-stars">★★★★★</div>
						<p class="nk-review-quote">
							<?php echo esc_html( $quote ); ?>
						</p>
						<div class="nk-review-author">
							<div class="nk-author-info">
								<span class="nk-author-name"><?php echo esc_html( $author ); ?></span>
								<span class="nk-author-role"><?php echo esc_html( $role ); ?></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Live Counter Stats Grid -->
	<section class="nk-section" style="padding-top: 0;">
		<div class="nk-container">
			<?php get_template_part( 'template-parts/stats' ); ?>
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
