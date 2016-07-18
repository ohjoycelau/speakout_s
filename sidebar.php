<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package speakout_s
 */


if ( is_post_type_archive( 'masterclass' ) || is_singular( 'masterclass' ) ) :

	// if no active sidebar aka not masterclass
	if ( ! is_active_sidebar( 'mc_sidebar' ) ) :
		return;
	endif;

	// has active sidebar aka masterclass
?>

<aside id="secondary" class="widget-area" role="complementary">
	
	<div class="mc-widget">
		<!-- <h1>Register and add widget area</h1> -->
		<?php if ( is_active_sidebar( 'mc_sidebar' ) ) : ?>
			<div id="primary-sidebar" clas="primary-sidebar widget-area" role="complementary" >
				<?php dynamic_sidebar( 'mc_sidebar' ); ?>
			</div>
		<?php endif; ?>
	</div>

</aside><!-- #secondary -->

<?php endif; ?>
