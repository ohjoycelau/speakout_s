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


	$wp_customize->add_setting( 'background_color_setting', array(
		'default'		=> '#EFEFEF',
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_color',
			array(
				'label'		=> __( 'Background Color', 'speakout_s' ),
				'section'	=> 'colors',
				'settings'	=> 'background_color_setting',
			) )
	);

	$wp_customize->add_setting( 'header_color_setting', array(
		'default'		=> '#8A0F3E',
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


if ( ! function_exists( 'speakout_s_customizer_css' ) ) :
	function speakout_s_customizer_css() {
		$backgroundColor = get_theme_mod( 'background_color_setting', '#8A0F3E' );
		$headerColor = get_theme_mod( 'header_color_setting', '#8A0F3E' );
		$linkColor = get_theme_mod( 'link_color_setting', '#BE204D' );
		$footerColor = get_theme_mod( 'footer_color_setting', '#4A4A4A' );

		?><style type="text/css">



			body, .site-header.active {
				background-color: <?php echo esc_html( $backgroundColor ); ?>;
			}
			.site-header .primary#primary-header {
				background-color: <?php echo esc_html( $headerColor ); ?>;
			}
			.site-header .secondary #secondary-menu {
				background-color: <?php echo esc_html( $linkColor ); ?>;
			}
			.site-footer {
				background-color: <?php echo esc_html( $footerColor ); ?>;
			}



			a:visited, a:link {
				color: <?php echo esc_html( $linkColor ); ?>;
			}
			a:hover, a:focus, a:active {
				color: <?php echo esc_html( $headerColor ); ?>;
			}

			.service-menu a:link,
			.service-menu a:visited,
			.mbl-navigation.active a:link,
			.mbl-navigation.active a:visited {
				color: <?php echo esc_html( $linkColor ); ?>;
			}
			.service-menu a:hover,
			.service-menu a:active,
			.service-menu a:focus,
			.mbl-navigation.active a:hover,
			.mbl-navigation.active a:active,
			.mbl-navigation.active a:focus {
				color: <?php echo esc_html( $headerColor ); ?>;
				border-color: <?php echo esc_html( $headerColor ); ?>;
			}



			.widget-area:after {
				background-color: <?php echo esc_html( $footerColor ); ?>;
			}



			.entry-section:not(:last-child)::after,
			.type-masterclass:not(:last-child)::after {
				background-color: <?php echo esc_html( $footerColor ); ?>;
				opacity: 0.075;
			}

			.btn:link,
			.btn:visited {
				background-color: <?php echo esc_html( $linkColor ); ?>;
				color: <?php echo esc_html( $backgroundColor ); ?>;
			}
			.btn:hover,
			.btn:active,
			.btn:focus {
				background-color: <?php echo esc_html( $headerColor ); ?>;
			}

			.slider .accordian h3 {
				background-color: <?php echo esc_html( $linkColor ); ?>;
				color: <?php echo esc_html( $backgroundColor ); ?>;
				border-bottom: 1px solid <?php echo esc_html( $backgroundColor ); ?>;
			}
			.slider .accordian h3:hover {
				background-color: <?php echo esc_html( $headerColor ); ?>;
			}

			.iosslider-navigation .dot {
				background-color: <?php echo esc_html( $linkColor ); ?>;
				border: 2px solid <?php echo esc_html( $linkColor ); ?>;
			}
			.iosslider-navigation .dot:hover {
				background-color: <?php echo esc_html( $headerColor ); ?>;
				border: 2px solid <?php echo esc_html( $headerColor ); ?>;
			}



		</style><?php
	}
endif;
add_action( 'wp_head', 'speakout_s_customizer_css');
