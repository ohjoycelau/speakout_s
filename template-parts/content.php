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

			<div class="entry-content">

				<div class="excerpt">

					<header class="entry-header">
						<h2><?php the_title(); ?></h2>
					</header>

					<div class="entry">
						<?php if ( get_field( 'excerpt' ) ) : ?>
							<?php the_field( 'excerpt' ); ?>
							<br/><a href="<?php echo esc_url( get_permalink() ); ?>" class="more">Learn More</a>
						<?php endif; ?>
					</div>
				</div>

			</div>

			<div class="entry-thumbnail">
				<div class="aspect-ratio" style="background-image: url( '<?php the_post_thumbnail_url(); ?>' ); ">
				</div>
			</div>

	</article>

