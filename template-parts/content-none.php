<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speakout_s
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<?php if ( is_user_logged_in() ) : ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing Here Yet', 'speakout_s' ); ?></h1>
		<?php else: ?>
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'speakout_s' ); ?></h1>
		<?php endif; ?>

	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'speakout_s' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'speakout_s' ); ?></p>
		
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
