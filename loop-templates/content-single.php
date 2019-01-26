<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title pb-3">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php /* understrap_posted_on(); */ ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content pt-5">

		<?php if ( !has_post_thumbnail() ) : ?>
			<?php the_content(); ?>
		<?php else: ?>

			<div class="row">
				<div class="col-md-7">
					<?php the_content(); ?>
				</div>
				<div class="col-md-5">

					<a href="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" target="_blank">
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

		<!-- <?php if ( in_category( 'cats' ) ) : ?>
			<hr class="my-5">
			<h3 class="pb-3">Adoptable this and/or other cats below</h3>
			<iframe src="http://ws.petango.com/webservices/adoptablesearch/wsAdoptableAnimals2.aspx?species=Cat&amp;gender=A&amp;agegroup=All&amp;location=&amp;site=&amp;onhold=A&amp;orderby=ID&amp;colnum=3&amp;css=&amp;authkey=xs2ff5ungpwuh2whi5va85f0ws3he13qo0tcw2fouaaw48jfjx&amp;recAmount=&amp;detailsInPopup=No&amp;featuredPet=Include&amp;stageID=" scrolling="auto" frameborder="0" class="full-size"></iframe>
		<?php elseif ( in_category( 'dogs' ) ) : ?>
			<hr class="my-5">
			<h3 class="pb-3">Adoptable this and/or other dogs below</h3>
			<iframe src="http://ws.petango.com/webservices/adoptablesearch/wsAdoptableAnimals2.aspx?species=Dog&amp;gender=A&amp;agegroup=All&amp;location=&amp;site=&amp;onhold=A&amp;orderby=ID&amp;colnum=3&amp;css=&amp;authkey=xs2ff5ungpwuh2whi5va85f0ws3he13qo0tcw2fouaaw48jfjx&amp;recAmount=&amp;detailsInPopup=No&amp;featuredPet=Include&amp;stageID=" scrolling="auto" frameborder="0" class="full-size"></iframe>
		<?php endif; ?> -->

		<?php /* understrap_entry_footer(); */ ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
