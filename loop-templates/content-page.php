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

	<div class="entry-content">

		<?php if ( is_page('news-events') ) : ?>
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
							<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
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

		<?php elseif ( is_page('available-pets') ) : ?>
			
			<?php
			global $post;
			$args = array( 'numberposts' => 99, 'category_name' => 'available-pets' );
			$posts = get_posts( $args );
			?>
			<?php if ( !empty( $posts ) ) : ?>

				<form class="form-inline" id="filter-pet-form">
					<span class="text-600 mr-3">Show:</span>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="filter-all" name="pet-filters" class="custom-control-input all" checked>
						<label class="custom-control-label" for="filter-all">All</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="filter-cats" name="pet-filters" class="custom-control-input cat">
						<label class="custom-control-label" for="filter-cats">Cats</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="filter-dogs" name="pet-filters" class="custom-control-input dog">
						<label class="custom-control-label" for="filter-dogs">Dogs</label>
					</div>
				</form>

				<div class="row">
							
				<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
					
					<?php
					$category = "cat";
					if ( has_category( "dogs", $post ) ) {
						$category = "dog";
					}
					?>

					<div class="col-md-6 col-lg-4 mt-4 filterable <?php echo $category; ?>">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
						</a>
						<h4 class="mt-3">
							<a href="<?php the_permalink(); ?>" class="text-inherit"><?php the_title(); ?></a>
						</h4>
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php the_permalink(); ?>">Read more</a></p>
					</div>

				<?php endforeach; ?>

				</div>

			<?php endif; ?>

		<?php else: ?>

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

		<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
