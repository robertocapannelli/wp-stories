<?php


class Wp_Stories_Post_Types {

	private $type = 'story';
	private $slug = 'stories';
	private $name = 'Stories';
	private $singular_name = 'Story';

	/**
	 * Class_Wp_Story constructor.
	 *
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Register post type
	 */
	public function register() {

		if ( ! is_blog_installed() || post_type_exists( $this->type ) ) {
			return;
		}

		$labels = array(
			'name'               => __( $this->name, 'wp-stories' ),
			'singular_name'      => __( $this->singular_name, 'wp-stories' ),
			'add_new'            => __( 'Add New', 'wp-stories' ),
			'add_new_item'       => __( 'Add New ' . $this->singular_name, 'wp-stories' ),
			'edit_item'          => __( 'Edit ' . $this->singular_name, 'wp-stories' ),
			'new_item'           => __( 'New ' . $this->singular_name, 'wp-stories' ),
			'all_items'          => __( 'All ' . $this->name, 'wp-stories' ),
			'view_item'          => __( 'View ' . $this->name, 'wp-stories' ),
			'search_items'       => __( 'Search ' . $this->name, 'wp-stories' ),
			'not_found'          => __( 'No ' . strtolower( $this->name ) . ' found', 'wp-stories' ),
			'not_found_in_trash' => __( 'No ' . strtolower( $this->name ) . ' found in Trash', 'wp-stories' ),
			'parent_item_colon'  => __( '', 'wp-stories' ),
			'menu_name'          => __( $this->name, 'wp-stories' )
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

}

new Wp_Stories_Post_Types();
