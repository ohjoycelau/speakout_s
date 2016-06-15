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
 * Custom Post Type.
 */
function speakout_s_post_type() {
	register_post_type( 'service',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' ),
				'menu_name' => __( 'Services' ),
				'add_new_item' => __( 'Add New Service' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'thumbnail', 'revisions' ),
			'menu_position' => 2,
			'taxonomies' => array('post_tag'),
		)
	);
}
add_action( 'init', 'speakout_s_post_type' );



add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
	remove_menu_page('edit.php');
}  










/**
 * Custom Post Type.
 */
function speakout_s_custom_post_type() {
	register_post_type( 'learn',
		array(
			'labels' => array(
				'name' => __( 'Learning' ),
				'singular_name' => __( 'Learn' ),
				'menu_name' => __( 'Learning' ),
				'add_new_item' => __( 'Add New Learning' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'thumbnail', 'revisions' ),
			'menu_position' => 3,
			'taxonomies' => array('post_tag'),
		)
	);
}
add_action( 'init', 'speakout_s_custom_post_type' );



/* Define the custom box */
add_action( 'add_meta_boxes', 'approach_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'approach_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function approach_add_custom_box() {
  add_meta_box( 'wp_editor_approach_box', 'Approach', 'wp_editor_meta_box', 'learn', 'normal', 'high' );
}

/* Prints the box content */
function wp_editor_meta_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'approach_noncename' );

  $field_value = get_post_meta( $post->ID, '_wp_editor_approach', false );

  $args = array (
        'tinymce' => true,
        'quicktags' => true,
        'media_buttons' => false,
        'textarea_rows' => 10,
  );
  wp_editor( $field_value[0], '_wp_editor_approach', $args );
}

/* When the post is saved, saves our custom data */
function approach_save_postdata( $post_id ) {

  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times
  if ( ( isset ( $_POST['approach_noncename'] ) ) && ( ! wp_verify_nonce( $_POST['approach_noncename'], plugin_basename( __FILE__ ) ) ) )
      return;

  // Check permissions
  if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
      return;
    }    
  }
  else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }
  }

  // OK, we're authenticated: we need to find and save the data
  if ( isset ( $_POST['_wp_editor_approach'] ) ) {
    update_post_meta( $post_id, '_wp_editor_approach', $_POST['_wp_editor_approach'] );
  }

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
