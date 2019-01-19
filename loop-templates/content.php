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

	<div class="entry-content">

		<?php if ( !has_post_thumbnail() ) : ?>
			<?php the_content(); ?>
		<?php else: ?>

			<div class="row">
				<div class="col-md-7">
					<?php the_content(); ?>
				</div>
				<div class="col-md-5">
					<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'w-100' ) ); ?>

					<?php 
					if ( class_exists('Dynamic_Featured_Image') ) {
						global $dynamic_featured_image;
						$additional_featured_images = $dynamic_featured_image->get_featured_images( );
						?>
						<div class="row">
						<?php foreach( $additional_featured_images as $additional_featured_image ): ?>
							<div class="col-6 mt-4">
								<a href="<?php echo $additional_featured_image['full'] ?>" target="_blank">
									<img src="<?php echo $additional_featured_image['thumb'] ?>" alt="" class="w-100">
								</a>
							</div>
						<?php endforeach; ?>
						</div>
					<?php
					}
					?>
				</div>
			</div>

		<?php endif; ?>

		<?php
		/*wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );*/
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php /* understrap_entry_footer(); */ ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
