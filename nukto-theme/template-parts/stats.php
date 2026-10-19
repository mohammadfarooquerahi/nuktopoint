<?php
/**
 * Template Part: Dynamic Animated Stats Grid
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stat1_num   = get_theme_mod( 'nukto_stat1_num', 10 );
$stat1_sym   = get_theme_mod( 'nukto_stat1_sym', '+' );
$stat1_label = get_theme_mod( 'nukto_stat1_label', 'Years of multidisciplinary design & brand communication experience' );

$stat2_num   = get_theme_mod( 'nukto_stat2_num', 440 );
$stat2_sym   = get_theme_mod( 'nukto_stat2_sym', '+' );
$stat2_label = get_theme_mod( 'nukto_stat2_label', 'Behance portfolio project views across global creative showcases' );

$stat3_num   = get_theme_mod( 'nukto_stat3_num', 66 );
$stat3_sym   = get_theme_mod( 'nukto_stat3_sym', '+' );
$stat3_label = get_theme_mod( 'nukto_stat3_label', 'Curated project appreciations and endorsements from design leaders' );

$stat4_num   = get_theme_mod( 'nukto_stat4_num', 98 );
$stat4_sym   = get_theme_mod( 'nukto_stat4_sym', '%' );
$stat4_label = get_theme_mod( 'nukto_stat4_label', 'Client retention & repeat engagements on high-stakes branding assets' );
?>
<div class="nk-stats-grid">
	<!-- Stat Card 1 -->
	<div class="nk-stat-card nk-interactive">
		<div class="nk-stat-number-wrap">
			<span class="nk-counter" data-target="<?php echo esc_attr( $stat1_num ); ?>">0</span>
			<span class="nk-stat-symbol"><?php echo esc_html( $stat1_sym ); ?></span>
		</div>
		<p class="nk-stat-label"><?php echo esc_html( $stat1_label ); ?></p>
	</div>

	<!-- Stat Card 2 -->
	<div class="nk-stat-card nk-interactive">
		<div class="nk-stat-number-wrap">
			<span class="nk-counter" data-target="<?php echo esc_attr( $stat2_num ); ?>">0</span>
			<span class="nk-stat-symbol"><?php echo esc_html( $stat2_sym ); ?></span>
		</div>
		<p class="nk-stat-label"><?php echo esc_html( $stat2_label ); ?></p>
	</div>

	<!-- Stat Card 3 -->
	<div class="nk-stat-card nk-interactive">
		<div class="nk-stat-number-wrap">
			<span class="nk-counter" data-target="<?php echo esc_attr( $stat3_num ); ?>">0</span>
			<span class="nk-stat-symbol"><?php echo esc_html( $stat3_sym ); ?></span>
		</div>
		<p class="nk-stat-label"><?php echo esc_html( $stat3_label ); ?></p>
	</div>

	<!-- Stat Card 4 -->
	<div class="nk-stat-card nk-interactive">
		<div class="nk-stat-number-wrap">
			<span class="nk-counter" data-target="<?php echo esc_attr( $stat4_num ); ?>">0</span>
			<span class="nk-stat-symbol"><?php echo esc_html( $stat4_sym ); ?></span>
		</div>
		<p class="nk-stat-label"><?php echo esc_html( $stat4_label ); ?></p>
	</div>
</div>
