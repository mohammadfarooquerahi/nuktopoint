<?php
/**
 * Theme Helper Functions & AJAX Handlers
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle Contact Form AJAX Submission
 */
function nukto_handle_contact_submission() {
	// Verify Nonce
	check_ajax_referer( 'nukto_contact_nonce', 'security' );

	$name        = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone       = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$company     = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$designation = isset( $_POST['designation'] ) ? sanitize_text_field( wp_unslash( $_POST['designation'] ) ) : '';
	$hear_about  = isset( $_POST['hear_about'] ) ? sanitize_text_field( wp_unslash( $_POST['hear_about'] ) ) : '';
	$message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$budget      = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';

	// Sanitizing array of services
	$services = array();
	if ( isset( $_POST['services'] ) && is_array( $_POST['services'] ) ) {
		$services = array_map( 'sanitize_text_field', wp_unslash( $_POST['services'] ) );
	}

	// Basic Validation
	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) || empty( $message ) ) {
		wp_send_json_error( array( 'message' => __( 'Please fill in all required fields with a valid email address.', 'nukto' ) ) );
	}

	// Email Recipient
	$recipient = get_theme_mod( 'nukto_contact_email', 'nuktopoint@gmail.com' );
	if ( empty( $recipient ) ) {
		$recipient = get_option( 'admin_email' );
	}

	$subject = sprintf( '[Nukto Point] New Project Inquiry from %s', $name );

	$body  = "You have received a new project inquiry from the Nukto Point website:\n\n";
	$body .= "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= "Phone: {$phone}\n";
	$body .= "Company: {$company}\n";
	$body .= "Designation: {$designation}\n";
	$body .= "How they heard about us: {$hear_about}\n";
	$body .= 'Budget Tier: ' . ( ! empty( $budget ) ? $budget : 'Not specified' ) . "\n";
	$body .= 'Services Interested In: ' . ( ! empty( $services ) ? implode( ', ', $services ) : 'General Inquiry' ) . "\n\n";
	$body .= "Project Brief / Message:\n{$message}\n\n";
	$body .= "---\nSent from: " . home_url();

	$headers = array(
		'From: ' . get_bloginfo( 'name' ) . ' <' . $recipient . '>',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	$sent = wp_mail( $recipient, $subject, $body, $headers );

	if ( $sent ) {
		wp_send_json_success( array( 'message' => __( 'Thank you! Your inquiry has been sent to our creative team. We will review your brief and be in touch shortly.', 'nukto' ) ) );
	} else {
		// Even if mail() is not configured on local environment, respond gracefully
		wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been received. Our team will get back to you shortly.', 'nukto' ) ) );
	}
}
add_action( 'wp_ajax_nukto_submit_contact', 'nukto_handle_contact_submission' );
add_action( 'wp_ajax_nopriv_nukto_submit_contact', 'nukto_handle_contact_submission' );

/**
 * Get Project Categories as HTML Chips
 *
 * @param int $post_id Project ID.
 * @return string HTML chips markup.
 */
function nukto_get_project_chips( $post_id ) {
	$terms = get_the_terms( $post_id, 'project_category' );
	$custom_services = get_post_meta( $post_id, '_nukto_services_rendered', true );

	$output = '<div class="nk-card-chips">';

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( array_slice( $terms, 0, 3 ) as $term ) {
			$output .= '<span class="nk-chip">' . esc_html( $term->name ) . '</span>';
		}
	} elseif ( ! empty( $custom_services ) ) {
		$items = array_map( 'trim', explode( ',', $custom_services ) );
		foreach ( array_slice( $items, 0, 3 ) as $item ) {
			$output .= '<span class="nk-chip">' . esc_html( $item ) . '</span>';
		}
	} else {
		$output .= '<span class="nk-chip">' . esc_html__( 'Communication Design', 'nukto' ) . '</span>';
	}

	$output .= '</div>';
	return $output;
}
