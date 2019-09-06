<?php

class Wp_Stories_Post_Types {

	private $type = 'story';
	private $slug = 'stories';
	private $name = 'Stories';
	private $singular_name = 'Story';
	private $taxonomy = 'stories_category';
	private $taxonomy_name = 'Categories';
	private $taxonomy_name_singular = 'Category';

	private $text_domain = 'wp-stories';

	/**
	 * Class_Wp_Story constructor.
	 *
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'register_custom_taxonomy' ) );
	}

	/**
	 * Register post type
	 */
	public function register_post_type() {

		if ( ! is_blog_installed() || post_type_exists( $this->type ) ) {
			return;
		}

		$labels = array(
			'name'               => __( $this->name, $this->text_domain ),
			'singular_name'      => __( $this->singular_name, $this->text_domain ),
			'add_new'            => __( 'Add New', $this->text_domain ),
			'add_new_item'       => __( 'Add New ' . $this->singular_name, $this->text_domain ),
			'edit_item'          => __( 'Edit ' . $this->singular_name, $this->text_domain ),
			'new_item'           => __( 'New ' . $this->singular_name, $this->text_domain ),
			'all_items'          => __( 'All ' . $this->name, $this->text_domain ),
			'view_item'          => __( 'View ' . $this->name, $this->text_domain ),
			'search_items'       => __( 'Search ' . $this->name, $this->text_domain ),
			'not_found'          => __( 'No ' . strtolower( $this->name ) . ' found', $this->text_domain ),
			'not_found_in_trash' => __( 'No ' . strtolower( $this->name ) . ' found in Trash', $this->text_domain ),
			'parent_item_colon'  => __( '', $this->text_domain ),
			'menu_name'          => __( $this->name, $this->text_domain )
		);
		$args   = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $this->slug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields' ),
			'yarpp_support'      => true
		);
		register_post_type( $this->type, $args );
	}

	public function register_custom_taxonomy() {
		if ( ! is_blog_installed() ) {
			return;
		}

		if ( taxonomy_exists( $this->taxonomy ) ) {
			return;
		}

		$labels = array(
			'name'                       => _x( $this->taxonomy_name, 'taxonomy general name', $this->text_domain ),
			'singular_name'              => _x( $this->taxonomy_name_singular, 'taxonomy singular name', $this->text_domain ),
			'search_items'               => __( 'Search ' . $this->taxonomy_name, $this->text_domain ),
			'popular_items'              => __( 'Popular ' . $this->taxonomy_name, $this->text_domain ),
			'all_items'                  => __( 'All  ' . $this->taxonomy_name, $this->text_domain ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit ' . $this->taxonomy_name_singular, $this->text_domain ),
			'update_item'                => __( 'Update ' . $this->taxonomy_name_singular, $this->text_domain ),
			'add_new_item'               => __( 'Add New ' . $this->taxonomy_name_singular, $this->text_domain ),
			'new_item_name'              => __( 'New ' . $this->taxonomy_name . ' Name', $this->text_domain ),
			'separate_items_with_commas' => __( 'Separate ' . $this->taxonomy_name . ' with commas', $this->text_domain ),
			'add_or_remove_items'        => __( 'Add or remove ' . $this->taxonomy_name, $this->text_domain ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . $this->taxonomy_name, $this->text_domain ),
			'not_found'                  => __( 'No ' . $this->taxonomy_name . ' found.', $this->text_domain ),
			'menu_name'                  => __( $this->taxonomy_name, $this->text_domain ),
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'category' ),
		);

		register_taxonomy( $this->taxonomy, array( $this->type ), $args );
	}
}

new Wp_Stories_Post_Types();
