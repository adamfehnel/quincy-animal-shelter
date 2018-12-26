<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		if ( !is_front_page() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

		<?php if (is_page('news-events')) : ?>
			<h3 class="pt-4 pb-4">Event posts</h3>

			<?php
			global $post;
			$args = array( 'numberposts' => 3, 'category_name' => 'events' );
			$posts = get_posts( $args );
			?>
			<?php if ( !empty( $posts ) ) : ?>
							
				<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
					<div class="media pb-3">
						<a href="<?php the_permalink(); ?>" class="mr-3 w-25 d-none d-sm-block">
							<?php the_post_thumbnail( 'medium' ); ?>
						</a>
						<div class="media-body">
							<h5 class="mt-0">
								<a href="<?php the_permalink(); ?>" class="text-inherit"><?php the_title(); ?></a>
							</h5>
							<p><?php the_excerpt(); ?></p>
							<p><a href="<?php the_permalink(); ?>">Read more</a></p>
						</div>
					</div>
				<?php endforeach; ?>

			<?php endif; ?>
		<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
