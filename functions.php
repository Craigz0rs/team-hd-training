<?php
/**
 * Team_HD_Training functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Team_HD_Training
 */

if ( ! function_exists( 'team_hd_training_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function team_hd_training_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Team_HD_Training, use a find and replace
		 * to change 'team_hd_training' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'team_hd_training', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'team_hd_training' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'team_hd_training_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'team_hd_training_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function team_hd_training_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'team_hd_training_content_width', 640 );
}
add_action( 'after_setup_theme', 'team_hd_training_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function team_hd_training_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'team_hd_training' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'team_hd_training' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'team_hd_training_widgets_init' );



/*Plugin Name: HD Training Theme Custom Post Types
Description: Add Client Profile CPT and taxonomy
Author: Craig D'Arcy - Max Rep Media
Licence: GPL2
*/

function hdtraining_register_custom_post_types() {

	// CPT Client Profiles
	$labels = array(
            'name'               => _x( 'Client Profiles', 'post type general name' ),
            'singular_name'      => _x( 'Client Profile', 'post type singular name'),
            'menu_name'          => _x( 'Client Profiles', 'admin menu' ),
            'name_admin_bar'     => _x( 'Client Profile', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'Client Profile' ),
            'add_new_item'       => __( 'Add New Client Profile' ),
            'new_item'           => __( 'New Client Profile' ),
            'edit_item'          => __( 'Edit Client Profile' ),
            'view_item'          => __( 'View Client Profile' ),
            'all_items'          => __( 'All Client Profiles' ),
            'search_items'       => __( 'Search Client Profiles' ),
            'parent_item_colon'  => __( 'Parent Client Profiles:' ),
            'not_found'          => __( 'No Client Profiles found.' ),
            'not_found_in_trash' => __( 'No Client Profiles found in Trash.' ),
            'archives'           => __( 'Client Profile Archives'),
            'insert_into_item'   => __( 'Uploaded to this Client Profile'),
            'uploaded_to_this_item' => __( 'Client Profile Archives'),
            'filter_item_list'   => __( 'Filter Client Profiles list'),
            'items_list_navigation' => __( 'Client Profiles list navigation'),
            'items_list'         => __( 'Client Profiles list'),
            'featured_image'     => __( 'Client Profile feature image'),
            'set_featured_image' => __( 'Set Client Profile feature image'),
            'remove_featured_image' => __( 'Remove Client Profile feature image'),
            'use_featured_image' => __( 'Use as feature image'),
	);

	$args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => false,
            'show_in_admin_bar'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'client_profiles' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title', 'thumbnail', 'editor' ),
            'menu_icon'          => 'dashicons-thumbs-up',
	);

	register_post_type( 'client_profile', $args );

}
add_action( 'init', 'hdtraining_register_custom_post_types' );

function hdtraining_rewrite_flush() {
      hdtraining_register_custom_post_types();
      flush_rewrite_rules();
  }
 register_activation_hook( __FILE__, 'hdtraining_rewrite_flush' );




 function hdtraining_register_taxonomies() {

     // Add Client categories
     $labels = array(
         'name'              => _x( 'Client Categories', 'taxonomy general name' ),
         'singular_name'     => _x( 'Client Category', 'taxonomy singular name' ),
         'search_items'      => __( 'Search Client Categories' ),
         'all_items'         => __( 'All Client Categories' ),
         'parent_item'       => __( 'Parent Client Category' ),
         'parent_item_colon' => __( 'Parent Client Category:' ),
         'edit_item'         => __( 'Edit Client Category' ),
         'view_item'         => __( 'View Client Category' ),
         'update_item'       => __( 'Update Client Category' ),
         'add_new_item'      => __( 'Add New Client Category' ),
         'new_item_name'     => __( 'New Client Category Name' ),
         'menu_name'         => __( 'Client Categories' ),
     );
     $args = array(
         'hierarchical'      => true,
         'labels'            => $labels,
         'show_ui'           => true,
         'show_in_menu'      => true,
         'show_in_nav_menu'  => false,
         'show_admin_column' => true,
         'query_var'         => true,
         'rewrite'           => array( 'slug' => 'client-categories' ),
     );
     register_taxonomy( 'client-category', array( 'client_profile' ), $args );

 }
 add_action( 'init', 'hdtraining_register_taxonomies', 0 );





/**
 * Enqueue scripts and styles.
 */
function team_hd_training_scripts() {
	wp_enqueue_style( 'team_hd_training-style', get_stylesheet_uri() );

	wp_enqueue_script( 'team_hd_training-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'team_hd_training-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'team_hd_training_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



