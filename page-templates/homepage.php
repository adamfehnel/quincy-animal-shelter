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
				<img class="d-block w-100" src="/wp-content/themes/qas/img/home-slider-1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="/wp-content/themes/qas/img/home-slider-2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="/wp-content/themes/qas/img/home-slider-3.jpg" alt="Third slide">
			</div>
		</div>
		<div class="carousel-info mt-4 mt-lg-5">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-4 col-lg-3 white-box pt-3">
						<h5>Adoption Hours:</h5>
						<div class="row">
							<div class="col">
								<p>
									Tue/Thu<br>
									Sat
								</p>
							</div>
							<div class="col">
								<p>
									6pm-8pm<br>
									10am-4pm
								</p>
							</div>
						</div>
						<p>
							56 Broad St, Quincy MA<br>
							(617) 376-1349
						</p>
					</div>
				</div>
			</div>
		</div>
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

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
