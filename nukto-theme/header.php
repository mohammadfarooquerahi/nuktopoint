<?php
/**
 * Theme Header Template
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Custom Cursor Component -->
<?php get_template_part( 'template-parts/custom-cursor' ); ?>

<!-- Site Preloader -->
<?php get_template_part( 'template-parts/preloader' ); ?>

<!-- Main Sticky Header -->
<header class="nk-header" id="nkHeader">
	<div class="nk-container">
		<div class="nk-header-inner">
			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-logo-link nk-interactive" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/branding/nukto_logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="nk-header-logo-img">
				<span class="nk-logo-text">Nuktopoint</span>
			</a>

			<!-- Desktop Navigation -->
			<nav class="nk-nav" aria-label="<?php esc_attr_e( 'Main Menu', 'nukto' ); ?>">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'nk-nav',
							'walker'         => new Nukto_Nav_Walker(),
							'fallback_cb'    => false,
						)
					);
				} else {
					?>
					<ul class="nk-nav-list">
						<li class="nk-nav-item"><a href="<?php echo esc_url( home_url( '/work/' ) ); ?>" class="nk-nav-link nk-interactive"><?php esc_html_e( 'Work', 'nukto' ); ?></a></li>
						<li class="nk-nav-item"><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="nk-nav-link nk-interactive"><?php esc_html_e( 'Services', 'nukto' ); ?></a></li>
						<li class="nk-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="nk-nav-link nk-interactive"><?php esc_html_e( 'About', 'nukto' ); ?></a></li>
						<li class="nk-nav-item"><a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" class="nk-nav-link nk-interactive"><?php esc_html_e( 'Reviews', 'nukto' ); ?></a></li>
						<li class="nk-nav-item"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-nav-link nk-interactive"><?php esc_html_e( 'Contact', 'nukto' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</nav>

			<!-- Header CTA Actions & Mobile Toggle -->
			<div class="nk-header-actions">
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-btn-work nk-interactive">
					<span class="nk-pulse-dot" aria-hidden="true"></span>
					<span><?php esc_html_e( "Let's Work", 'nukto' ); ?></span>
				</a>

				<button class="nk-mobile-toggle nk-interactive" id="nkMobileToggle" aria-label="<?php esc_attr_e( 'Toggle Mobile Menu', 'nukto' ); ?>" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</div>
	</div>
</header>

<!-- Mobile Slide-out Drawer -->
<div class="nk-mobile-drawer" id="nkMobileDrawer" aria-hidden="true">
	<nav class="nk-mobile-nav" aria-label="<?php esc_attr_e( 'Mobile Menu', 'nukto' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'Home', 'nukto' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/work/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'Selected Work', 'nukto' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'Capabilities & Services', 'nukto' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'About Studio & Leadership', 'nukto' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/reviews/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'Client Endorsements', 'nukto' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-mobile-link"><?php esc_html_e( 'Start A Project', 'nukto' ); ?></a>
	</nav>
	<div class="nk-mobile-footer">
		<div class="nk-mobile-contacts">
			<p><strong><?php esc_html_e( 'Email:', 'nukto' ); ?></strong> <a href="mailto:nuktopoint@gmail.com">nuktopoint@gmail.com</a></p>
			<p><strong><?php esc_html_e( 'Phone:', 'nukto' ); ?></strong> <a href="tel:+923243601950">+92 324 3601950</a></p>
			<p><strong><?php esc_html_e( 'Location:', 'nukto' ); ?></strong> Pakistan</p>
		</div>
	</div>
</div>

<main id="primary" class="nk-main-content">
