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
<!-- <h1>content-service.php</h1> -->
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
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
			<?php

				if ( get_field( 'service_repeater' ) ) : ?>
					<?php while ( has_sub_field( 'service_repeater' ) ) : ?>

						<div class="entry-section service <?php the_sub_field( 'section_title' ); ?> <?php the_sub_field( 'section_type' ); ?>" id="<?php the_sub_field( 'section_title' ) ?>">
							<h2 class="title"><?php the_sub_field( 'section_title' ); ?></h2>
							<div class="content"><?php the_sub_field( 'section_content' ); ?></div>
						</div>

					<?php endwhile;
				endif;

				if ( get_field( 'testimonials_repeater' ) ) : ?>
					<div class="entry-section testimonials" id="testimonials">
						<h2>Testimonials</h2>
						<div class="iosslider">
							<div class="slider">
								<?php while ( has_sub_field( 'testimonials_repeater') ) : ?>

									<div class="slide"><div class="testimonial">
										<p><?php the_sub_field( 'testimonial' ); ?></p>
										<p><a href="<?php the_sub_field( 'link' ); ?>" target="blank"><?php the_sub_field( 'name' ); ?></a></p>
									</div></div>

								<?php endwhile; ?>
							</div><!--slider end-->
						</div><!--iosslider end-->
						<div class="iosslider-navigation">
							<?php while ( has_sub_field( 'testimonials_repeater') ) : ?>
								<div class="dot"></div>
							<?php endwhile; ?>
						</div>
					</div><!--testimonials end-->
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
