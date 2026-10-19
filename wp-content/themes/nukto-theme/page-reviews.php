<?php
/**
 * Template Name: Reviews & Endorsements
 *
 * @package Nukto
 */

get_header();
?>

<main id="primary" class="nk-main-content nk-reviews-page">
	<!-- Reviews Page Hero -->
	<section class="nk-page-hero">
		<div class="nk-container">
			<div class="nk-page-hero-inner">
				<span class="nk-section-tag"><?php esc_html_e( 'Client Endorsements', 'nukto' ); ?></span>
				<h1 class="nk-page-h1"><?php esc_html_e( 'Endorsed by Institutional Leaders & Global Brands', 'nukto' ); ?></h1>
				<p class="nk-page-lead">
					<?php esc_html_e( 'Discover how our strategic communication design and high-conversion visual assets have elevated organizations across academic, commercial, and e-commerce sectors.', 'nukto' ); ?>
				</p>
			</div>
		</div>
	</section>

	<!-- Reviews Masonry Cards -->
	<section class="nk-section nk-reviews-grid-section">
		<div class="nk-container">
			<div class="nk-reviews-cards-grid">
				<!-- Review 1 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"Nukto Point completely redefined our university admissions campaign visuals. The billboards and social graphics commanded immediate attention across all target cities. The academic rigor behind their design rationale is unmatched."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Institutional Director</span>
							<span class="nk-author-role">SZABIST University</span>
						</div>
					</div>
				</div>

				<!-- Review 2 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"From international convention standees to institutional PR collateral, Nukto Point consistently delivers world-class design standards. They understand both complex messaging and clean aesthetic execution."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Communications Committee</span>
							<span class="nk-author-role">Pak-Turk Maarif International</span>
						</div>
					</div>
				</div>

				<!-- Review 3 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"Our Amazon listing conversion rate increased by over 34% within the first month of deploying the new 7-image sequence and A+ EBC modules. Truly exceptional 3D product rendering and visual hierarchy."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Managing Director</span>
							<span class="nk-author-role">Apex Cutlery / Amazon Brand</span>
						</div>
					</div>
				</div>

				<!-- Review 4 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"Having worked with Nukto Point across dozens of commercial advertising campaigns, their ability to take high-stakes creative briefs and deliver ready-to-print perfection every single time makes them an indispensable partner."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Creative Director</span>
							<span class="nk-author-role">Switch Studio</span>
						</div>
					</div>
				</div>

				<!-- Review 5 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"The box dieline and unboxing experience Nukto designed for our D2C consumer product earned rave customer reviews. They understand packaging ergonomics and retail shelf presence like true masters."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Brand Co-Founder</span>
							<span class="nk-author-role">Retail D2C Goods</span>
						</div>
					</div>
				</div>

				<!-- Review 6 -->
				<div class="nk-review-card nk-interactive">
					<div class="nk-stars">★★★★★</div>
					<p class="nk-review-quote">
						"Their social awareness and holiday campaign graphics consistently achieve our highest organic engagement rates. Nukto Point knows how to tell emotional visual stories that stop the scroll."
					</p>
					<div class="nk-review-author">
						<div class="nk-author-info">
							<span class="nk-author-name">Senior PR Lead</span>
							<span class="nk-author-role">Community Advocacy Council</span>
						</div>
					</div>
				</div>
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
			<span class="nk-section-tag"><?php esc_html_e( 'Join Our Partners', 'nukto' ); ?></span>
			<h2 class="nk-cta-h2"><?php esc_html_e( 'Experience the difference research-backed design makes.', 'nukto' ); ?></h2>
			<p class="nk-cta-lead"><?php esc_html_e( "Let's build an iconic visual identity for your organization.", 'nukto' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-btn-work nk-btn-large nk-interactive">
				<span class="nk-pulse-dot" aria-hidden="true"></span>
				<span><?php esc_html_e( 'Start Your Project', 'nukto' ); ?> &rarr;</span>
			</a>
		</div>
	</section>
</main>

<?php
get_footer();
