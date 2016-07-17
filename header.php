<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package speakout_s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'speakout_s' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="header-wrapper">
		<div class="primary" id="primary-header">
			<div class="row">
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( function_exists( 'jetpack_has_site_logo' ) ) : 
							if ( jetpack_get_site_logo() ) : ?>
								<img src="<?php echo esc_url( jetpack_get_site_logo( 'url' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="site-logo">
							<?php else: ?>
								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<?php endif; ?>
						<?php else: ?>
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php endif; ?>
					</a>

					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
					<?php
					endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="mbl-menu">menu</button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<div class="secondary">
			<div class="row">
				<div class="menus">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				
					<?php if ( is_singular( 'service' ) ) { ?>

						<ul class="service-menu menu">
							
							<?php if ( get_field( 'service_repeater' ) ) :
								while ( has_sub_field( 'service_repeater' ) ) : ?>
									<li><a href="#<?php the_sub_field( 'section_title' ) ?>"><?php the_sub_field( 'section_title' ) ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>

							<?php if ( get_field( 'testimonials_repeater' ) ) : ?>
								<li><a href="#testimonials">Testimonials</a></li>
							<?php endif; ?>

						</ul>

					<?php } ?>
				</div>
			</div>
		</div>

		<div class="mbl-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mbl-primary-menu' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'mbl-secondary-menu' ) ); ?>
		</div>

	</div><!-- .header-wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
