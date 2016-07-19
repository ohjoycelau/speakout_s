<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speakout_s
 */

get_header(); ?>

	<div id="primary" class="mc-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				
				<?php if ( get_theme_mod( 'masterclass_archive_setting' ) != "" ) : ?>
					<h1><?php echo get_theme_mod( 'masterclass_archive_setting' ); ?></h1>
				<?php endif; ?>

			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				get_template_part( 'template-parts/content', 'masterclass' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
get_sidebar();
get_footer();
