<?php
/**
 * Enqueue Styles and Scripts for Nukto Theme
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Frontend Scripts & Styles
 */
function nukto_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Google Fonts: Montserrat
	wp_enqueue_style(
		'nukto-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap',
		array(),
		null
	);

	// Main Theme Stylesheet
	wp_enqueue_style(
		'nukto-style',
		get_stylesheet_uri(),
		array( 'nukto-fonts' ),
		$theme_version
	);

	// GSAP Core & ScrollTrigger
	wp_enqueue_script(
		'gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.7/gsap.min.js',
		array(),
		'3.12.7',
		true
	);

	wp_enqueue_script(
		'gsap-scrolltrigger',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.7/ScrollTrigger.min.js',
		array( 'gsap' ),
		'3.12.7',
		true
	);

	// Lenis Smooth Scroll
	wp_enqueue_script(
		'lenis',
		'https://unpkg.com/lenis@1.2.3/dist/lenis.min.js',
		array(),
		'1.2.3',
		true
	);

	// Matter.js for Footer Physics Canvas
	wp_enqueue_script(
		'matter-js',
		'https://cdnjs.cloudflare.com/ajax/libs/matter-js/0.19.0/matter.min.js',
		array(),
		'0.19.0',
		true
	);

	// Custom Cursor Script
	wp_enqueue_script(
		'nukto-cursor',
		get_template_directory_uri() . '/assets/js/cursor.js',
		array(),
		$theme_version,
		true
	);

	// Theme Main Script
	wp_enqueue_script(
		'nukto-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery', 'gsap', 'gsap-scrolltrigger', 'lenis' ),
		$theme_version,
		true
	);

	// Physics Canvas Script
	wp_enqueue_script(
		'nukto-physics',
		get_template_directory_uri() . '/assets/js/physics.js',
		array( 'matter-js' ),
		$theme_version,
		true
	);

	// Localize AJAX Script
	wp_localize_script(
		'nukto-main',
		'nuktoData',
		array(
			'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'nukto_contact_nonce' ),
			'themeUrl' => get_template_directory_uri(),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'nukto_enqueue_scripts' );
