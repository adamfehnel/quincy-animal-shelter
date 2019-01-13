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

<div class="wrapper py-0" id="full-width-page-wrapper">

	<?php
	global $post;
	$args = array( 'numberposts' => 6, 'category_name' => 'home-carousel' );
	$posts = get_posts( $args );
	?>
	<?php if ( !empty( $posts ) ) : ?>

		<div id="home-carousel" class="carousel slide position-relative" data-ride="carousel">
			<ol class="carousel-indicators d-none d-md-flex">
				<?php $carouselCount = 0; ?>
				<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
					<li data-target="#home-carousel" data-slide-to="<?php echo $carouselCount; ?>" <?php if ($carouselCount == 0) { echo 'class="active"'; } ?>></li>
					<?php $carouselCount++; ?>
				<?php endforeach; ?>
			</ol>
			<div class="carousel-inner">		
			<?php $carouselCount = 0; ?>
			<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
				<div class="carousel-item <?php if ($carouselCount == 0) { echo 'active'; } ?>">
					<?php the_post_thumbnail( 'full', ['class' => 'w-100'] ); ?>
				</div>
				<?php $carouselCount++; ?>
			<?php endforeach; ?>
			</div>

			<?php
			$adoptionInfo = get_page_by_title('Adoption Hours', OBJECT, 'post');
			if ( isset( $adoptionInfo ) ) :
			?>
			<div class="carousel-info mt-4 mt-lg-5">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-md-4 col-lg-3 white-box py-3">
							<h5>Adoption Hours:</h5>
							<?php echo $adoptionInfo->post_content; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>

	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					
					<?php
					$adoptionInfo = get_page_by_title('Home', OBJECT, 'page');
					if ( isset( $adoptionInfo ) ) :
					?>
						<?php echo $adoptionInfo->post_content; ?>
					<?php endif; ?>

					<?php
					global $post;
					$args = array( 'numberposts' => 4, 'category_name' => 'featured-pets' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<div class="full-width gray-box pb-5 patterned">
							<div class="container">
								<h2 class="text-center pt-5 pb-4">
									<a href="#" class="text-inherit">Featured Pets</a>
								</h2>
								<div class="row">
									
									<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
										<div class="col-sm-6 col-md">
											<p>
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
												</a>
											</p>
											<p class="h5">
												<a href="<?php the_permalink(); ?>" class="text-inherit"><?php the_title(); ?></a>
											</p>
											<p><?php the_excerpt(); ?></p>
											<p><a href="<?php the_permalink(); ?>">Read more</a></p>
										</div>
									<?php endforeach; ?> 

								</div>
								<div class="row justify-content-center pt-4">
									<a class="btn btn-danger px-5 py-2" href="#">See All Pets</a>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php
					global $post;
					$args = array( 'numberposts' => 3, 'category_name' => 'events' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<h2 class="text-center pt-5 pb-4">
							<a href="#" class="text-inherit">News + Upcoming Events</a>
						</h2>
									
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

					<div class="full-width green py-3 mt-5">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col col-auto">
									<form class="form-inline h5 text-300 mb-0 d-block d-md-flex">
										<div class="mt-3 mt-md-0">Get "The Scoop" About QAS</div>
										<div class="form-group mx-md-3">
											<label for="scoop-email" class="sr-only">Email address</label>
											<input type="email" class="form-control w-100 my-3 my-md-0" id="scoop-email" placeholder="person@example.com">
										</div>
										<button type="submit" class="btn btn-light mb-3 mb-md-0">Sign Up</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<?php
					global $post;
					$args = array( 'numberposts' => 4, 'category_name' => 'ways-to-help' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<h2 class="text-center pt-5 pb-4">
							<a href="#" class="text-inherit">Ways To Help</a>
						</h2>
						<div class="row">
									
							<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
								<div class="col-sm-6 col-md">
									<p>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
										</a>
									</p>
									<p class="h5">
										<a href="<?php the_permalink(); ?>" class="text-inherit"><strong><?php the_title(); ?></strong></a>
									</p>
									<p><?php the_content(); ?></p>
								</div>

							<?php endforeach; ?>
						
						</div>
						<div class="row justify-content-center pt-4">
							<a class="btn btn-primary px-5 py-2" href="#">Join Our Team</a>
						</div>
					<?php endif; ?>

					<div class="full-width gray-box mt-5 py-5 dark-blue">
						<div class="container text-center py-md-4">
							
							<form action="https://www.paypal.com/cgi-bin/webscr" id="donate-options-form" method="post" target="_blank">
								<input type="hidden" name="business" value="donations@kcparkfriends.org">
								<input type="hidden" name="cmd" value="_donations">
								<input type="hidden" name="item_name" value="Voluntary Contribution">
								<input type="hidden" name="amount" value="50.00" id="donate-options-form-amount">
								<input type="hidden" name="currency_code" value="USD">
							</form>

							<p class="h2 mb-3">Donate Now!</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tincidunt nulla. Praesent ex sem, mattis vel ultrices ut.</p>
							<div class="row justify-content-center py-3 donate-options">
								<div class="col-md col-md-auto mb-2 pr-md-0">
									<a href="#" class="btn btn-block btn-light px-4 donate-option donate-25" data-amount="25.00">$25</a>
								</div>
								<div class="col-md col-md-auto mb-2 pr-md-0">
									<a href="#" class="btn btn-block btn-light px-4 donate-option donate-35" data-amount="35.00">$35</a>
								</div>
								<div class="col-md col-md-auto mb-2 pr-md-0">
									<a href="#" class="btn btn-block btn-primary px-4 donate-option donate-50" data-amount="50.00">$50</a>
								</div>
								<div class="col-md col-md-auto mb-2 pr-md-0">
									<a href="#" class="btn btn-block btn-light px-4 donate-option donate-150" data-amount="150.00">$150</a>
								</div>
								<div class="col-md col-md-auto mb-2 pr-md-0">
									<a href="#" class="btn btn-block btn-light px-4 donate-option donate-other" data-amount="0.00">Other</a>
								</div>
							</div>
							<a href="#" class="btn btn-danger px-5 py-2 donate-options-submit">Continue</a>

						</div>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
