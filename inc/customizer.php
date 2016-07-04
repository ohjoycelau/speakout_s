<?php
/**
 * speakout_s Theme Customizer.
 *
 * @package speakout_s
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function speakout_s_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting( 'header_color_setting', array(
		'default'		=> '#8A0F3E',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_color',
			array(
				'label'		=> __( 'Header Color', 'speakout_s' ),
				'section'	=> 'colors',
				'settings'	=> 'header_color_setting',
			) )
	);

	$wp_customize->add_setting( 'link_color_setting', array(
		'default'		=> '#BE204D',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'		=> __( 'Link Color', 'speakout_s' ),
				'section'	=> 'colors',
				'settings'	=> 'link_color_setting',
			) )
	);

	$wp_customize->add_setting( 'footer_color_setting', array(
		'default'		=> '#4A4A4A',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_color',
			array(
				'label'		=> __( 'Footer Color', 'speakout_s' ),
				'section'	=> 'colors',
				'settings'	=> 'footer_color_setting',
			) )
	);
}
add_action( 'customize_register', 'speakout_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function speakout_s_customize_preview_js() {
	wp_enqueue_script( 'speakout_s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'speakout_s_customize_preview_js' );


$headerColor = get_theme_mod( 'header_color_setting', '#8A0F3E' );
$linkColor = get_theme_mod( 'link_color_setting', '#BE204D' );
$footerColor = get_theme_mod( 'footer_color_setting', '#4A4A4A' );

?>

<style>
	.site-header .primary#primary-header {
		background-color: <?php echo $headerColor; ?> !important;
	}
	.site-header .secondary #secondary-menu {
		background-color: <?php echo $linkColor; ?> !important;
	}
	.site-footer {
		background-color: <?php echo $footerColor; ?> !important;
	}
</style>

<?php



