<?php
/**
 * Template Name: Start A Project / Contact
 *
 * @package Nukto
 */

get_header();

$phone    = get_theme_mod( 'nukto_contact_phone', '+92 324 3601950' );
$email    = get_theme_mod( 'nukto_contact_email', 'nuktopoint@gmail.com' );
$clean_wa = preg_replace( '/[^0-9]/', '', $phone );
?>

<main id="primary" class="nk-main-content nk-contact-page">
	<!-- Contact Page Hero -->
	<section class="nk-page-hero">
		<div class="nk-container">
			<div class="nk-page-hero-inner">
				<span class="nk-section-tag"><?php esc_html_e( 'Direct Commission', 'nukto' ); ?></span>
				<h1 class="nk-page-h1"><?php esc_html_e( "Let's Build Something Extraordinary Together", 'nukto' ); ?></h1>
				<p class="nk-page-lead">
					<?php esc_html_e( 'Ready to elevate your visual identity, Amazon storefront, or advertising campaign? Fill out the project brief below or reach out directly.', 'nukto' ); ?>
				</p>
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
							<span class="nk-section-tag"><?php esc_html_e( 'Project Brief', 'nukto' ); ?></span>
							<h2 class="nk-section-h2" style="font-size: 1.75rem;"><?php esc_html_e( 'Tell Us About Your Vision', 'nukto' ); ?></h2>
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
						<span class="nk-section-tag"><?php esc_html_e( 'Fast Communication', 'nukto' ); ?></span>
						<h3 class="nk-direct-h3"><?php esc_html_e( 'Direct Studio Access', 'nukto' ); ?></h3>
						<p class="nk-direct-p"><?php esc_html_e( 'Prefer direct communication? Reach our team directly via email or WhatsApp for immediate onboarding.', 'nukto' ); ?></p>

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
							<span class="nk-hub-city">Islamabad</span>
							<p class="nk-hub-desc">Sector F-7 Creative Studio, Islamabad, Pakistan</p>
						</div>
						<div class="nk-hub-item">
							<span class="nk-hub-city">Karachi</span>
							<p class="nk-hub-desc">Clifton Block 5 Media Hub, Karachi, Pakistan</p>
						</div>
						<div class="nk-hub-item">
							<span class="nk-hub-city">Hyderabad</span>
							<p class="nk-hub-desc">Auto Bhan Communication Design Lab, Hyderabad, Pakistan</p>
						</div>
					</div>

					<div class="nk-guarantees-card">
						<div class="nk-guarantee-item">
							<span class="nk-g-icon">⚡</span>
							<div class="nk-g-text">
								<strong><?php esc_html_e( '24-Hour Turnaround', 'nukto' ); ?></strong>
								<span><?php esc_html_e( 'Every project brief receives a detailed response within 1 business day.', 'nukto' ); ?></span>
							</div>
						</div>
						<div class="nk-guarantee-item">
							<span class="nk-g-icon">🔒</span>
							<div class="nk-g-text">
								<strong><?php esc_html_e( 'NDA Protection', 'nukto' ); ?></strong>
								<span><?php esc_html_e( 'We honor strict confidentiality for unreleased products & institutional assets.', 'nukto' ); ?></span>
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
