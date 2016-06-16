<?php
/**
 * speakout_s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package speakout_s
 */

require_once( __DIR__ . '/plugins/advanced-custom-fields/acf.php' );

if ( ! function_exists( 'speakout_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function speakout_s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on speakout_s, use a find and replace
	 * to change 'speakout_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'speakout_s', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'speakout_s' ),
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
	add_theme_support( 'custom-background', apply_filters( 'speakout_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'speakout_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function speakout_s_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'speakout_s_content_width', 640 );
}
add_action( 'after_setup_theme', 'speakout_s_content_width', 0 );











/**
 * Hide Default Post Type.
 */
add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
	remove_menu_page('edit.php');
}

/**
 * Custom Post Type Service.
 */
function speakout_s_post_type_service() {
	register_post_type( 'service',
		array(
			'labels' => array(
				'name'               => __( 'Services' ),
				'singular_name'      => __( 'Service' ),
				'menu_name'          => __( 'Services' ),
				'name_admin_bar'     => __( 'Services' ),
				'add_new'            => __( 'Add New' ),
				'add_new_item'       => __( 'Add New Service' ),
				'edit_item'          => __( 'Edit Service' ),
				'new_item'           => __( 'New Service' ),
				'view_item'          => __( 'View Service' ),
				'search_items'       => __( 'Search Services' ),
				'not_found'          => __( 'No examples found' ),
				'not_found_in_trash' => __( 'No examples found in trash' ),
				'all_items'          => __( 'All Services' ),
			),
			'public' => true,
			'has_archive' => false,
			'menu_position' => 3,
			'menu_icon' => 'dashicons-index-card',
			'supports' => array( 'title', 'thumbnail', 'revisions' ),
			'taxonomies' => array('post_tag'),
			'can_export' => true,
			'query_var' => true,
		)
	);
}
add_action( 'init', 'speakout_s_post_type_service' );


/**
 * Custom Post Type Masterclass.
 */
function speakout_s_post_type_masterclass() {
	register_post_type( 'masterclass',
		array(
			'labels' => array(
				'name'               => __( 'Masterclasses' ),
				'singular_name'      => __( 'Masterclass' ),
				'menu_name'          => __( 'Masterclasses' ),
				'name_admin_bar'     => __( 'Masterclasses' ),
				'add_new'            => __( 'Add New' ),
				'add_new_item'       => __( 'Add New Masterclass' ),
				'edit_item'          => __( 'Edit Masterclass' ),
				'new_item'           => __( 'New Masterclass' ),
				'view_item'          => __( 'View Masterclass' ),
				'search_items'       => __( 'Search Masterclasses' ),
				'not_found'          => __( 'No examples found' ),
				'not_found_in_trash' => __( 'No examples found in trash' ),
				'all_items'          => __( 'All Masterclasses' ),
			),
			'public' => true,
			'has_archive' => false,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'supports' => array( 'title', 'revisions' ),
			'taxonomies' => array('post_tag'),
			'can_export' => true,
			'query_var' => true,
		)
	);
}
add_action( 'init', 'speakout_s_post_type_masterclass' );


/**
 * Custom Post Type Service.
 */
function speakout_s_post_type_example() {
	register_post_type( 'example',
		array(
			'labels' => array(
				'name'               => __( 'Examples' ),
				'singular_name'      => __( 'Example' ),
				'menu_name'          => __( 'Examples' ),
				'name_admin_bar'     => __( 'Examples' ),
				'add_new'            => __( 'Add New' ),
				'add_new_item'       => __( 'Add New Example' ),
				'edit_item'          => __( 'Edit Example' ),
				'new_item'           => __( 'New Example' ),
				'view_item'          => __( 'View Example' ),
				'search_items'       => __( 'Search Examples' ),
				'not_found'          => __( 'No examples found' ),
				'not_found_in_trash' => __( 'No examples found in trash' ),
				'all_items'          => __( 'All Examples' ),
			),
			'public' => true,
			'has_archive' => false,
			'menu_position' => 2,
			'menu_icon' => 'dashicons-format-aside',
			'supports' => array( 'title', 'thumbnail', 'revisions' ),
			'taxonomies' => array('post_tag'),
			'can_export' => true,
			'query_var' => true,
		)
	);
}
add_action( 'init', 'speakout_s_post_type_example' );



// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'service' ) );
  return $query;
}














/**
 * Enqueue scripts and styles.
 */
function speakout_s_scripts() {
	wp_enqueue_style( 'speakout_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'speakout_s-jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array(), '1.9.1', true );
	wp_enqueue_script( 'speakout_s-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0', true );
	wp_enqueue_script( 'speakout_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'speakout_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'speakout_s-functions', get_template_directory_uri() . '/js/functions.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'speakout_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
