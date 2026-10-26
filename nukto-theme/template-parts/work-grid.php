<?php
/**
 * Template Part: Selected Work Grid
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Query Published Projects
$projects_query = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 12,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'DESC',
	)
);
$work_tag      = get_theme_mod( 'nukto_work_tag', 'Selected Work' );
$work_headline = get_theme_mod( 'nukto_work_headline', 'Portfolio of Impactful Brands & Visual Systems' );
?>
<section class="nk-section nk-work-section" id="work">
	<div class="nk-container">
		<div class="nk-section-title-wrap">
			<span class="nk-section-tag"><?php echo esc_html( $work_tag ); ?></span>
			<h2 class="nk-section-h2"><?php echo esc_html( $work_headline ); ?></h2>
		</div>

		<div class="nk-work-grid">
			<?php if ( $projects_query->have_posts() ) : ?>
				<?php
				while ( $projects_query->have_posts() ) :
					$projects_query->the_post();
					get_template_part( 'template-parts/project-card' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php
				// Fallback display from extracted client projects
				$fallback_json_paths = array(
					get_template_directory() . '/assets/content.json',
					get_template_directory() . '/../content/content.json',
					dirname( get_template_directory() ) . '/../content/content.json',
				);
				$fallback_projects = array();
				foreach ( $fallback_json_paths as $p ) {
					if ( file_exists( $p ) ) {
						$raw = file_get_contents( $p );
						$decoded = json_decode( $raw, true );
						if ( ! empty( $decoded['projects'] ) ) {
							$fallback_projects = $decoded['projects'];
							break;
						}
					}
				}

				$sizes = array( 'span-8', 'span-4', 'span-12', 'span-6', 'span-6', 'span-4', 'span-8', 'span-6', 'span-6', 'span-12', 'span-6', 'span-6' );
				foreach ( $fallback_projects as $index => $item ) :
					$card_class = isset( $sizes[ $index ] ) ? $sizes[ $index ] : 'span-6';
					$img_url    = get_template_directory_uri() . '/assets/images/projects/' . $item['slug'] . '/cover.png';
					?>
					<article class="nk-project-card nk-card-<?php echo esc_attr( $card_class ); ?> nk-interactive">
						<a href="<?php echo esc_url( $item['external_link'] ); ?>" target="_blank" rel="noopener noreferrer" class="nk-card-media" aria-label="<?php echo esc_attr( $item['title'] ); ?>">
							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" />
						</a>
						<div class="nk-card-content">
							<div class="nk-card-chips">
								<?php foreach ( array_slice( $item['tags'], 0, 3 ) as $tag ) : ?>
									<span class="nk-chip"><?php echo esc_html( $tag ); ?></span>
								<?php endforeach; ?>
							</div>
							<h3 class="nk-card-title">
								<a href="<?php echo esc_url( $item['external_link'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $item['title'] ); ?></a>
							</h3>
							<p class="nk-card-client-meta"><?php echo esc_html( $item['client'] ); ?> • <?php echo esc_html( $item['year'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
