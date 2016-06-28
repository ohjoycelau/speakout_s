<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package speakout_s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<h1>single-masterclass.php</h1>

		<?php

		while ( have_posts() ) : the_post();


			get_template_part( 'template-parts/content', 'masterclass' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<div class="debug">
		<h1>Register and add widget area</h1>
		<?php if ( is_active_sidebar( 'mc_sidebar' ) ) : ?>
			<div id="mc-sidebar" clas="mc-sidebar widget-area" role="complementary" >
				<?php dynamic_sidebar( 'mc_sidebar' ); ?>
			</div>
		<?php endif; ?>
	</div>

<?php
get_sidebar();
get_footer();
