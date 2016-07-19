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
			} ?>

		<div class="entry-meta">
			<div class="row">
			<?php if ( get_field( 'mc_dates') ) : ?>
				<div class="when">
					<h4>When</h4>
					<ul>
					<?php while ( has_sub_field( 'mc_dates' ) ) :
						$dateformatstring = "l, F d, Y";
						$unixtimestamp = strtotime(get_field('mc_date')); ?>
						<li>
							<ul>
								<li class="day"><?php echo date_i18n($dateformatstring, $unixtimestamp); ?></li>
								<li class="time"><?php the_sub_field( 'mc_time' ); ?></li>
							</ul>
						</li>
					<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( get_field( 'mc_location' ) ) : ?>
				<div class="where">
					<h4>Where</h4>
					<p><?php the_field( 'mc_location' ); ?></p>
				</div>
			<?php endif; ?>
			</div><!-- .row-->
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="mc-single entry-content">

			<?php if ( is_single() ) : ?>
				<?php the_field( 'mc_description' ); ?>
			<?php endif; ?>
			
			<?php if ( is_archive() ) : ?>
				<?php showBeforeMore(get_field('mc_description')); ?>
			<?php endif; ?>


			<?php if ( get_field( 'mc_cta' ) ) : ?>
				<div class="mc_cta">
					<?php while ( has_sub_field( 'mc_cta' ) ) : ?>
						<a href="<?php the_sub_field( 'mc_cta_link' ); ?>" target="blank" class="btn"><?php the_sub_field( 'mc_cta_text' ); ?></a>
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
