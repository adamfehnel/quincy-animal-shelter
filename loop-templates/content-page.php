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
			
			<?php the_content(); ?>
			
			<?php
			global $post;
			$args = array( 'numberposts' => 3, 'category_name' => 'prior-events' );
			$posts = get_posts( $args );
			?>
			<?php if ( !empty( $posts ) ) : ?>

				<h3 class="pt-4 pb-4">Prior Events</h3>
							
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

		<?php elseif ( is_page('adopt-a-dog') ) : ?>

			<?php
			global $post;
			$args = array( 'numberposts' => 99, 'category_name' => 'dogs' );
			$posts = get_posts( $args );
			?>
			<?php if ( !empty( $posts ) ) : ?>
				
				<div class="row">
							
				<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
					
					<?php
					$category = "cat";
					if ( has_category( "dogs", $post ) ) {
						$category = "dog";
					}
					?>

					<div class="col-md-6 col-lg-4 mt-4 filterable <?php echo $category; ?>">
						<?php
						$petPointImage = get_post_meta($post->ID, 'petPointImage1', true);
						if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="square-thumb">
								<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
							</a>
						<?php elseif ( !empty($petPointImage) ) : ?>
							<a href="<?php the_permalink(); ?>" class="square-thumb">
								<img src="<?php echo $petPointImage; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
							</a>
						<?php endif; ?>
						<h4 class="mt-3">
							<a href="<?php the_permalink(); ?>" class="text-inherit"><?php the_title(); ?></a>
						</h4>
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php the_permalink(); ?>">Read more</a></p>
					</div>

				<?php endforeach; ?>

				</div>

				<?php wp_reset_postdata(); ?>

			<?php else: ?>

				<div class="text-md-center py-5">
					<p class="display-4 mb-3">Stay tuned!</p>
					<p class="h4 text-300 mb-2">We're getting our dogs ready for adoption!</p>
				</div>

			<?php endif; ?>

			<hr class="my-5">
			
			<h4 class="mb-4">General Dog Information</h4>

			<?php the_content(); ?>

		<?php elseif ( is_page('adopt-a-cat') ) : ?>
			
			<?php
			global $post;
			$args = array( 'numberposts' => 99, 'category_name' => 'cats' );
			$posts = get_posts( $args );
			?>
			<?php if ( !empty( $posts ) ) : ?>
				
				
				<div class="row">
							
				<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
					
					<?php
					$category = "cat";
					if ( has_category( "dogs", $post ) ) {
						$category = "dog";
					}
					?>

					<div class="col-md-6 col-lg-4 mt-4 filterable <?php echo $category; ?>">
						<?php
						$petPointImage = get_post_meta($post->ID, 'petPointImage1', true);
						if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="square-thumb">
								<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
							</a>
						<?php elseif ( !empty($petPointImage) ) : ?>
							<a href="<?php the_permalink(); ?>" class="square-thumb">
								<img src="<?php echo $petPointImage; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
							</a>
						<?php endif; ?>
						<h4 class="mt-3">
							<a href="<?php the_permalink(); ?>" class="text-inherit"><?php the_title(); ?></a>
						</h4>
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php the_permalink(); ?>">Read more</a></p>
					</div>

				<?php endforeach; ?>

				</div>

				<?php wp_reset_postdata(); ?>

			<?php else: ?>

				<div class="text-md-center py-5">
					<p class="display-4 mb-3">Stay tuned!</p>
					<p class="h4 text-300 mb-2">We're getting our cats ready for adoption!</p>
				</div>

			<?php endif; ?>

			<hr class="my-5">
			
			<h4 class="mb-4">General Cat Information</h4>

			<?php the_content(); ?>

			<div class="mt-5 text-center"><a href="/adopt/adopt-a-kitten/" class="btn btn-danger btn-sm px-3 py-2">Looking for a kitten?</a></div>

		<?php else: ?>

			<?php if ( !has_post_thumbnail() ) : ?>
				<?php the_content(); ?>
			<?php else: ?>

				<div class="row">
					<div class="col-md-7">
						<?php the_content(); ?>
					</div>
					<div class="col-md-5">

						<a href="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>">
							<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'w-100' ) ); ?>
						</a>

						<?php 
						if ( class_exists('Dynamic_Featured_Image') ) {
							global $dynamic_featured_image;
							$additional_featured_images = $dynamic_featured_image->get_featured_images( );
							?>
							<div class="row">
							<?php foreach( $additional_featured_images as $additional_featured_image ): ?>
								<div class="col-6 mt-4">
									<a href="<?php echo $additional_featured_image['full'] ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>">
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
