<?php
/**
 * Custom Post Types & Meta Boxes for Nukto Theme
 *
 * @package Nukto
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Project CPT and Project Category Taxonomy
 */
function nukto_register_project_post_type() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'nukto' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'nukto' ),
		'menu_name'             => __( 'Projects', 'nukto' ),
		'name_admin_bar'        => __( 'Project', 'nukto' ),
		'archives'              => __( 'Project Archives', 'nukto' ),
		'attributes'            => __( 'Project Attributes', 'nukto' ),
		'parent_item_colon'     => __( 'Parent Project:', 'nukto' ),
		'all_items'             => __( 'All Projects', 'nukto' ),
		'add_new_item'          => __( 'Add New Project', 'nukto' ),
		'add_new'               => __( 'Add New', 'nukto' ),
		'new_item'              => __( 'New Project', 'nukto' ),
		'edit_item'             => __( 'Edit Project', 'nukto' ),
		'update_item'           => __( 'Update Project', 'nukto' ),
		'view_item'             => __( 'View Project', 'nukto' ),
		'view_items'            => __( 'View Projects', 'nukto' ),
		'search_items'          => __( 'Search Project', 'nukto' ),
		'not_found'             => __( 'Not found', 'nukto' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nukto' ),
		'featured_image'        => __( 'Project Cover Image', 'nukto' ),
		'set_featured_image'    => __( 'Set project cover image', 'nukto' ),
		'remove_featured_image' => __( 'Remove cover image', 'nukto' ),
		'use_featured_image'    => __( 'Use as cover image', 'nukto' ),
	);

	$args = array(
		'label'                 => __( 'Project', 'nukto' ),
		'description'           => __( 'Client portfolio showcase projects', 'nukto' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'taxonomies'            => array( 'project_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'projects',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'               => array( 'slug' => 'project', 'with_front' => false ),
	);

	register_post_type( 'project', $args );

	// Taxonomy: Project Category
	$tax_labels = array(
		'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'nukto' ),
		'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'nukto' ),
		'menu_name'                  => __( 'Categories', 'nukto' ),
		'all_items'                  => __( 'All Categories', 'nukto' ),
		'parent_item'                => __( 'Parent Category', 'nukto' ),
		'parent_item_colon'          => __( 'Parent Category:', 'nukto' ),
		'new_item_name'              => __( 'New Category Name', 'nukto' ),
		'add_new_item'               => __( 'Add New Category', 'nukto' ),
		'edit_item'                  => __( 'Edit Category', 'nukto' ),
		'update_item'                => __( 'Update Category', 'nukto' ),
		'view_item'                  => __( 'View Category', 'nukto' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'nukto' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'nukto' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'nukto' ),
		'popular_items'              => __( 'Popular Categories', 'nukto' ),
		'search_items'               => __( 'Search Categories', 'nukto' ),
		'not_found'                  => __( 'Not Found', 'nukto' ),
	);

	$tax_args = array(
		'labels'                     => $tax_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'                    => array( 'slug' => 'project-category' ),
	);

	register_taxonomy( 'project_category', array( 'project' ), $tax_args );
}
add_action( 'init', 'nukto_register_project_post_type', 0 );

/**
 * Add Custom Meta Boxes for Project Details
 */
function nukto_add_project_meta_boxes() {
	add_meta_box(
		'nukto_project_details',
		__( 'Project Details & Specifications', 'nukto' ),
		'nukto_render_project_meta_box',
		'project',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'nukto_add_project_meta_boxes' );

/**
 * Render Project Meta Box Form Fields
 *
 * @param WP_Post $post Current post object.
 */
function nukto_render_project_meta_box( $post ) {
	wp_nonce_field( 'nukto_save_project_meta', 'nukto_project_meta_nonce' );

	$client_name = get_post_meta( $post->ID, '_nukto_client_name', true );
	$year        = get_post_meta( $post->ID, '_nukto_project_year', true );
	$services    = get_post_meta( $post->ID, '_nukto_services_rendered', true );
	$external    = get_post_meta( $post->ID, '_nukto_external_link', true );
	$card_size   = get_post_meta( $post->ID, '_nukto_card_size', true );
	if ( ! $card_size ) {
		$card_size = 'span-6';
	}
	?>
	<table class="form-table">
		<tr>
			<th><label for="nukto_client_name"><?php esc_html_e( 'Client / Brand Name', 'nukto' ); ?></label></th>
			<td>
				<input type="text" id="nukto_client_name" name="nukto_client_name" value="<?php echo esc_attr( $client_name ); ?>" class="regular-text" placeholder="e.g. SZABIST University, Apex Cutlery" />
			</td>
		</tr>
		<tr>
			<th><label for="nukto_project_year"><?php esc_html_e( 'Project Year', 'nukto' ); ?></label></th>
			<td>
				<input type="text" id="nukto_project_year" name="nukto_project_year" value="<?php echo esc_attr( $year ); ?>" class="small-text" placeholder="2024" />
			</td>
		</tr>
		<tr>
			<th><label for="nukto_services_rendered"><?php esc_html_e( 'Services Rendered', 'nukto' ); ?></label></th>
			<td>
				<input type="text" id="nukto_services_rendered" name="nukto_services_rendered" value="<?php echo esc_attr( $services ); ?>" class="regular-text" placeholder="e.g. Branding, Amazon Listing, Packaging" />
				<p class="description"><?php esc_html_e( 'Comma-separated list of services displayed as tags on the project card.', 'nukto' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="nukto_external_link"><?php esc_html_e( 'External Portfolio Link (Behance / Live)', 'nukto' ); ?></label></th>
			<td>
				<input type="url" id="nukto_external_link" name="nukto_external_link" value="<?php echo esc_url( $external ); ?>" class="large-text" placeholder="https://www.behance.net/gallery/..." />
			</td>
		</tr>
		<tr>
			<th><label for="nukto_card_size"><?php esc_html_e( 'Homepage Card Grid Width', 'nukto' ); ?></label></th>
			<td>
				<select id="nukto_card_size" name="nukto_card_size">
					<option value="span-12" <?php selected( $card_size, 'span-12' ); ?>><?php esc_html_e( 'Full Width (12 Columns — Featured Showcase)', 'nukto' ); ?></option>
					<option value="span-8" <?php selected( $card_size, 'span-8' ); ?>><?php esc_html_e( 'Wide (8 Columns)', 'nukto' ); ?></option>
					<option value="span-6" <?php selected( $card_size, 'span-6' ); ?>><?php esc_html_e( 'Half Width (6 Columns — Standard)', 'nukto' ); ?></option>
					<option value="span-4" <?php selected( $card_size, 'span-4' ); ?>><?php esc_html_e( 'One-Third (4 Columns)', 'nukto' ); ?></option>
				</select>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save Project Meta Data
 *
 * @param int $post_id Current post ID.
 */
function nukto_save_project_meta( $post_id ) {
	if ( ! isset( $_POST['nukto_project_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['nukto_project_meta_nonce'] ), 'nukto_save_project_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['nukto_client_name'] ) ) {
		update_post_meta( $post_id, '_nukto_client_name', sanitize_text_field( wp_unslash( $_POST['nukto_client_name'] ) ) );
	}

	if ( isset( $_POST['nukto_project_year'] ) ) {
		update_post_meta( $post_id, '_nukto_project_year', sanitize_text_field( wp_unslash( $_POST['nukto_project_year'] ) ) );
	}

	if ( isset( $_POST['nukto_services_rendered'] ) ) {
		update_post_meta( $post_id, '_nukto_services_rendered', sanitize_text_field( wp_unslash( $_POST['nukto_services_rendered'] ) ) );
	}

	if ( isset( $_POST['nukto_external_link'] ) ) {
		update_post_meta( $post_id, '_nukto_external_link', esc_url_raw( wp_unslash( $_POST['nukto_external_link'] ) ) );
	}

	if ( isset( $_POST['nukto_card_size'] ) ) {
		$valid_sizes = array( 'span-12', 'span-8', 'span-6', 'span-4' );
		$size = sanitize_text_field( wp_unslash( $_POST['nukto_card_size'] ) );
		if ( in_array( $size, $valid_sizes, true ) ) {
			update_post_meta( $post_id, '_nukto_card_size', $size );
		}
	}
}
add_action( 'save_post_project', 'nukto_save_project_meta' );
