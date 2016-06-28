<?php
/**
 * Template Name: About
 *
 * @package speakout_s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<h1>PAGE-ABOUT.PHP</h1>

		<div class="featured_image profile_image">
			<?php the_post_thumbnail( $size, $attr ); ?>
		</div>
		<div class="about">
			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
