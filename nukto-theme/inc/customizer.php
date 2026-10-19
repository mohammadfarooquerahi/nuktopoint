<?php
/**
 * WordPress Customizer Settings for Nukto Theme
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer Panels, Sections, and Controls
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager object.
 */
function nukto_customize_register( $wp_customize ) {

	// =========================================================================
	// Main Theme Panel: Nukto Agency Settings
	// =========================================================================
	$wp_customize->add_panel(
		'nukto_theme_panel',
		array(
			'title'       => __( 'Nukto Theme Options', 'nukto' ),
			'description' => __( 'Configure homepage sections, showreel video, services, stats, and agency contacts.', 'nukto' ),
			'priority'    => 20,
		)
	);

	// -------------------------------------------------------------------------
	// Section 1: Hero Section
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_hero_section',
		array(
			'title'       => __( '1. Hero Section', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 10,
		)
	);

	// Hero Prefix
	$wp_customize->add_setting(
		'nukto_hero_prefix',
		array(
			'default'           => 'Leading Full-Service',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_hero_prefix',
		array(
			'label'    => __( 'Hero Headline Prefix', 'nukto' ),
			'section'  => 'nukto_hero_section',
			'type'     => 'text',
		)
	);

	// Hero Ticker Items
	$wp_customize->add_setting(
		'nukto_hero_ticker_items',
		array(
			'default'           => "Creative Agency\nBranding Studio\nE-Commerce Design\nAdvertising Hub\nMedia Production",
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_hero_ticker_items',
		array(
			'label'       => __( 'Vertical Ticker Words (One per line)', 'nukto' ),
			'description' => __( 'Rotates dynamically in the hero heading.', 'nukto' ),
			'section'     => 'nukto_hero_section',
			'type'        => 'textarea',
		)
	);

	// Hero Video URL
	$wp_customize->add_setting(
		'nukto_hero_video_url',
		array(
			'default'           => 'https://vjs.zencdn.net/v/oceans.mp4',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_hero_video_url',
		array(
			'label'       => __( 'Showreel Video URL (.mp4 / CDN)', 'nukto' ),
			'description' => __( 'Direct MP4 video URL for the expanding hero showcase.', 'nukto' ),
			'section'     => 'nukto_hero_section',
			'type'        => 'url',
		)
	);

	// -------------------------------------------------------------------------
	// Section 2: Partner / Client Marquee
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_marquee_section',
		array(
			'title'       => __( '2. Partner & Client Marquee', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 20,
		)
	);

	$wp_customize->add_setting(
		'nukto_marquee_partners',
		array(
			'default'           => "Pak-Turk Maarif\nSZABIST University\nEastline Communication\nSwitch Studio\nKTN TV\nApex Cutlery\nAmazon Global Retail",
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_marquee_partners',
		array(
			'label'       => __( 'Partner / Client Names (One per line)', 'nukto' ),
			'description' => __( 'Displayed in the infinite sliding marquee separated by pink ellipses.', 'nukto' ),
			'section'     => 'nukto_marquee_section',
			'type'        => 'textarea',
		)
	);

	// -------------------------------------------------------------------------
	// Section 3: Services Section
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_services_section',
		array(
			'title'       => __( '3. Services Section', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 30,
		)
	);

	$wp_customize->add_setting(
		'nukto_services_statement',
		array(
			'default'           => "We're a creative communication agency making brands people remember.",
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_services_statement',
		array(
			'label'    => __( 'Sticky Statement Headline', 'nukto' ),
			'section'  => 'nukto_services_section',
			'type'     => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'nukto_services_subtext',
		array(
			'default'           => 'Big ideas. Bold design. Real results. You bring the vision; we engineer it into market presence.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_services_subtext',
		array(
			'label'    => __( 'Statement Subtitle Text', 'nukto' ),
			'section'  => 'nukto_services_section',
			'type'     => 'textarea',
		)
	);

	// -------------------------------------------------------------------------
	// Section 4: About Us & Stats
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_about_section',
		array(
			'title'       => __( '4. About Us & Live Stats', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 40,
		)
	);

	$wp_customize->add_setting(
		'nukto_about_headline',
		array(
			'default'           => 'The Creatives Behind Your Brand Magic',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_about_headline',
		array(
			'label'    => __( 'About Section Headline', 'nukto' ),
			'section'  => 'nukto_about_section',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_p1',
		array(
			'default'           => 'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_about_p1',
		array(
			'label'    => __( 'Narrative Paragraph 1 (Founder Bio)', 'nukto' ),
			'section'  => 'nukto_about_section',
			'type'     => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_p2',
		array(
			'default'           => 'Having worked across educational institutions and corporate sectors, I bring a multidisciplinary approach to every project — from concept development to final execution. We create impactful, purposeful designs that communicate clearly, inspire audiences, and add real value.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_about_p2',
		array(
			'label'    => __( 'Narrative Paragraph 2', 'nukto' ),
			'section'  => 'nukto_about_section',
			'type'     => 'textarea',
		)
	);

	// Stat 1
	$wp_customize->add_setting(
		'nukto_stat1_num',
		array( 'default' => '10', 'sanitize_callback' => 'absint' )
	);
	$wp_customize->add_setting(
		'nukto_stat1_sym',
		array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_setting(
		'nukto_stat1_label',
		array( 'default' => 'Years of multidisciplinary design & brand communication experience', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_control(
		'nukto_stat1_num',
		array( 'label' => __( 'Stat 1: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' )
	);
	$wp_customize->add_control(
		'nukto_stat1_sym',
		array( 'label' => __( 'Stat 1: Symbol (+, %, X)', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);
	$wp_customize->add_control(
		'nukto_stat1_label',
		array( 'label' => __( 'Stat 1: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);

	// Stat 2
	$wp_customize->add_setting(
		'nukto_stat2_num',
		array( 'default' => '440', 'sanitize_callback' => 'absint' )
	);
	$wp_customize->add_setting(
		'nukto_stat2_sym',
		array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_setting(
		'nukto_stat2_label',
		array( 'default' => 'Behance portfolio project views across global creative showcases', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_control(
		'nukto_stat2_num',
		array( 'label' => __( 'Stat 2: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' )
	);
	$wp_customize->add_control(
		'nukto_stat2_sym',
		array( 'label' => __( 'Stat 2: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);
	$wp_customize->add_control(
		'nukto_stat2_label',
		array( 'label' => __( 'Stat 2: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);

	// Stat 3
	$wp_customize->add_setting(
		'nukto_stat3_num',
		array( 'default' => '66', 'sanitize_callback' => 'absint' )
	);
	$wp_customize->add_setting(
		'nukto_stat3_sym',
		array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_setting(
		'nukto_stat3_label',
		array( 'default' => 'Curated project appreciations and endorsements from design leaders', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_control(
		'nukto_stat3_num',
		array( 'label' => __( 'Stat 3: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' )
	);
	$wp_customize->add_control(
		'nukto_stat3_sym',
		array( 'label' => __( 'Stat 3: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);
	$wp_customize->add_control(
		'nukto_stat3_label',
		array( 'label' => __( 'Stat 3: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);

	// Stat 4
	$wp_customize->add_setting(
		'nukto_stat4_num',
		array( 'default' => '98', 'sanitize_callback' => 'absint' )
	);
	$wp_customize->add_setting(
		'nukto_stat4_sym',
		array( 'default' => '%', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_setting(
		'nukto_stat4_label',
		array( 'default' => 'Client retention & repeat engagements on high-stakes branding assets', 'sanitize_callback' => 'sanitize_text_field' )
	);
	$wp_customize->add_control(
		'nukto_stat4_num',
		array( 'label' => __( 'Stat 4: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' )
	);
	$wp_customize->add_control(
		'nukto_stat4_sym',
		array( 'label' => __( 'Stat 4: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);
	$wp_customize->add_control(
		'nukto_stat4_label',
		array( 'label' => __( 'Stat 4: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' )
	);

	// -------------------------------------------------------------------------
	// Section 5: Agency Contact & Multi-City Locations
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_contact_section',
		array(
			'title'       => __( '5. Contact & Office Locations', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 50,
		)
	);

	$wp_customize->add_setting(
		'nukto_contact_email',
		array(
			'default'           => 'nuktopoint@gmail.com',
			'sanitize_callback' => 'sanitize_email',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_contact_email',
		array(
			'label'    => __( 'Primary Contact Email', 'nukto' ),
			'section'  => 'nukto_contact_section',
			'type'     => 'email',
		)
	);

	$wp_customize->add_setting(
		'nukto_contact_phone',
		array(
			'default'           => '+92 324 3601950',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nukto_contact_phone',
		array(
			'label'    => __( 'Primary Phone / WhatsApp', 'nukto' ),
			'section'  => 'nukto_contact_section',
			'type'     => 'text',
		)
	);

	// Location 1: Islamabad
	$wp_customize->add_setting( 'nukto_loc1_city', array( 'default' => 'Islamabad', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_loc1_address', array( 'default' => 'Creative Studio, Sector F-7, Islamabad, Pakistan', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_loc1_city', array( 'label' => __( 'Location 1 City', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_loc1_address', array( 'label' => __( 'Location 1 Address', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );

	// Location 2: Karachi
	$wp_customize->add_setting( 'nukto_loc2_city', array( 'default' => 'Karachi', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_loc2_address', array( 'default' => 'Media Hub, Clifton Block 5, Karachi, Pakistan', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_loc2_city', array( 'label' => __( 'Location 2 City', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_loc2_address', array( 'label' => __( 'Location 2 Address', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );

	// Location 3: Hyderabad
	$wp_customize->add_setting( 'nukto_loc3_city', array( 'default' => 'Hyderabad', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_loc3_address', array( 'default' => 'Communication Design Lab, Auto Bhan, Hyderabad, Pakistan', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_loc3_city', array( 'label' => __( 'Location 3 City', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_loc3_address', array( 'label' => __( 'Location 3 Address', 'nukto' ), 'section' => 'nukto_contact_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 6: Social Media Links
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_social_section',
		array(
			'title'       => __( '6. Social Media Handles', 'nukto' ),
			'panel'       => 'nukto_theme_panel',
			'priority'    => 60,
		)
	);

	$wp_customize->add_setting(
		'nukto_social_behance',
		array(
			'default'           => 'https://www.behance.net/nukto-poin',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'nukto_social_behance',
		array( 'label' => __( 'Behance URL', 'nukto' ), 'section' => 'nukto_social_section', 'type' => 'url' )
	);

	$wp_customize->add_setting(
		'nukto_social_instagram',
		array(
			'default'           => 'https://www.instagram.com/nuktopoint',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'nukto_social_instagram',
		array( 'label' => __( 'Instagram URL', 'nukto' ), 'section' => 'nukto_social_section', 'type' => 'url' )
	);

	$wp_customize->add_setting(
		'nukto_social_facebook',
		array(
			'default'           => 'https://www.facebook.com/p/NUKTO-61560572120480/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'nukto_social_facebook',
		array( 'label' => __( 'Facebook URL', 'nukto' ), 'section' => 'nukto_social_section', 'type' => 'url' )
	);
}
add_action( 'customize_register', 'nukto_customize_register' );
