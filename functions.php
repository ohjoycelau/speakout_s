<?php
/**
 * speakout_s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package speakout_s
 */

require_once( __DIR__ . '/plugins/advanced-custom-fields/acf.php' );
require_once( __DIR__ . '/plugins/acf-repeater/acf-repeater.php' );

// require_once( __DIR__ . '/plugins/advanced-custom-fields/core/local.php' );

// define( 'ACF_LITE', true );


require_once get_template_directory() . '/plugins/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'speakout_s_register_required_plugins' );

function speakout_s_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Contact Form 7', // The plugin name.
			'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/contact-form-7.4.4.2.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

		array(
			'name'               => 'Really Simple CAPTCHA', // The plugin name.
			'slug'               => 'simple-captcha', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/captcha.4.2.2.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	$config = array(
		'id'           => 'speakout-s',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



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

	// Add custom logo support.
	add_theme_support( 'site-logo', size );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-header' );

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
}
endif;
add_action( 'after_setup_theme', 'speakout_s_setup' );

/**
 * Remove theme support from default admin Wordpress features.
 * 
 * Reference https://codex.wordpress.org/Function_Reference/remove_theme_support.
 */
function speakout_s_remove_theme_support() {
	remove_theme_support( 'custom-background' );
	remove_theme_support( 'post-formats' );
}
add_action( 'after_setup_theme', 'speakout_s_remove_theme_support', 11 );



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
			'can_export' => true,
			'query_var' => true,
		)
	);
	flush_rewrite_rules();
}
add_action( 'init', 'speakout_s_post_type_service' );


// Show posts of 'service' post types on home page.
if ( ! function_exists( 'speakout_s_main_query' ) ) :
	function speakout_s_main_query( $query ) {
	  if ( is_home() && $query->is_main_query() )
	    $query->set( 'post_type', array( 'service' ) );
	  return $query;
	}
endif;
add_action( 'pre_get_posts', 'speakout_s_main_query' );



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
			'has_archive' => true,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'supports' => array( 'title', 'revisions' ),
			'can_export' => true,
			'query_var' => true,
		)
	);
	flush_rewrite_rules();
}
add_action( 'init', 'speakout_s_post_type_masterclass' );

/**
 * Register Masterclass page template widget area.
 */
if ( ! function_exists( 'mc_widgets_init' ) ) :
	function mc_widgets_init() {
		register_sidebar( array(
			'name'			=> 'Masterclass Sidebar',
			'id'			=> 'mc_sidebar',
			'before_widget'	=> '<div class="widget">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="widget_title">',
			'after_title'	=> '</h3>',
		) );
	}
endif;
add_action( 'widgets_init', 'mc_widgets_init' );













/**
 * Enqueue scripts and styles.
 */
function speakout_s_scripts() {
	wp_enqueue_style( 'speakout_s-style', get_stylesheet_uri() );

	wp_enqueue_script( 'speakout_s-jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array(), '1.9.1', true );
	wp_enqueue_script( 'speakout_s-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0', true );
	wp_enqueue_script( 'speakout_s-iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', array(), '1.3.16', true );
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
