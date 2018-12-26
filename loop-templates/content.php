<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h2 class="entry-title mt-5">
			<?php the_title(); ?>
		</h2>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php /* understrap_posted_on(); */ ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large', ['class' => 'w-100 my-3'] ); ?>

	<div class="entry-content">

		<?php
		the_content();
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php /* understrap_entry_footer(); */ ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
