<?php
/**
 * Template Name: Start A Project / Contact
 *
 * @package Nukto
 */

get_header();

$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : get_theme_mod( 'nukto_cp_hero_tag', 'Direct Commission' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_theme_mod( 'nukto_cp_hero_headline', "Let's Build Something Extraordinary Together" );
$hero_lead     = ! empty( $meta_lead ) ? $meta_lead : get_theme_mod( 'nukto_cp_hero_lead', 'Ready to elevate your visual identity, Amazon storefront, or advertising campaign? Fill out the project brief below or reach out directly.' );

$form_tag      = get_theme_mod( 'nukto_cp_form_tag', 'Project Brief' );
$form_headline = get_theme_mod( 'nukto_cp_form_headline', 'Tell Us About Your Vision' );

$direct_tag      = get_theme_mod( 'nukto_cp_direct_tag', 'Fast Communication' );
$direct_headline = get_theme_mod( 'nukto_cp_direct_headline', 'Direct Studio Access' );
$direct_lead     = get_theme_mod( 'nukto_cp_direct_lead', 'Prefer direct communication? Reach our team directly via email or WhatsApp for immediate onboarding.' );

$phone    = get_theme_mod( 'nukto_contact_phone', '+92 324 3601950' );
$email    = get_theme_mod( 'nukto_contact_email', 'nuktopoint@gmail.com' );
$clean_wa = preg_replace( '/[^0-9]/', '', $phone );

$loc1_city    = get_theme_mod( 'nukto_loc1_city', 'Islamabad' );
$loc1_address = get_theme_mod( 'nukto_loc1_address', 'Creative Studio, Sector F-7, Islamabad, Pakistan' );
$loc2_city    = get_theme_mod( 'nukto_loc2_city', 'Karachi' );
$loc2_address = get_theme_mod( 'nukto_loc2_address', 'Media Hub, Clifton Block 5, Karachi, Pakistan' );
$loc3_city    = get_theme_mod( 'nukto_loc3_city', 'Hyderabad' );
$loc3_address = get_theme_mod( 'nukto_loc3_address', 'Communication Design Lab, Auto Bhan, Hyderabad, Pakistan' );

$g1_icon  = get_theme_mod( 'nukto_cp_g1_icon', '⚡' );
$g1_title = get_theme_mod( 'nukto_cp_g1_title', '24-Hour Turnaround' );
$g1_desc  = get_theme_mod( 'nukto_cp_g1_desc', 'Every project brief receives a detailed response within 1 business day.' );

$g2_icon  = get_theme_mod( 'nukto_cp_g2_icon', '🔒' );
$g2_title = get_theme_mod( 'nukto_cp_g2_title', 'NDA Protection' );
$g2_desc  = get_theme_mod( 'nukto_cp_g2_desc', 'We honor strict confidentiality for unreleased products & institutional assets.' );
?>

<main id="primary" class="nk-main-content nk-contact-page">
	<!-- Contact Page Hero -->
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

	<!-- Contact Grid & Form -->
	<section class="nk-section nk-contact-main-section">
		<div class="nk-container">
			<div class="nk-contact-page-grid">
				<!-- Left Column: Form -->
				<div class="nk-contact-form-column">
					<div class="nk-contact-card">
						<div class="nk-section-title-wrap" style="margin-bottom: 2rem;">
							<span class="nk-section-tag"><?php echo esc_html( $form_tag ); ?></span>
							<h2 class="nk-section-h2" style="font-size: 1.75rem;"><?php echo esc_html( $form_headline ); ?></h2>
						</div>

						<form id="nkContactForm" class="nk-contact-form" novalidate>
							<!-- Row 1: Name & Email -->
							<div class="nk-form-grid-2">
								<div class="nk-input-wrap">
									<input type="text" id="nkName" name="name" class="nk-input" placeholder="<?php esc_attr_e( 'Full Name *', 'nukto' ); ?>" required />
								</div>
								<div class="nk-input-wrap">
									<input type="email" id="nkEmail" name="email" class="nk-input" placeholder="<?php esc_attr_e( 'Email Address *', 'nukto' ); ?>" required />
								</div>
							</div>

							<!-- Row 2: Phone & Company -->
							<div class="nk-form-grid-2">
								<div class="nk-input-wrap">
									<input type="tel" id="nkPhone" name="phone" class="nk-input" placeholder="<?php esc_attr_e( 'Phone / WhatsApp', 'nukto' ); ?>" />
								</div>
								<div class="nk-input-wrap">
									<input type="text" id="nkCompany" name="company" class="nk-input" placeholder="<?php esc_attr_e( 'Company / Brand Name', 'nukto' ); ?>" />
								</div>
							</div>

							<!-- Row 3: Designation & Referral -->
							<div class="nk-form-grid-2">
								<div class="nk-input-wrap">
									<input type="text" id="nkDesignation" name="designation" class="nk-input" placeholder="<?php esc_attr_e( 'Your Role / Title', 'nukto' ); ?>" />
								</div>
								<div class="nk-input-wrap">
									<select id="nkHearAbout" name="hear_about" class="nk-select">
										<option value=""><?php esc_html_e( 'How did you hear about us?', 'nukto' ); ?></option>
										<option value="Behance"><?php esc_html_e( 'Behance Portfolio', 'nukto' ); ?></option>
										<option value="Instagram"><?php esc_html_e( 'Instagram', 'nukto' ); ?></option>
										<option value="Google"><?php esc_html_e( 'Google Search', 'nukto' ); ?></option>
										<option value="Client Referral"><?php esc_html_e( 'Client / Colleague Referral', 'nukto' ); ?></option>
										<option value="Other"><?php esc_html_e( 'Other', 'nukto' ); ?></option>
									</select>
								</div>
							</div>

							<!-- Services Checkboxes -->
							<div class="nk-form-group">
								<span class="nk-form-label"><?php esc_html_e( 'Services Required:', 'nukto' ); ?></span>
								<div class="nk-pills-wrap">
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Branding & Identity" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Branding & Identity', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Amazon Listing & E-Commerce" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Amazon & E-Commerce', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Packaging Design" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Packaging Design', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Billboard & Print" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Billboard & Print', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Social Media Campaigns" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Social Media Campaigns', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="checkbox" name="services[]" value="Video Production" class="nk-pill-checkbox" />
										<span class="nk-pill-label"><?php esc_html_e( 'Video & Photography', 'nukto' ); ?></span>
									</label>
								</div>
							</div>

							<!-- Budget Range -->
							<div class="nk-form-group">
								<span class="nk-form-label"><?php esc_html_e( 'Estimated Budget (USD / PKR equivalent):', 'nukto' ); ?></span>
								<div class="nk-pills-wrap">
									<label class="nk-interactive">
										<input type="radio" name="budget" value="$1,000 - $3,000" class="nk-pill-radio" checked />
										<span class="nk-pill-label"><?php esc_html_e( '$1,000 - $3,000', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="radio" name="budget" value="$3,000 - $5,000" class="nk-pill-radio" />
										<span class="nk-pill-label"><?php esc_html_e( '$3,000 - $5,000', 'nukto' ); ?></span>
									</label>
									<label class="nk-interactive">
										<input type="radio" name="budget" value="$5,000 +" class="nk-pill-radio" />
										<span class="nk-pill-label"><?php esc_html_e( '$5,000 +', 'nukto' ); ?></span>
									</label>
								</div>
							</div>

							<!-- Message Textarea -->
							<div class="nk-form-group">
								<textarea id="nkMessage" name="message" class="nk-textarea" placeholder="<?php esc_attr_e( 'Please describe your project, deliverables, and desired launch timeline... *', 'nukto' ); ?>" rows="5" required></textarea>
							</div>

							<!-- Submit Button -->
							<button type="submit" id="nkSubmitBtn" class="nk-btn-submit nk-interactive">
								<span id="nkSubmitText"><?php esc_html_e( 'Send Project Inquiry', 'nukto' ); ?></span>
							</button>

							<div id="nkFormResponse" class="nk-form-response" role="alert"></div>
						</form>
					</div>
				</div>

				<!-- Right Column: Direct Info & Hubs -->
				<div class="nk-contact-info-column">
					<div class="nk-direct-info-card nk-interactive">
						<span class="nk-section-tag"><?php echo esc_html( $direct_tag ); ?></span>
						<h3 class="nk-direct-h3"><?php echo esc_html( $direct_headline ); ?></h3>
						<p class="nk-direct-p"><?php echo esc_html( $direct_lead ); ?></p>

						<div class="nk-contact-direct-links">
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="nk-direct-btn nk-interactive">
								<span class="nk-btn-icon">✉</span>
								<span><?php echo esc_html( $email ); ?></span>
							</a>

							<a href="https://wa.me/<?php echo esc_attr( $clean_wa ); ?>?text=<?php echo urlencode( "Hello Nukto Point, I would like to inquire about a design project." ); ?>" target="_blank" rel="noopener noreferrer" class="nk-direct-btn nk-wa-btn nk-interactive">
								<span class="nk-btn-icon">💬</span>
								<span><?php esc_html_e( 'Chat on WhatsApp', 'nukto' ); ?> (<?php echo esc_html( $phone ); ?>)</span>
							</a>
						</div>
					</div>

					<div class="nk-hubs-card">
						<h4 class="nk-hubs-title"><?php esc_html_e( 'Operational Hubs', 'nukto' ); ?></h4>
						<div class="nk-hub-item">
							<span class="nk-hub-city"><?php echo esc_html( $loc1_city ); ?></span>
							<p class="nk-hub-desc"><?php echo esc_html( $loc1_address ); ?></p>
						</div>
						<div class="nk-hub-item">
							<span class="nk-hub-city"><?php echo esc_html( $loc2_city ); ?></span>
							<p class="nk-hub-desc"><?php echo esc_html( $loc2_address ); ?></p>
						</div>
						<div class="nk-hub-item">
							<span class="nk-hub-city"><?php echo esc_html( $loc3_city ); ?></span>
							<p class="nk-hub-desc"><?php echo esc_html( $loc3_address ); ?></p>
						</div>
					</div>

					<div class="nk-guarantees-card">
						<div class="nk-guarantee-item">
							<span class="nk-g-icon"><?php echo esc_html( $g1_icon ); ?></span>
							<div class="nk-g-text">
								<strong><?php echo esc_html( $g1_title ); ?></strong>
								<span><?php echo esc_html( $g1_desc ); ?></span>
							</div>
						</div>
						<div class="nk-guarantee-item">
							<span class="nk-g-icon"><?php echo esc_html( $g2_icon ); ?></span>
							<div class="nk-g-text">
								<strong><?php echo esc_html( $g2_title ); ?></strong>
								<span><?php echo esc_html( $g2_desc ); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
