<?php
/**
 * Template Name: About Studio & Leadership
 *
 * @package Nukto
 */

get_header();
?>

<main id="primary" class="nk-main-content nk-about-page">
	<!-- About Page Hero -->
	<section class="nk-page-hero">
		<div class="nk-container">
			<div class="nk-page-hero-inner">
				<span class="nk-section-tag"><?php esc_html_e( 'The Studio & Ethos', 'nukto' ); ?></span>
				<h1 class="nk-page-h1"><?php esc_html_e( 'Think Big. Create Bold. Make Something Matter.', 'nukto' ); ?></h1>
				<p class="nk-page-lead">
					<?php esc_html_e( 'Nukto Point is an avant-garde communication design and branding studio operating at the intersection of academic research rigor and high-converting commercial execution.', 'nukto' ); ?>
				</p>
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
							<span class="nk-badge-title"><?php esc_html_e( 'NUKTO POINT', 'nukto' ); ?></span>
							<span class="nk-badge-sub"><?php esc_html_e( 'Lead Communication Designer • M.Phil Art & Design', 'nukto' ); ?></span>
						</div>
					</div>
				</div>

				<div class="nk-about-narrative-column">
					<span class="nk-section-tag"><?php esc_html_e( 'Background & Vision', 'nukto' ); ?></span>
					<h2 class="nk-narrative-h2"><?php esc_html_e( 'A Decade of Transforming Strategic Ideas into Visual Reality', 'nukto' ); ?></h2>
					<div class="nk-narrative-wysiwyg">
						<p class="nk-lead-p">
							<?php esc_html_e( 'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.', 'nukto' ); ?>
						</p>
						<p>
							<?php esc_html_e( 'Having worked across prestigious educational institutions, corporate sectors, and broadcast media, I bring a multidisciplinary approach to every project — from concept development to final execution. I am passionate about visual storytelling, detail-oriented design, and continuous learning.', 'nukto' ); ?>
						</p>
						<p>
							<?php esc_html_e( 'Every layout, color palette, and typographic decision we produce is backed by strategic rationale designed to communicate clearly, inspire audiences, and generate measurable market value for ambitious brands.', 'nukto' ); ?>
						</p>
					</div>

					<div class="nk-credentials-strip">
						<div class="nk-cred-item">
							<span class="nk-cred-num">10+</span>
							<span class="nk-cred-label"><?php esc_html_e( 'Years Industry Experience', 'nukto' ); ?></span>
						</div>
						<div class="nk-cred-item">
							<span class="nk-cred-num">M.Phil</span>
							<span class="nk-cred-label"><?php esc_html_e( 'Art & Design Degree', 'nukto' ); ?></span>
						</div>
						<div class="nk-cred-item">
							<span class="nk-cred-num">SZABIST</span>
							<span class="nk-cred-label"><?php esc_html_e( 'Visiting Faculty Role', 'nukto' ); ?></span>
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
				<span class="nk-section-tag"><?php esc_html_e( 'Institutional Experience', 'nukto' ); ?></span>
				<h2 class="nk-section-h2"><?php esc_html_e( 'Career Milestones & Institutional Leadership', 'nukto' ); ?></h2>
			</div>

			<div class="nk-timeline-track">
				<!-- Milestone 1 -->
				<div class="nk-timeline-item nk-interactive">
					<div class="nk-timeline-year">2022 &mdash; Present</div>
					<div class="nk-timeline-card">
						<span class="nk-timeline-role"><?php esc_html_e( 'PR & IT Officer', 'nukto' ); ?></span>
						<h3 class="nk-timeline-org"><?php esc_html_e( 'Pak-Turk Maarif International', 'nukto' ); ?></h3>
						<p class="nk-timeline-loc">Hyderabad, Pakistan</p>
						<p class="nk-timeline-desc"><?php esc_html_e( 'Spearheading public relations communication, convention branding, institutional advertising, and cross-media design standards for international campuses.', 'nukto' ); ?></p>
					</div>
				</div>

				<!-- Milestone 2 -->
				<div class="nk-timeline-item nk-interactive">
					<div class="nk-timeline-year">2019 &mdash; 2022</div>
					<div class="nk-timeline-card">
						<span class="nk-timeline-role"><?php esc_html_e( 'Graphic Designer & Visiting Faculty', 'nukto' ); ?></span>
						<h3 class="nk-timeline-org"><?php esc_html_e( 'SZABIST UNIVERSITY', 'nukto' ); ?></h3>
						<p class="nk-timeline-loc">Larkana / Sindh, Pakistan</p>
						<p class="nk-timeline-desc"><?php esc_html_e( 'Directed university admissions billboard campaigns, event collateral, and academic branding while instructing higher education students in graphic design and visual theory.', 'nukto' ); ?></p>
					</div>
				</div>

				<!-- Milestone 3 -->
				<div class="nk-timeline-item nk-interactive">
					<div class="nk-timeline-year">2018 &mdash; 2019</div>
					<div class="nk-timeline-card">
						<span class="nk-timeline-role"><?php esc_html_e( 'Graphic Designer & Brand Specialist', 'nukto' ); ?></span>
						<h3 class="nk-timeline-org"><?php esc_html_e( 'Eastline Communication', 'nukto' ); ?></h3>
						<p class="nk-timeline-loc">Hyderabad, Pakistan</p>
						<p class="nk-timeline-desc"><?php esc_html_e( 'Delivered high-volume advertising campaigns, corporate identity packages, and pre-press quality assurance for regional enterprise clients.', 'nukto' ); ?></p>
					</div>
				</div>

				<!-- Milestone 4 -->
				<div class="nk-timeline-item nk-interactive">
					<div class="nk-timeline-year">2016 &mdash; 2018</div>
					<div class="nk-timeline-card">
						<span class="nk-timeline-role"><?php esc_html_e( 'Graphic Designer & Creative Lead', 'nukto' ); ?></span>
						<h3 class="nk-timeline-org"><?php esc_html_e( 'Switch Studio', 'nukto' ); ?></h3>
						<p class="nk-timeline-loc">Karachi, Pakistan</p>
						<p class="nk-timeline-desc"><?php esc_html_e( 'Led commercial social media campaigns, Amazon brand assets, packaging dieline design, and lifestyle photography for retail accounts.', 'nukto' ); ?></p>
					</div>
				</div>

				<!-- Milestone 5 -->
				<div class="nk-timeline-item nk-interactive">
					<div class="nk-timeline-year">2014 &mdash; 2016</div>
					<div class="nk-timeline-card">
						<span class="nk-timeline-role"><?php esc_html_e( 'N.L Editor & Motion Designer', 'nukto' ); ?></span>
						<h3 class="nk-timeline-org"><?php esc_html_e( 'KTN TV Entertainment', 'nukto' ); ?></h3>
						<p class="nk-timeline-loc">Karachi, Pakistan</p>
						<p class="nk-timeline-desc"><?php esc_html_e( 'Commercial television broadcast video editing, motion graphic titles, promotional segment packaging, and audio-visual synchronization.', 'nukto' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Call To Action -->
	<section class="nk-section nk-inner-cta-section">
		<div class="nk-container text-center">
			<span class="nk-section-tag"><?php esc_html_e( 'Let Us Connect', 'nukto' ); ?></span>
			<h2 class="nk-cta-h2"><?php esc_html_e( 'Ready to work with a dedicated, research-backed design partner?', 'nukto' ); ?></h2>
			<p class="nk-cta-lead"><?php esc_html_e( 'Let us build an enduring visual identity for your business.', 'nukto' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-btn-work nk-btn-large nk-interactive">
				<span class="nk-pulse-dot" aria-hidden="true"></span>
				<span><?php esc_html_e( 'Get in Touch', 'nukto' ); ?> &rarr;</span>
			</a>
		</div>
	</section>
</main>

<?php
get_footer();
