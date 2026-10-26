<?php
/**
 * Template Name: Portfolio / Selected Work
 *
 * @package Nukto
 */

get_header();

// Fetch categories
$terms = get_terms( array(
	'taxonomy'   => 'project_category',
	'hide_empty' => false,
) );

// Query projects
$projects_query = new WP_Query( array(
	'post_type'      => 'project',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => 'menu_order date',
	'order'          => 'DESC',
) );
$post_id       = get_the_ID();
$meta_tag      = get_post_meta( $post_id, '_nukto_page_hero_tag', true );
$meta_headline = get_post_meta( $post_id, '_nukto_page_hero_headline', true );
$meta_lead     = get_post_meta( $post_id, '_nukto_page_hero_lead', true );

$hero_tag      = ! empty( $meta_tag ) ? $meta_tag : get_theme_mod( 'nukto_work_page_tag', 'Selected Work' );
$hero_headline = ! empty( $meta_headline ) ? $meta_headline : get_theme_mod( 'nukto_work_page_headline', 'A Decade of Strategic Visual Communication' );
$hero_lead     = ! empty( $meta_lead ) ? $meta_lead : get_theme_mod( 'nukto_work_page_lead', 'Explore our curated portfolio spanning brand identity systems, high-converting Amazon e-commerce assets, outdoor highway billboards, and purpose-driven campaigns.' );
?>

<main id="primary" class="nk-main-content nk-portfolio-page">
	<!-- Portfolio Page Hero -->
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

			<!-- Real-time Filter Pills -->
			<div class="nk-portfolio-filters" id="nkPortfolioFilters">
				<button class="nk-filter-pill is-active nk-interactive" data-filter="all">
					<?php esc_html_e( 'All Works', 'nukto' ); ?>
				</button>
				<button class="nk-filter-pill nk-interactive" data-filter="branding">
					<?php esc_html_e( 'Branding & Identity', 'nukto' ); ?>
				</button>
				<button class="nk-filter-pill nk-interactive" data-filter="ecommerce">
					<?php esc_html_e( 'E-Commerce & Amazon', 'nukto' ); ?>
				</button>
				<button class="nk-filter-pill nk-interactive" data-filter="outdoor">
					<?php esc_html_e( 'Outdoor & Print', 'nukto' ); ?>
				</button>
				<button class="nk-filter-pill nk-interactive" data-filter="social">
					<?php esc_html_e( 'Social Media Campaigns', 'nukto' ); ?>
				</button>
				<button class="nk-filter-pill nk-interactive" data-filter="strategy">
					<?php esc_html_e( 'Brand Strategy & PR', 'nukto' ); ?>
				</button>
			</div>
		</div>
	</section>

	<!-- Projects Masonry Grid -->
	<section class="nk-section nk-portfolio-grid-section">
		<div class="nk-container">
			<div class="nk-work-grid" id="nkFilterableGrid">
				<?php if ( $projects_query->have_posts() ) : ?>
					<?php
					$idx = 0;
					$sizes = array( 'span-8', 'span-4', 'span-12', 'span-6', 'span-6', 'span-4', 'span-8', 'span-6', 'span-6', 'span-12', 'span-6', 'span-6' );
					while ( $projects_query->have_posts() ) :
						$projects_query->the_post();
						$idx++;
						$card_class = isset( $sizes[ $idx - 1 ] ) ? $sizes[ $idx - 1 ] : 'span-6';
						$terms_list = get_the_terms( get_the_ID(), 'project_category' );
						$cat_slugs = array();
						if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
							foreach ( $terms_list as $t ) {
								$cat_slugs[] = $t->slug;
							}
						}
						?>
						<div class="nk-grid-item-wrap nk-card-<?php echo esc_attr( $card_class ); ?>" data-category="<?php echo esc_attr( implode( ' ', $cat_slugs ) ); ?>">
							<?php get_template_part( 'template-parts/project-card' ); ?>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<?php
					// Self-contained fallback from assets/content.json
					$json_file = get_template_directory() . '/assets/content.json';
					$projects = array();
					if ( file_exists( $json_file ) ) {
						$raw = file_get_contents( $json_file );
						$decoded = json_decode( $raw, true );
						if ( ! empty( $decoded['projects'] ) ) {
							$projects = $decoded['projects'];
						}
					}

					$sizes = array( 'span-8', 'span-4', 'span-12', 'span-6', 'span-6', 'span-4', 'span-8', 'span-6', 'span-6', 'span-12', 'span-6', 'span-6' );
					foreach ( $projects as $i => $proj ) :
						$card_class = isset( $sizes[ $i ] ) ? $sizes[ $i ] : 'span-6';
						$img_url    = get_template_directory_uri() . '/assets/images/projects/' . $proj['slug'] . '/cover.png';
						
						// Categorize for filter pills
						$cat_key = 'branding';
						if ( stripos( $proj['category'], 'Amazon' ) !== false || stripos( $proj['category'], 'E-Commerce' ) !== false ) {
							$cat_key = 'ecommerce';
						} elseif ( stripos( $proj['category'], 'Outdoor' ) !== false || stripos( $proj['category'], 'Print' ) !== false ) {
							$cat_key = 'outdoor';
						} elseif ( stripos( $proj['category'], 'Social Media' ) !== false ) {
							$cat_key = 'social';
						} elseif ( stripos( $proj['category'], 'PR' ) !== false || stripos( $proj['category'], 'Strategy' ) !== false ) {
							$cat_key = 'strategy';
						}
						?>
						<div class="nk-grid-item-wrap nk-card-<?php echo esc_attr( $card_class ); ?>" data-category="<?php echo esc_attr( $cat_key ); ?>">
							<article class="nk-project-card nk-card-<?php echo esc_attr( $card_class ); ?> nk-interactive" data-cursor="<?php esc_attr_e( 'VIEW', 'nukto' ); ?>">
								<a href="<?php echo esc_url( $proj['external_link'] ); ?>" target="_blank" rel="noopener noreferrer" class="nk-card-media" aria-label="<?php echo esc_attr( $proj['title'] ); ?>">
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $proj['title'] ); ?>" loading="lazy" />
								</a>
								<div class="nk-card-content">
									<div class="nk-card-chips">
										<?php foreach ( array_slice( $proj['tags'], 0, 3 ) as $tag ) : ?>
											<span class="nk-chip"><?php echo esc_html( $tag ); ?></span>
										<?php endforeach; ?>
									</div>
									<h3 class="nk-card-title">
										<a href="<?php echo esc_url( $proj['external_link'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $proj['title'] ); ?></a>
									</h3>
									<p class="nk-card-client-meta"><?php echo esc_html( $proj['client'] ); ?> • <?php echo esc_html( $proj['year'] ); ?></p>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Call To Action -->
	<section class="nk-section nk-inner-cta-section">
		<div class="nk-container text-center">
			<span class="nk-section-tag"><?php esc_html_e( 'Start Your Journey', 'nukto' ); ?></span>
			<h2 class="nk-cta-h2"><?php esc_html_e( 'Have a project that demands bold creative execution?', 'nukto' ); ?></h2>
			<p class="nk-cta-lead"><?php esc_html_e( "Let's collaborate to build an unforgettable visual presence for your organization.", 'nukto' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nk-btn-work nk-btn-large nk-interactive">
				<span class="nk-pulse-dot" aria-hidden="true"></span>
				<span><?php esc_html_e( 'Initiate Project Brief', 'nukto' ); ?> &rarr;</span>
			</a>
		</div>
	</section>
</main>

<?php
get_footer();
