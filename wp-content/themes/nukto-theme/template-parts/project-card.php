<?php
/**
 * Template Part: Project Card
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id     = get_the_ID();
$client_name = get_post_meta( $post_id, '_nukto_client_name', true );
$card_size   = get_post_meta( $post_id, '_nukto_card_size', true );
if ( ! $card_size ) {
	$card_size = 'span-6';
}
?>
<article class="nk-project-card nk-card-<?php echo esc_attr( $card_size ); ?> nk-interactive">
	<a href="<?php the_permalink(); ?>" class="nk-card-media" aria-label="<?php the_title_attribute(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'nukto-project-cover', array( 'loading' => 'lazy', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		<?php else : ?>
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/branding/nukto-avatar.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
		<?php endif; ?>
	</a>
	<div class="nk-card-content">
		<?php echo nukto_get_project_chips( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<h3 class="nk-card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php if ( ! empty( $client_name ) ) : ?>
			<p class="nk-card-client-meta"><?php echo esc_html( $client_name ); ?></p>
		<?php endif; ?>
	</div>
</article>
