<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speakout_s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php speakout_s_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			// the_field('excerpt');

			if ( the_field('approach') ) {
				?>Approach<?php
				the_field('approach');
			}

			if ( the_field('credentials') ) {
				?>Credentials<?php
				the_field('credentials');
			}
			



			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'speakout_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php speakout_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
