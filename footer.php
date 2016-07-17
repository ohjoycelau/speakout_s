<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package speakout_s
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="row site-branding">
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
			</div>
			<div class="row">
				<div class="secondary">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				</div>
				<div class="primary">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
			</div>
			<div class="row">
				<p class="copyright">© Copyright <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></p>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
