<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the home page.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="full-width-page-wrapper">

	<div id="home-carousel" class="carousel slide position-relative" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#home-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#home-carousel" data-slide-to="1"></li>
			<li data-target="#home-carousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php bloginfo('template_url')?>/img/home-slider-1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php bloginfo('template_url')?>/img/home-slider-2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php bloginfo('template_url')?>/img/home-slider-3.jpg" alt="Third slide">
			</div>
		</div>
		<?php
		$adoptionInfo = get_page_by_title('Adoption Hours', OBJECT, 'post');
		if ( isset( $adoptionInfo ) ) :
		?>
		<div class="carousel-info mt-4 mt-lg-5">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-5 col-lg-4 white-box py-3">
						<h5>Adoption Hours:</h5>
						<?php echo $adoptionInfo->post_content; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

					<?php
					global $post;
					$args = array( 'numberposts' => 4, 'category_name' => 'featured-pets' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<div class="full-width gray-box pb-5">
							<div class="container">
								<h2 class="text-center pt-5 pb-4">Featured Pets</h2>
								<div class="row">
									
									<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
										<div class="col-sm-6 col-md-3">
											<p>
												<a href="#">
													<?php the_post_thumbnail( 'medium' ); ?>
												</a>
											</p>
											<p class="h5"><?php the_title(); ?></p>
											<p><?php the_excerpt(); ?></p>
											<p><a href="#">Read more</a></p>
										</div>
									<?php endforeach; ?>

								</div>
								<div class="row justify-content-center pt-4">
									<a class="btn btn-primary px-5 py-2" href="#">See All Pets</a>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<h2 class="text-center pt-5 pb-4">News + Upcoming Events</h2>
					<div class="media pb-3">
						<img class="mr-3 wp-image-180 w-25" title="" src="/wp-content/uploads/2018/12/event-300x203.jpg" alt="" width="300" height="203" />
						<div class="media-body">
							<h5 class="mt-0">Media heading</h5>
							<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
							<p><a href="#">Read more</a></p>
						</div>
					</div>
					<div class="media pb-3">
						<img class="mr-3 wp-image-180 w-25" title="" src="/wp-content/uploads/2018/12/event-300x203.jpg" alt="" width="300" height="203" />
						<div class="media-body">
							<h5 class="mt-0">Media heading</h5>
							<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
							<p><a href="#">Read more</a></p>
						</div>
					</div>
					<div class="media pb-3">
						<img class="mr-3 wp-image-180 w-25" title="" src="/wp-content/uploads/2018/12/event-300x203.jpg" alt="" width="300" height="203" />
						<div class="media-body">
							<h5 class="mt-0">Media heading</h5>
							<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
							<p><a href="#">Read more</a></p>
						</div>
					</div>
					<div class="full-width gray-box py-3 mt-5">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col col-auto">
									<form class="form-inline h5 text-300 mb-0 d-block d-md-flex">
										<div>Get "The Scoop" About QAS</div>
										<div class="form-group mx-sm-3">
											<label for="scoop-email" class="sr-only">Email address</label>
											<input type="email" class="form-control" id="scoop-email" placeholder="person@example.com">
										</div>
										<button type="submit" class="btn btn-primary mt-3">Sign Up</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<h2 class="text-center pt-5 pb-4">Ways To Help</h2>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<p>
								<a href="#">
									<img class="alignnone size-medium wp-image-155 w-100" title="" src="/wp-content/uploads/2018/12/golden-retriever-puppy-300x200.jpg" alt="" width="300" height="200" />
								</a>
							</p>
							<p class="h5">Doggo</p>
							<p>Donec ultrices tortor in quam pellentesque volutpat. Sed scelerisque luctus est non rhoncus. Ut efficitur nunc quis aliquet volutpat. In velit orci, convallis sed placerat ut, molestie nec ante. </p>
						</div>
						<div class="col-sm-6 col-md-3">
							<p>
								<a href="#">
									<img class="alignnone size-medium wp-image-155 w-100" title="" src="/wp-content/uploads/2018/12/golden-retriever-puppy-300x200.jpg" alt="" width="300" height="200" />
								</a>
							</p>
							<p class="h5">Doggo</p>
							<p>Donec ultrices tortor in quam pellentesque volutpat. Sed scelerisque luctus est non rhoncus. Ut efficitur nunc quis aliquet volutpat. In velit orci, convallis sed placerat ut, molestie nec ante. </p>
						</div>
						<div class="col-sm-6 col-md-3">
							<p>
								<a href="#">
									<img class="alignnone size-medium wp-image-155 w-100" title="" src="/wp-content/uploads/2018/12/golden-retriever-puppy-300x200.jpg" alt="" width="300" height="200" />
								</a>
							</p>
							<p class="h5">Doggo</p>
							<p>Donec ultrices tortor in quam pellentesque volutpat. Sed scelerisque luctus est non rhoncus. Ut efficitur nunc quis aliquet volutpat. In velit orci, convallis sed placerat ut, molestie nec ante. </p>
						</div>
						<div class="col-sm-6 col-md-3">
							<p>
								<a href="#">
									<img class="alignnone size-medium wp-image-155 w-100" title="" src="/wp-content/uploads/2018/12/golden-retriever-puppy-300x200.jpg" alt="" width="300" height="200" />
								</a>
							</p>
							<p class="h5">Doggo</p>
							<p>Donec ultrices tortor in quam pellentesque volutpat. Sed scelerisque luctus est non rhoncus. Ut efficitur nunc quis aliquet volutpat. In velit orci, convallis sed placerat ut, molestie nec ante. </p>
						</div>
					</div>
					<div class="row justify-content-center pt-4">
						<a class="btn btn-primary px-5 py-2" href="#">Join Our Team</a>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
