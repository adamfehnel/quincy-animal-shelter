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
			<div class="carousel-inner parallax-wrapper">
			<?php $carouselCount = 0; ?>
			<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
				<div class="carousel-item <?php if ($carouselCount == 0) { echo 'active'; } ?>">

					<div class="block">
  						<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" data-speed="-1" class="img-parallax">
  						<div class="container carousel-message h-100 d-flex align-items-center">
  							<div class="carousel-message-inner">
  								<?php the_content(); ?>
  							</div>
  						</div>
					</div>
					
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
						<div class="py-4">
							<?php echo $adoptionInfo->post_content; ?>
						</div>
					<?php endif; ?>

					<?php
					global $post;
					$args = array( 'numberposts' => 4, 'category_name' => 'featured-pet' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<div class="full-width gray-box pb-5 patterned">
							<div class="container">
								<h2 class="text-center pt-5 pb-4">
									<a href="/adopt/available-pets/" class="text-inherit">Featured Pets</a>
								</h2>
								<div class="row justify-content-lg-center">
									
									<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
										<div class="col-sm-6 col-lg-4">
											<p>
												<a href="<?php the_permalink(); ?>" class="square-thumb">
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail( 'medium', ['class' => 'w-100'] );
														} else {
															$petPointImage = get_post_meta($post->ID, 'petPointImage1', true);
															if ( !empty( $petPointImage ) ) {
																echo "<img src='". $petPointImage . "' alt=". get_the_title() ." class='w-100'>";
															}
														}
													?>
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
								<div class="row justify-content-center pt-4 mb-3">
									<a class="btn btn-danger px-5 py-2" href="/adopt/">Adopt a Pet</a>
								</div>
							</div>
						</div>
					<?php else: ?>
						<?php
						$args = array( 'numberposts' => 3, 'category_name' => 'success-stories' );
						$posts = get_posts( $args );
						?>
							<?php if ( !empty( $posts ) ) : ?>
							<div class="full-width gray-box pb-5 patterned">
								<div class="container">
									<h2 class="text-center pt-5 pb-4">
										<a href="/category/success-stories/" class="text-inherit">Success Stories</a>
									</h2>
									<div class="row justify-content-lg-center">
										
										<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
											<div class="col-sm-6 col-lg-4">
												<p>
													<a href="/category/success-stories/" class="square-thumb">
														<?php 
															if ( has_post_thumbnail() ) {
																the_post_thumbnail( 'medium', ['class' => 'w-100'] );
															}
														?>
													</a>
												</p>
												<p class="h5">
													<a href="/category/success-stories/" class="text-inherit"><?php the_title(); ?></a>
												</p>
												<p><?php the_excerpt(); ?></p>
												<p><a href="/category/success-stories/">Read more</a></p>
											</div>
										<?php endforeach; ?> 

									</div>
									<div class="row justify-content-center pt-4 mb-3">
										<a class="btn btn-danger px-5 py-2" href="/category/success-stories/">More Success Stories</a>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>

					<!-- <?php
					global $post;
					$args = array( 'numberposts' => 3, 'category_name' => 'events' );
					$posts = get_posts( $args );
					?>
					<?php if ( !empty( $posts ) ) : ?>
						<h2 class="text-center pt-5 pb-4">
							<a href="/news-events/" class="text-inherit">News + Upcoming Events</a>
						</h2>
									
						<div class="row justify-content-lg-center">
									
							<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
								<div class="col-sm-6 col-lg-4">
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

					<?php endif; ?> -->

					<div class="full-width green py-3">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col col-auto" id="scoop-signup-form-wrapper">
									<form name="embedded_signup" class="ctct-custom-form Form form-inline h5 mb-0 d-block d-md-flex text-center" id="embedded_signup" action="https://visitor2.constantcontact.com/api/signup" method="post" data-id="embedded_signup:form" _lpchecked="1">
										<input name="ca" type="hidden" data-id="ca:input" value="dbe9ae08-07f9-4440-9af1-95db0edd9945">
										<input name="source" type="hidden" data-id="source:input" value="EFD">
										<input name="required" type="hidden" data-id="required:input" value="list,email">
										<input name="url" type="hidden" data-id="url:input">
										<input name="first_name" type="text" data-id="First Name:input" value="" class="d-none">
										<input name="last_name" type="text" data-id="Last Name:input" value="" class="d-none">
										<input name="list_0" type="checkbox" data-id="Lists:input" value="4" checked="checked" class="d-none">
										<input name="list_1" type="checkbox" data-id="Lists:input" value="1" checked="checked" class="d-none">
										<input name="list_2" type="checkbox" data-id="Lists:input" value="3" checked="checked" class="d-none">
										<div class="mt-3 mt-md-0">Get "The Scoop" About QAS</div>
										<div class="form-group mx-md-3">
											<label for="scoop-email" class="sr-only">Email address</label>
											<input name="email" type="email" class="form-control w-100 my-3 my-md-0" id="scoop-email" placeholder="person@example.com" data-id="Email Address:input">
										</div>
										<button type="submit" class="btn btn-light mb-3 mb-md-0" id="scoop-signup-submit">Sign Up</button>
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
						<div class="py-4">
							<h2 class="text-center pt-5 pb-4">
								<a href="/get-involved/" class="text-inherit">Ways To Help</a>
							</h2>
							<div class="row">
										
								<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
									<?php
										$goodLink = get_post_meta($post->ID, 'alternateLink', true);
										if ( empty( $goodLink ) ) {
											$goodLink = get_the_permalink();
										}
									?>
									<div class="col-sm-6 col-md">
										<p>
											<a href="<?php echo $goodLink; ?>">
												<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
											</a>
										</p>
										<p class="h5">
											<a href="<?php echo $goodLink; ?>" class="text-inherit"><strong><?php the_title(); ?></strong></a>
										</p>
										<p><?php the_content(); ?></p>
									</div>

								<?php endforeach; ?>
							
							</div>
							<!-- <div class="row justify-content-center pt-4">
								<a class="btn btn-primary px-5 py-2" href="/get-involved/volunteering/">Join Our Team</a>
							</div> -->
						</div>
					<?php endif; ?>

					<div class="full-width gray-box mt-5 py-5 dark-blue">
						<div class="container text-center py-md-4">
							
							<form action="https://www.paypal.com/cgi-bin/webscr" id="donate-options-form" method="post" target="_blank">
								<input type="hidden" name="business" value="qasadopt@msn.com">
								<input type="hidden" name="cmd" value="_donations">
								<input type="hidden" name="item_name" value="Voluntary Contribution">
								<input type="hidden" name="amount" value="50.00" id="donate-options-form-amount">
								<input type="hidden" name="currency_code" value="USD">
							</form>

							<p class="h2 mb-3">Donate Now!</p>
							<p>Your tax-deductible donation can continue to support QAS mission, goals, and objectives.</p>
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
