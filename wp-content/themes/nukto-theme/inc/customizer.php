<?php
/**
 * WordPress Customizer Settings for Nukto Theme
 *
 * Full Customizer panel providing 100% control over every section
 * and every page of the website with zero hardcoded constraints.
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
			'description' => __( 'Configure homepage sections, showreel video, services, stats, all dedicated pages, and agency contacts.', 'nukto' ),
			'priority'    => 20,
		)
	);

	// -------------------------------------------------------------------------
	// Section 1: Hero Section & Video Showcase
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_hero_section',
		array(
			'title'    => __( '1. Hero & Video Showcase', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 10,
		)
	);

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
			'label'   => __( 'Hero Headline Prefix', 'nukto' ),
			'section' => 'nukto_hero_section',
			'type'    => 'text',
		)
	);

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
			'title'    => __( '2. Partner & Client Marquee', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 20,
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
			'description' => __( 'Displayed in the infinite sliding marquee separated by decorative bullets.', 'nukto' ),
			'section'     => 'nukto_marquee_section',
			'type'        => 'textarea',
		)
	);

	// -------------------------------------------------------------------------
	// Section 3: Homepage Selected Work
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_work_section',
		array(
			'title'    => __( '3. Homepage Selected Work', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'nukto_work_tag',
		array(
			'default'           => 'Selected Work',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_work_tag',
		array(
			'label'   => __( 'Section Eyebrow Tag', 'nukto' ),
			'section' => 'nukto_work_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_work_headline',
		array(
			'default'           => 'Portfolio of Impactful Brands & Visual Systems',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_work_headline',
		array(
			'label'   => __( 'Section Headline', 'nukto' ),
			'section' => 'nukto_work_section',
			'type'    => 'text',
		)
	);

	// -------------------------------------------------------------------------
	// Section 4: Homepage Services
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_services_section',
		array(
			'title'    => __( '4. Homepage Services Showcase', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'nukto_services_tag',
		array(
			'default'           => 'Our Capabilities',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_services_tag',
		array(
			'label'   => __( 'Section Tag', 'nukto' ),
			'section' => 'nukto_services_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_services_statement',
		array(
			'default'           => "We're a creative communication agency making brands people remember.",
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_services_statement',
		array(
			'label'   => __( 'Sticky Statement Headline', 'nukto' ),
			'section' => 'nukto_services_section',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'nukto_services_subtext',
		array(
			'default'           => 'Big ideas. Bold design. Real results. You bring the vision; we engineer it into market presence.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'nukto_services_subtext',
		array(
			'label'   => __( 'Statement Subtitle Text', 'nukto' ),
			'section' => 'nukto_services_section',
			'type'    => 'textarea',
		)
	);

	// 5 Services Controls
	$default_services = array(
		1 => array(
			'title' => 'Branding & Visual Identity',
			'desc'  => 'Complete brand strategy, iconic marks, bespoke typography systems, and comprehensive style manuals that make your organization unmistakable.',
			'pills' => 'Brand Systems, Logo & Mark, Typography, Brand Manuals, Stationery Design',
		),
		2 => array(
			'title' => 'E-Commerce & Amazon Creative',
			'desc'  => 'High-converting digital storefront assets, Amazon listing images, A+ EBC modules, and custom product packaging dielines engineered to sell.',
			'pills' => 'Amazon Listing Sets, A+ / EBC Design, Packaging Dielines, 3D Product Retouching, Infographics',
		),
		3 => array(
			'title' => 'Advertising & Print Media',
			'desc'  => 'High-impact outdoor highway billboards, event exhibition standees, and publication materials crafted with precision color profiles.',
			'pills' => 'Billboards & Hoardings, Exhibition Standees, Corporate Brochures, Print Production QA, Spatial Branding',
		),
		4 => array(
			'title' => 'Social Media & Campaigns',
			'desc'  => 'Data-informed creative campaigns, seasonal holiday marketing, and public relations graphics designed to command attention on social feeds.',
			'pills' => 'Social Ad Campaigns, Seasonal Marketing, PR & Advocacy Graphics, Motion Micro-Assets, Social Brand Kits',
		),
		5 => array(
			'title' => 'Media & Video Production',
			'desc'  => 'Compelling visual storytelling through commercial video editing, institutional documentaries, color grading, and commercial photography.',
			'pills' => 'Commercial Video Editing, Documentaries, Product Photography, Post-Production, Broadcast Overlays',
		),
	);

	foreach ( $default_services as $i => $s_defaults ) {
		$wp_customize->add_setting(
			"nukto_s{$i}_title",
			array(
				'default'           => $s_defaults['title'],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"nukto_s{$i}_title",
			array(
				'label'   => sprintf( __( 'Service %02d Title', 'nukto' ), $i ),
				'section' => 'nukto_services_section',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"nukto_s{$i}_desc",
			array(
				'default'           => $s_defaults['desc'],
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			"nukto_s{$i}_desc",
			array(
				'label'   => sprintf( __( 'Service %02d Description', 'nukto' ), $i ),
				'section' => 'nukto_services_section',
				'type'    => 'textarea',
			)
		);

		$wp_customize->add_setting(
			"nukto_s{$i}_pills",
			array(
				'default'           => $s_defaults['pills'],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"nukto_s{$i}_pills",
			array(
				'label'       => sprintf( __( 'Service %02d Tags / Pills', 'nukto' ), $i ),
				'description' => __( 'Comma-separated deliverables list.', 'nukto' ),
				'section'     => 'nukto_services_section',
				'type'        => 'text',
			)
		);
	}

	// -------------------------------------------------------------------------
	// Section 5: About Us & Stats
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_about_section',
		array(
			'title'    => __( '5. Homepage About & Live Stats', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 50,
		)
	);

	$wp_customize->add_setting(
		'nukto_about_tag',
		array(
			'default'           => 'About Studio',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_tag',
		array(
			'label'   => __( 'Section Tag', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_headline',
		array(
			'default'           => 'The Creatives Behind Your Brand Magic',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_headline',
		array(
			'label'   => __( 'About Section Headline', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_badge',
		array(
			'default'           => '🪄 Design & Strategy',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_badge',
		array(
			'label'   => __( 'Badge / Sparkle Text', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_p1',
		array(
			'default'           => 'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_p1',
		array(
			'label'   => __( 'Narrative Paragraph 1 (Founder Bio)', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_p2',
		array(
			'default'           => 'Having worked across educational institutions and corporate sectors, I bring a multidisciplinary approach to every project — from concept development to final execution. We create impactful, purposeful designs that communicate clearly, inspire audiences, and add real value.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_p2',
		array(
			'label'   => __( 'Narrative Paragraph 2', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'nukto_about_p3',
		array(
			'default'           => 'From establishing nationwide university admissions campaigns and large-format outdoor billboards to crafting high-converting Amazon E-Commerce listing designs, Nukto Point operates at the intersection of aesthetic distinction and commercial conversion.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'nukto_about_p3',
		array(
			'label'   => __( 'Narrative Paragraph 3', 'nukto' ),
			'section' => 'nukto_about_section',
			'type'    => 'textarea',
		)
	);

	// Stat 1
	$wp_customize->add_setting( 'nukto_stat1_num', array( 'default' => '10', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_setting( 'nukto_stat1_sym', array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_stat1_label', array( 'default' => 'Years of multidisciplinary design & brand communication experience', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_stat1_num', array( 'label' => __( 'Stat 1: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' ) );
	$wp_customize->add_control( 'nukto_stat1_sym', array( 'label' => __( 'Stat 1: Symbol (+, %, X)', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_stat1_label', array( 'label' => __( 'Stat 1: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );

	// Stat 2
	$wp_customize->add_setting( 'nukto_stat2_num', array( 'default' => '440', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_setting( 'nukto_stat2_sym', array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_stat2_label', array( 'default' => 'Behance portfolio project views across global creative showcases', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_stat2_num', array( 'label' => __( 'Stat 2: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' ) );
	$wp_customize->add_control( 'nukto_stat2_sym', array( 'label' => __( 'Stat 2: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_stat2_label', array( 'label' => __( 'Stat 2: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );

	// Stat 3
	$wp_customize->add_setting( 'nukto_stat3_num', array( 'default' => '66', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_setting( 'nukto_stat3_sym', array( 'default' => '+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_stat3_label', array( 'default' => 'Curated project appreciations and endorsements from design leaders', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_stat3_num', array( 'label' => __( 'Stat 3: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' ) );
	$wp_customize->add_control( 'nukto_stat3_sym', array( 'label' => __( 'Stat 3: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_stat3_label', array( 'label' => __( 'Stat 3: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );

	// Stat 4
	$wp_customize->add_setting( 'nukto_stat4_num', array( 'default' => '98', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_setting( 'nukto_stat4_sym', array( 'default' => '%', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_stat4_label', array( 'default' => 'Client retention & repeat engagements on high-stakes branding assets', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_stat4_num', array( 'label' => __( 'Stat 4: Number', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'number' ) );
	$wp_customize->add_control( 'nukto_stat4_sym', array( 'label' => __( 'Stat 4: Symbol', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_stat4_label', array( 'label' => __( 'Stat 4: Label', 'nukto' ), 'section' => 'nukto_about_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 6: Homepage Testimonials
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_testimonials_section',
		array(
			'title'    => __( '6. Homepage Client Testimonials', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 60,
		)
	);

	$wp_customize->add_setting( 'nukto_testi_tag', array( 'default' => 'Client Endorsements', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_testi_tag', array( 'label' => __( 'Section Tag', 'nukto' ), 'section' => 'nukto_testimonials_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_testi_headline', array( 'default' => 'Trusted by Institutions & Global Sellers', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_testi_headline', array( 'label' => __( 'Section Headline', 'nukto' ), 'section' => 'nukto_testimonials_section', 'type' => 'text' ) );

	$default_testimonials = array(
		1 => array(
			'quote'  => '“Nukto Point delivered extraordinary visual assets for our university admissions campaign. Their attention to institutional prestige, typography, and large-format outdoor legibility exceeded our highest benchmarks.”',
			'author' => 'Director of Communications',
			'role'   => 'SZABIST University',
			'avatar' => 'SZ',
		),
		2 => array(
			'quote'  => '“The Amazon listing graphics and packaging dielines Nukto Point engineered took our product straight into the top 5% bestseller category. Pure conversion-driven craftsmanship.”',
			'author' => 'Brand Operations Lead',
			'role'   => 'Apex Cutlery & Retail',
			'avatar' => 'AC',
		),
		3 => array(
			'quote'  => '“Working with Nukto Point on our international exhibition standees and public relations collateral was effortless. They blend deep creative theory with sharp execution timelines.”',
			'author' => 'Head of Corporate Affairs',
			'role'   => 'Pak-Turk Maarif International',
			'avatar' => 'PT',
		),
	);

	foreach ( $default_testimonials as $t_i => $t_data ) {
		$wp_customize->add_setting( "nukto_t{$t_i}_quote", array( 'default' => $t_data['quote'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_t{$t_i}_quote", array( 'label' => sprintf( __( 'Testimonial %d Quote', 'nukto' ), $t_i ), 'section' => 'nukto_testimonials_section', 'type' => 'textarea' ) );

		$wp_customize->add_setting( "nukto_t{$t_i}_author", array( 'default' => $t_data['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_t{$t_i}_author", array( 'label' => sprintf( __( 'Testimonial %d Author Name', 'nukto' ), $t_i ), 'section' => 'nukto_testimonials_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_t{$t_i}_role", array( 'default' => $t_data['role'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_t{$t_i}_role", array( 'label' => sprintf( __( 'Testimonial %d Organization / Role', 'nukto' ), $t_i ), 'section' => 'nukto_testimonials_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_t{$t_i}_avatar", array( 'default' => $t_data['avatar'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_t{$t_i}_avatar", array( 'label' => sprintf( __( 'Testimonial %d Avatar Initials', 'nukto' ), $t_i ), 'section' => 'nukto_testimonials_section', 'type' => 'text' ) );
	}

	// -------------------------------------------------------------------------
	// Section 7: Dedicated Work Page Settings
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_work_page_section',
		array(
			'title'    => __( '7. Work Page (Portfolio)', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 70,
		)
	);

	$wp_customize->add_setting( 'nukto_work_page_tag', array( 'default' => 'Selected Work', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_work_page_tag', array( 'label' => __( 'Hero Eyebrow Tag', 'nukto' ), 'section' => 'nukto_work_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_work_page_headline', array( 'default' => 'A Decade of Strategic Visual Communication', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_work_page_headline', array( 'label' => __( 'Hero Headline', 'nukto' ), 'section' => 'nukto_work_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_work_page_lead',
		array(
			'default'           => 'Explore our curated portfolio spanning brand identity systems, high-converting Amazon e-commerce assets, outdoor highway billboards, and purpose-driven campaigns.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_work_page_lead', array( 'label' => __( 'Hero Lead Text', 'nukto' ), 'section' => 'nukto_work_page_section', 'type' => 'textarea' ) );

	// -------------------------------------------------------------------------
	// Section 8: Dedicated Services Page Settings
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_services_page_section',
		array(
			'title'    => __( '8. Services Page (Capabilities)', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 80,
		)
	);

	$wp_customize->add_setting( 'nukto_sp_hero_tag', array( 'default' => 'Our Capabilities', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_hero_tag', array( 'label' => __( 'Hero Eyebrow Tag', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_hero_headline', array( 'default' => 'Visual Systems Engineered for Authority & Conversion', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_hero_headline', array( 'label' => __( 'Hero Headline', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_sp_hero_lead',
		array(
			'default'           => 'From complete brand identity systems and Amazon storefront assets to high-impact highway billboards, we combine academic design rigor with commercial execution.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_sp_hero_lead', array( 'label' => __( 'Hero Lead Text', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'textarea' ) );

	// Detailed Service Rows 1-5
	$sp_service_defaults = array(
		1 => array(
			'title' => 'Branding & Visual Identity Systems',
			'lead'  => 'Distinctive identities built from first principles to endure, inspire, and separate your organization from generic market competitors.',
			'items' => "Comprehensive Brand Identity & Strategy Architecture\nPrimary, Secondary & Icon Mark Vector Formats\nBespoke Typography Hierarchy & Color Matrix\nBrand Guidelines Manual (Print & Digital Deployment)\nStationery Suite, Corporate Business Cards & Letterheads",
		),
		2 => array(
			'title' => 'E-Commerce & Amazon Creative',
			'lead'  => 'Conversion-optimized visual architectures engineered for Amazon US/EU and high-volume direct-to-consumer digital shelves.',
			'items' => "High-Converting Amazon 7-Image Listing Sequences\nAmazon A+ Content & Enhanced Brand Content (EBC) Modules\nCustom Packaging Box Dielines & Label Graphic Standards\n3D Photorealistic Product Retouching & Rendering\nTechnical Feature Infographics & Dimensional Breakdowns",
		),
		3 => array(
			'title' => 'Advertising & Large-Format Outdoor Print',
			'lead'  => 'High-impact physical media crafted to command highway visibility, convention attention, and lasting consumer recall.',
			'items' => "Highway Hoarding & High-Visibility Billboards\nConvention Rollup Standees & Event Exhibition Displays\nInstitutional Admissions & Corporate Promotional Banners\nCorporate Product Catalogues & Annual Review Publications\nPre-Press Color Profiles (CMYK) & Print Quality Assurance",
		),
		4 => array(
			'title' => 'Social Media Visuals & Campaign Strategy',
			'lead'  => 'Scroll-stopping campaign creative designed to cut through social media feed saturation and drive authentic community engagement.',
			'items' => "Digital Ad Creatives for Meta, LinkedIn & Instagram\nSeasonal Holiday Campaigns (Mother's Day, Summer Promos)\nPublic Relations & Social Advocacy Graphic Direction\nTypographic Templates & Social Grid Master Kits\nMotion Graphic Micro-Assets & Video Ad Overlays",
		),
		5 => array(
			'title' => 'Commercial Media & Video Production',
			'lead'  => 'Compelling narrative video editing, broadcast overlays, and photography developed with television and digital studio experience.',
			'items' => "Commercial Video Editing & Cinematic Color Grading\nInstitutional Brand Documentaries & Founder Stories\nCommercial Studio & Outdoor Product Photography\nTelevision Broadcast Graphics & Motion Titles\nAudio Synchronization & Sound Design Sweetening",
		),
	);

	foreach ( $sp_service_defaults as $spi => $spd ) {
		$wp_customize->add_setting( "nukto_sp_s{$spi}_title", array( 'default' => $spd['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_sp_s{$spi}_title", array( 'label' => sprintf( __( 'Detail Service %02d Title', 'nukto' ), $spi ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_sp_s{$spi}_lead", array( 'default' => $spd['lead'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_sp_s{$spi}_lead", array( 'label' => sprintf( __( 'Detail Service %02d Lead', 'nukto' ), $spi ), 'section' => 'nukto_services_page_section', 'type' => 'textarea' ) );

		$wp_customize->add_setting( "nukto_sp_s{$spi}_items", array( 'default' => $spd['items'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_sp_s{$spi}_items", array( 'label' => sprintf( __( 'Detail Service %02d Deliverables (One per line)', 'nukto' ), $spi ), 'section' => 'nukto_services_page_section', 'type' => 'textarea' ) );
	}

	// 4-Stage Process
	$wp_customize->add_setting( 'nukto_sp_proc_tag', array( 'default' => 'Our Methodology', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_proc_tag', array( 'label' => __( 'Process Eyebrow Tag', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_proc_headline', array( 'default' => 'The 4-Stage Creative Engine', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_proc_headline', array( 'label' => __( 'Process Headline', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$process_defaults = array(
		1 => array( 'title' => 'Strategic Discovery', 'desc' => 'We interrogate your market landscape, competitive positioning, and consumer psychology before touching any visual software.' ),
		2 => array( 'title' => 'Concept Direction', 'desc' => 'We develop diverse conceptual paths combining typography hierarchy, color theory, and bespoke spatial layouts.' ),
		3 => array( 'title' => 'High-Fidelity Craft', 'desc' => 'Selected concepts are forged into perfection with vector precision, 3D dieline rendering, and rigorous attention to detail.' ),
		4 => array( 'title' => 'Omni-Channel Rollout', 'desc' => 'Complete asset packages delivered in production-ready formats (print-ready CMYK PDFs, web SVGs, and brand manuals).' ),
	);
	foreach ( $process_defaults as $step_i => $step_data ) {
		$wp_customize->add_setting( "nukto_sp_step{$step_i}_title", array( 'default' => $step_data['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_sp_step{$step_i}_title", array( 'label' => sprintf( __( 'Process Step %d Title', 'nukto' ), $step_i ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_sp_step{$step_i}_desc", array( 'default' => $step_data['desc'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_sp_step{$step_i}_desc", array( 'label' => sprintf( __( 'Process Step %d Description', 'nukto' ), $step_i ), 'section' => 'nukto_services_page_section', 'type' => 'textarea' ) );
	}

	// Services Page CTA
	$wp_customize->add_setting( 'nukto_sp_cta_tag', array( 'default' => 'Commission Our Studio', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_cta_tag', array( 'label' => __( 'CTA Eyebrow Tag', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_cta_headline', array( 'default' => 'Ready to engineer your brand into an industry leader?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_cta_headline', array( 'label' => __( 'CTA Headline', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_cta_lead', array( 'default' => 'Let us define the visual standard for your organization.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_cta_lead', array( 'label' => __( 'CTA Subtitle', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_cta_btn', array( 'default' => 'Start A Project', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_sp_cta_btn', array( 'label' => __( 'CTA Button Text', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_sp_cta_url', array( 'default' => '/contact/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'nukto_sp_cta_url', array( 'label' => __( 'CTA Button URL', 'nukto' ), 'section' => 'nukto_services_page_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 9: Dedicated About Page Settings
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_about_page_section',
		array(
			'title'    => __( '9. About Page (Studio & Founder)', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 90,
		)
	);

	$wp_customize->add_setting( 'nukto_ap_hero_tag', array( 'default' => 'The Studio & Ethos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_hero_tag', array( 'label' => __( 'Hero Eyebrow Tag', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_hero_headline', array( 'default' => 'Think Big. Create Bold. Make Something Matter.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_hero_headline', array( 'label' => __( 'Hero Headline', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_ap_hero_lead',
		array(
			'default'           => 'Nukto Point is an avant-garde communication design and branding studio operating at the intersection of academic research rigor and high-converting commercial execution.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_ap_hero_lead', array( 'label' => __( 'Hero Lead Text', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'textarea' ) );

	// Profile Card Badges
	$wp_customize->add_setting( 'nukto_ap_badge_title', array( 'default' => 'NUKTO POINT', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_badge_title', array( 'label' => __( 'Profile Badge Name', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_badge_sub', array( 'default' => 'Lead Communication Designer • M.Phil Art & Design', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_badge_sub', array( 'label' => __( 'Profile Badge Subtitle', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	// Narrative
	$wp_customize->add_setting( 'nukto_ap_narrative_tag', array( 'default' => 'Background & Vision', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_narrative_tag', array( 'label' => __( 'Narrative Section Tag', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_narrative_headline', array( 'default' => 'A Decade of Transforming Strategic Ideas into Visual Reality', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_narrative_headline', array( 'label' => __( 'Narrative Headline', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_ap_p1',
		array(
			'default'           => 'I am a Communication Designer with an M.Phil. in Art & Design and over 10 years of experience in graphic design, photography, video editing, and public relations. My work blends creativity with strategic communication to build strong visual identities and meaningful brand experiences.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_ap_p1', array( 'label' => __( 'Narrative Paragraph 1 (Lead)', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting(
		'nukto_ap_p2',
		array(
			'default'           => 'Having worked across prestigious educational institutions, corporate sectors, and broadcast media, I bring a multidisciplinary approach to every project — from concept development to final execution. I am passionate about visual storytelling, detail-oriented design, and continuous learning.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_ap_p2', array( 'label' => __( 'Narrative Paragraph 2', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting(
		'nukto_ap_p3',
		array(
			'default'           => 'Every layout, color palette, and typographic decision we produce is backed by strategic rationale designed to communicate clearly, inspire audiences, and generate measurable market value for ambitious brands.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_ap_p3', array( 'label' => __( 'Narrative Paragraph 3', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'textarea' ) );

	// Credentials 1, 2, 3
	$wp_customize->add_setting( 'nukto_ap_c1_num', array( 'default' => '10+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_ap_c1_label', array( 'default' => 'Years Industry Experience', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_c1_num', array( 'label' => __( 'Cred 1: Number', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_ap_c1_label', array( 'label' => __( 'Cred 1: Label', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_c2_num', array( 'default' => 'M.Phil', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_ap_c2_label', array( 'default' => 'Art & Design Degree', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_c2_num', array( 'label' => __( 'Cred 2: Number', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_ap_c2_label', array( 'label' => __( 'Cred 2: Label', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_c3_num', array( 'default' => 'SZABIST', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_setting( 'nukto_ap_c3_label', array( 'default' => 'Visiting Faculty Role', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_c3_num', array( 'label' => __( 'Cred 3: Number', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );
	$wp_customize->add_control( 'nukto_ap_c3_label', array( 'label' => __( 'Cred 3: Label', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	// Institutional Milestones
	$wp_customize->add_setting( 'nukto_ap_tl_tag', array( 'default' => 'Institutional Experience', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_tl_tag', array( 'label' => __( 'Timeline Eyebrow Tag', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_tl_headline', array( 'default' => 'Career Milestones & Institutional Leadership', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_tl_headline', array( 'label' => __( 'Timeline Headline', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

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

	foreach ( $milestone_defaults as $mi => $md ) {
		$wp_customize->add_setting( "nukto_ap_m{$mi}_year", array( 'default' => $md['year'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_ap_m{$mi}_year", array( 'label' => sprintf( __( 'Milestone %d: Year Span', 'nukto' ), $mi ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_ap_m{$mi}_role", array( 'default' => $md['role'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_ap_m{$mi}_role", array( 'label' => sprintf( __( 'Milestone %d: Designation / Role', 'nukto' ), $mi ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_ap_m{$mi}_org", array( 'default' => $md['org'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_ap_m{$mi}_org", array( 'label' => sprintf( __( 'Milestone %d: Organization Name', 'nukto' ), $mi ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_ap_m{$mi}_loc", array( 'default' => $md['loc'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_ap_m{$mi}_loc", array( 'label' => sprintf( __( 'Milestone %d: Location', 'nukto' ), $mi ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_ap_m{$mi}_desc", array( 'default' => $md['desc'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_ap_m{$mi}_desc", array( 'label' => sprintf( __( 'Milestone %d: Description', 'nukto' ), $mi ), 'section' => 'nukto_about_page_section', 'type' => 'textarea' ) );
	}

	// About Page CTA
	$wp_customize->add_setting( 'nukto_ap_cta_tag', array( 'default' => 'Let Us Connect', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_cta_tag', array( 'label' => __( 'CTA Eyebrow Tag', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_cta_headline', array( 'default' => 'Ready to work with a dedicated, research-backed design partner?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_cta_headline', array( 'label' => __( 'CTA Headline', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_cta_lead', array( 'default' => 'Let us build an enduring visual identity for your business.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_cta_lead', array( 'label' => __( 'CTA Subtitle', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_cta_btn', array( 'default' => 'Get in Touch', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_ap_cta_btn', array( 'label' => __( 'CTA Button Text', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_ap_cta_url', array( 'default' => '/contact/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'nukto_ap_cta_url', array( 'label' => __( 'CTA Button URL', 'nukto' ), 'section' => 'nukto_about_page_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 10: Dedicated Reviews Page Settings
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_reviews_page_section',
		array(
			'title'    => __( '10. Reviews Page (Endorsements)', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 100,
		)
	);

	$wp_customize->add_setting( 'nukto_rp_hero_tag', array( 'default' => 'Client Endorsements', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_hero_tag', array( 'label' => __( 'Hero Eyebrow Tag', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_rp_hero_headline', array( 'default' => 'Endorsed by Institutional Leaders & Global Brands', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_hero_headline', array( 'label' => __( 'Hero Headline', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_rp_hero_lead',
		array(
			'default'           => 'Discover how our strategic communication design and high-conversion visual assets have elevated organizations across academic, commercial, and e-commerce sectors.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_rp_hero_lead', array( 'label' => __( 'Hero Lead Text', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'textarea' ) );

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

	foreach ( $reviews_defaults as $ri => $rd ) {
		$wp_customize->add_setting( "nukto_rp_r{$ri}_quote", array( 'default' => $rd['quote'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "nukto_rp_r{$ri}_quote", array( 'label' => sprintf( __( 'Review %d Quote', 'nukto' ), $ri ), 'section' => 'nukto_reviews_page_section', 'type' => 'textarea' ) );

		$wp_customize->add_setting( "nukto_rp_r{$ri}_author", array( 'default' => $rd['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_rp_r{$ri}_author", array( 'label' => sprintf( __( 'Review %d Author Name', 'nukto' ), $ri ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

		$wp_customize->add_setting( "nukto_rp_r{$ri}_role", array( 'default' => $rd['role'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "nukto_rp_r{$ri}_role", array( 'label' => sprintf( __( 'Review %d Author Role & Org', 'nukto' ), $ri ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );
	}

	// Reviews Page CTA
	$wp_customize->add_setting( 'nukto_rp_cta_tag', array( 'default' => 'Join Our Partners', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_cta_tag', array( 'label' => __( 'CTA Eyebrow Tag', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_rp_cta_headline', array( 'default' => 'Experience the difference research-backed design makes.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_cta_headline', array( 'label' => __( 'CTA Headline', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_rp_cta_lead', array( 'default' => "Let's build an iconic visual identity for your organization.", 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_cta_lead', array( 'label' => __( 'CTA Subtitle', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_rp_cta_btn', array( 'default' => 'Start Your Project', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_rp_cta_btn', array( 'label' => __( 'CTA Button Text', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_rp_cta_url', array( 'default' => '/contact/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'nukto_rp_cta_url', array( 'label' => __( 'CTA Button URL', 'nukto' ), 'section' => 'nukto_reviews_page_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 11: Dedicated Contact Page Settings
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_contact_page_section',
		array(
			'title'    => __( '11. Contact Page (Direct Commission)', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 110,
		)
	);

	$wp_customize->add_setting( 'nukto_cp_hero_tag', array( 'default' => 'Direct Commission', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_hero_tag', array( 'label' => __( 'Hero Eyebrow Tag', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_hero_headline', array( 'default' => "Let's Build Something Extraordinary Together", 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_hero_headline', array( 'label' => __( 'Hero Headline', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_cp_hero_lead',
		array(
			'default'           => 'Ready to elevate your visual identity, Amazon storefront, or advertising campaign? Fill out the project brief below or reach out directly.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_cp_hero_lead', array( 'label' => __( 'Hero Lead Text', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'nukto_cp_form_tag', array( 'default' => 'Project Brief', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_form_tag', array( 'label' => __( 'Form Card Eyebrow Tag', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_form_headline', array( 'default' => 'Tell Us About Your Vision', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_form_headline', array( 'label' => __( 'Form Card Headline', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_direct_tag', array( 'default' => 'Fast Communication', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_direct_tag', array( 'label' => __( 'Direct Access Tag', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_direct_headline', array( 'default' => 'Direct Studio Access', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_direct_headline', array( 'label' => __( 'Direct Access Headline', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting(
		'nukto_cp_direct_lead',
		array(
			'default'           => 'Prefer direct communication? Reach our team directly via email or WhatsApp for immediate onboarding.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 'nukto_cp_direct_lead', array( 'label' => __( 'Direct Access Subtitle', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'nukto_cp_g1_icon', array( 'default' => '⚡', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g1_icon', array( 'label' => __( 'Guarantee 1 Icon', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_g1_title', array( 'default' => '24-Hour Turnaround', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g1_title', array( 'label' => __( 'Guarantee 1 Title', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_g1_desc', array( 'default' => 'Every project brief receives a detailed response within 1 business day.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g1_desc', array( 'label' => __( 'Guarantee 1 Description', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_g2_icon', array( 'default' => '🔒', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g2_icon', array( 'label' => __( 'Guarantee 2 Icon', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_g2_title', array( 'default' => 'NDA Protection', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g2_title', array( 'label' => __( 'Guarantee 2 Title', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	$wp_customize->add_setting( 'nukto_cp_g2_desc', array( 'default' => 'We honor strict confidentiality for unreleased products & institutional assets.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'nukto_cp_g2_desc', array( 'label' => __( 'Guarantee 2 Description', 'nukto' ), 'section' => 'nukto_contact_page_section', 'type' => 'text' ) );

	// -------------------------------------------------------------------------
	// Section 12: Agency Contact & Multi-City Locations
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_contact_section',
		array(
			'title'    => __( '12. Global Agency Contacts & Office Locations', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 120,
		)
	);

	$wp_customize->add_setting(
		'nukto_contact_email',
		array(
			'default'           => 'nuktopoint@gmail.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'nukto_contact_email',
		array(
			'label'   => __( 'Primary Contact Email', 'nukto' ),
			'section' => 'nukto_contact_section',
			'type'    => 'email',
		)
	);

	$wp_customize->add_setting(
		'nukto_contact_phone',
		array(
			'default'           => '+92 324 3601950',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_contact_phone',
		array(
			'label'   => __( 'Primary Phone / WhatsApp', 'nukto' ),
			'section' => 'nukto_contact_section',
			'type'    => 'text',
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
	// Section 13: Social Media Handles & Footer
	// -------------------------------------------------------------------------
	$wp_customize->add_section(
		'nukto_social_section',
		array(
			'title'    => __( '13. Social Media & Footer Branding', 'nukto' ),
			'panel'    => 'nukto_theme_panel',
			'priority' => 130,
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

	$wp_customize->add_setting(
		'nukto_footer_watermark',
		array(
			'default'           => 'NUKTO POINT',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_footer_watermark',
		array( 'label' => __( 'Footer Giant Watermark Text', 'nukto' ), 'section' => 'nukto_social_section', 'type' => 'text' )
	);

	$wp_customize->add_setting(
		'nukto_footer_tagline',
		array(
			'default'           => 'The Point of Creativity. All Rights Reserved.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'nukto_footer_tagline',
		array( 'label' => __( 'Footer Copyright Tagline', 'nukto' ), 'section' => 'nukto_social_section', 'type' => 'text' )
	);
}
add_action( 'customize_register', 'nukto_customize_register' );
