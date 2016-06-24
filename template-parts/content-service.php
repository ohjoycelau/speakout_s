<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speakout_s
 */

?>

<div class="service-header">
	<ul class="debug">
		<?php

			if ( get_field( 'service_repeater' ) ) :

				while ( has_sub_field( 'service_repeater' ) ) : 

					$section_title = the_sub_field( 'section_title' ); ?>

					<li><a href="#<?php echo $section_title ?>"><?php echo $section_title ?></a></li>

				<?php endwhile;

			endif;

		?>
	</ul>
</div>

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

			if ( get_field( 'service_repeater' ) ) : ?>

				<ul>

				<?php while ( has_sub_field( 'service_repeater' ) ) : ?>

					<li><?php the_sub_field( 'section_title' ); ?></li>
					<li><?php>the_sub_field( 'section_content' ); ?></li>
					<li><?php>the_sub_field( 'section_type' ); ?></li>
			
				<?php endwhile; ?>

				</ul>

			<?php endif;

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
