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
	
	<h5>content-masterclass.php</h5>
	
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>

		<div class="entry-meta">
			
			<?php if ( get_field( 'mc_dates') ) :
				echo '<h3>When</h3><ul>';
				while ( has_sub_field( 'mc_dates' ) ) :
					echo '<li><ul><li>';
					the_sub_field( 'mc_date' );
					echo '</li><li>';
					the_sub_field( 'mc_time' );
					echo '</li></ul></li>';
				endwhile;
				echo '</ul>';
			endif; ?>

			<?php if ( get_field( 'mc_location' ) ) :
				echo '<h3>Where</h3><p>';
				the_field( 'mc_location' );
				echo '</p>';
			endif; ?>


		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

			<?php if ( is_single() ) : ?>
				<h3 class="debug">If single page, longer description</h3>
				<?php the_field( 'mc_description' ); ?>
			<?php endif; ?>
			<?php if ( is_archive() ) : ?>
				<h3 class="debug">If archive page, short description</h3>
				<?php showBeforeMore(get_field('mc_description')); ?>
			<?php endif; ?>


			<?php if ( get_field( 'mc_cta' ) ) : ?>
				<div class="mc_cta">
					<?php while ( has_sub_field( 'mc_cta' ) ) : ?>
						<a href="<?php the_sub_field( 'mc_cta_link' ); ?>" target="blank"><?php the_sub_field( 'mc_cta_text' ); ?></a>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>


			<?php

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
