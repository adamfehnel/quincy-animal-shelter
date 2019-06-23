<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper mt-auto w-100 <?php if ( !is_front_page() ) : ?>mt-5<?php endif; ?>" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">
					
					<div class="row justify-content-between mb-4 mb-sm-0 upper">
						<?php
						$adoptionInfo = get_page_by_title('Adoption Hours', OBJECT, 'post');
						if ( isset( $adoptionInfo ) ) :
						?>
						<div class="col-sm-6 col-lg-3 mb-4 adoption-info">
							<p class="h5 text-700 mb-3">Adoption Hours</p>
							<?php echo $adoptionInfo->post_content; ?>
						</div>
						<?php endif; ?>

						<div class="col-sm-6 col-lg-6 col-xl-5">
							<p class="h5 text-700 mb-3"><a href="/get-involved/donate/">Donating to QAS</a></p>
							<p>Quincy Animal Shelter is a non-profit organization under section 501(c)(3) of the Internal Revenue Code and a recognized Massachusetts charity.</p>
							<p>Your donation to QAS may qualify for an income tax deduction in accordance with Federal and/or State income tax laws. Please consult with your tax advisor to determine whether your donation is tax deductible in whole or in part.</p>
						</div>

						<div class="col-lg-3">
							<?php
							global $post;
							$args = array( 'numberposts' => 3, 'category_name' => 'sponsors' );
							$posts = get_posts( $args );
							?>
							<?php if ( !empty( $posts ) ) : ?>
								<!-- <h2 class="text-center pt-5 pb-2">
									<a href="/get-involved/become-a-sponsor/" class="text-inherit">Sponsors</a>
								</h2> -->
								
								<div class="row justify-content-around">
								<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
									<?php
										$goodLink = get_post_meta($post->ID, 'alternateLink', true);
										if ( empty( $goodLink ) ) {
											$goodLink = get_the_permalink();
										}
									?>
									<div class="col col-auto col-lg text-center my-3">
										<a href="<?php echo $goodLink; ?>" target="_blank">
											<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
										</a>
										<h6 class="pt-2">
											<a href="<?php echo $goodLink; ?>" target="_blank" class="text-inherit"><?php the_title(); ?></a>
										</h6>
									</div>
								<?php endforeach; ?>
								</div>

							<?php endif; ?>
						</div>
					</div>
					
					<hr>

					<div class="site-info lower">

						<div class="row align-items-center text-center text-md-left">
							<div class="col-md mb-3 mb-md-0">&copy; 1999-<?php echo date("Y"); ?> Quincy Animal Shelter.  All rights reserved.</div>
							<div class="col-md mb-3 mb-md-0 text-center social-icons">
								<a class="px-1" href="mailto:info@quincyanimalshelter.org"><i class="fa fa-envelope"></i></a>
								<a class="px-1" href="https://www.facebook.com/QuincyAnimalShelter.org/" target="_blank"><i class="fa fa-facebook-square"></i></a>
								<a class="px-1" href="https://twitter.com/qasquincy" target="_blank"><i class="fa fa-twitter-square"></i></a>
								<a class="px-1" href="https://www.youtube.com/user/QuincyAnimalShelter1" target="_blank"><i class="fa fa-youtube-square"></i></a>
								<a class="px-1" href="https://www.instagram.com/quincyanimalshelter/" target="_blank"><i class="fa fa-instagram"></i></a>
							</div>
							<div class="col-md">Questions about this site? <a href="mailto:webmaster@quincyanimalshelter.org">webmaster@quincyanimalshelter.org</a></div>
						</div>

						<?php /*understrap_site_info();*/ ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<a href="#" id="back-to-top" style="display: none;">
	<i class="fa fa-chevron-up"></i>
	<div class="back-text">Top</div>
</a>

</body>

</html>
