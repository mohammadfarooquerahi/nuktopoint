<?php
/**
 * Template Part: Let's Connect (Contact Form)
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_tag      = get_theme_mod( 'nukto_cp_form_tag', 'Start A Project' );
$form_headline = get_theme_mod( 'nukto_cp_form_headline', "Let's Connect & Build Something Great" );
?>
<section class="nk-section nk-contact-section" id="contact">
	<div class="nk-container">
		<div class="nk-contact-card">
			<div class="nk-section-title-wrap" style="margin-bottom: 2.5rem;">
				<span class="nk-section-tag"><?php echo esc_html( $form_tag ); ?></span>
				<h2 class="nk-section-h2"><?php echo esc_html( $form_headline ); ?></h2>
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
						<input type="text" id="nkDesignation" name="designation" class="nk-input" placeholder="<?php esc_attr_e( 'Your Designation / Role', 'nukto' ); ?>" />
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

				<!-- Services Pill Checkboxes -->
				<div class="nk-form-group">
					<span class="nk-form-label"><?php esc_html_e( 'I am interested in:', 'nukto' ); ?></span>
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
							<span class="nk-pill-label"><?php esc_html_e( 'Billboard & Outdoor Print', 'nukto' ); ?></span>
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

				<!-- Budget Radio Pills -->
				<div class="nk-form-group">
					<span class="nk-form-label"><?php esc_html_e( 'Estimated Project Budget:', 'nukto' ); ?></span>
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
					<textarea id="nkMessage" name="message" class="nk-textarea" placeholder="<?php esc_attr_e( 'Tell us about your project vision, timeline, and key requirements... *', 'nukto' ); ?>" required></textarea>
				</div>

				<!-- Submit Button -->
				<button type="submit" id="nkSubmitBtn" class="nk-btn-submit nk-interactive">
					<span id="nkSubmitText"><?php esc_html_e( 'Send Project Inquiry', 'nukto' ); ?></span>
				</button>

				<!-- Response Messages -->
				<div id="nkFormResponse" class="nk-form-response" role="alert"></div>
			</form>
		</div>
	</div>
</section>
