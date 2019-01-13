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

	<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>

	<div class="entry-content pt-5">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
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
