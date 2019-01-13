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

<div class="wrapper gray-box mt-auto w-100 <?php if ( !is_front_page() ) : ?>mt-5<?php endif; ?>" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<div class="row">
							<div class="col-md mb-3 mb-md-0">&copy; 1999-2018 Quincy Animal Shelter.  All rights reserved.</div>
							<div class="col-md mb-3 mb-md-0 text-center social-icons">
								<a href="#"><i class="fa fa-envelope"></i></a>
								<a href="#"><i class="fa fa-facebook-square"></i></a>
								<a href="#"><i class="fa fa-twitter-square"></i></a>
								<a href="#"><i class="fa fa-youtube-square"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
							<div class="col-md mb-3 mb-md-0">Questions about this site? <a href="mailto:webmaster@quincyanimalshelter.org">webmaster@quincyanimalshelter.org</a></div>
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
