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

	<div class="row align-items-end">
		<div class="col-md-7">
			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title pb-3">', '</h1>' ); ?>

			</header><!-- .entry-header -->
		</div>
		<div class="col-md-5" style="padding-bottom: 2.2rem;">
			<a href="/adopt/" class="btn btn-sm px-md-1 px-lg-3 py-2 btn-danger">Adoption info</a>
			<a href="#" id="submit-sponsor-pet-form" class="btn btn-sm px-md-1 px-lg-3 py-2 btn-light">Sponsor <?php echo get_the_title(); ?></a>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="donate-sponsor-pet-form">
				<input type="hidden" name="business" value="qasadopt@msn.com">
				<input type="hidden" name="cmd" value="_donations">
				<input type="hidden" name="item_name" value="Sponsor a pet">
				<input type="hidden" name="item_number" value="<?php echo get_the_title(); ?>">
				<input type="hidden" name="currency_code" value="USD">
			</form>
		</div>
	</div>

	<div class="entry-content">

		<div class="row">
			<div class="col-md-7">
				<?php
					$ageCategory	= get_post_meta($post->ID, 'ageCategory', true);
					$gender			= get_post_meta($post->ID, 'gender', true);
					$sizeCategory	= get_post_meta($post->ID, 'sizeCategory', true);
					$breed			= get_post_meta($post->ID, 'breed', true);
					$age			= get_post_meta($post->ID, 'age', true);
					$coatLength		= get_post_meta($post->ID, 'coatLength', true);
					$color			= get_post_meta($post->ID, 'color', true);
					$health			= get_post_meta($post->ID, 'health', true);
					$houseTrained	= get_post_meta($post->ID, 'houseTrained', true);
					$note			= get_post_meta($post->ID, 'note', true);
					$animalID		= get_post_meta($post->ID, 'animalID', true);
					$declawed		= get_post_meta($post->ID, 'declawed', true);
					$location		= get_post_meta($post->ID, 'location', true);
					$intakeDate		= get_post_meta($post->ID, 'intakeDate', true);
					$arn			= get_post_meta($post->ID, 'arn', true);
					$petPointImage1	= get_post_meta($post->ID, 'petPointImage1', true);
					$petPointImage2	= get_post_meta($post->ID, 'petPointImage2', true);
					$petPointImage3	= get_post_meta($post->ID, 'petPointImage3', true);
				?>

				<div class="pet-meta pb-3">
					<?php if ( !empty($ageCategory) ) : ?>
						<strong><?php echo $ageCategory; ?></strong>
						<i class="fa fa-paw mx-2"></i>
					<?php endif; ?>
					<?php if ( !empty($gender) ) : ?>
						<strong><?php echo $gender; ?></strong>
					<?php endif; ?>
					<?php if ( !empty($sizeCategory) ) : ?>
						<i class="fa fa-paw mx-2"></i>
						<strong><?php echo $sizeCategory; ?></strong>
					<?php endif; ?>
				</div>

				<?php the_content(); ?>

				<table class="table my-4">
					<tbody>
						<?php if ( !empty($breed) ) : ?>
							<tr>
								<td>Breed</td>
								<td class="text-600"><?php echo $breed; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($age) ) : ?>
							<tr>
								<td>Age</td>
								<td class="text-600"><?php echo $age; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($coatLength) ) : ?>
							<tr>
								<td>Coat Length</td>
								<td class="text-600"><?php echo $coatLength; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($color) ) : ?>
							<tr>
								<td>Color</td>
								<td class="text-600"><?php echo $color; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($health) ) : ?>
							<tr>
								<td>Health</td>
								<td class="text-600"><?php echo $health; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($houseTrained) ) : ?>
							<tr>
								<td>House Trained</td>
								<td class="text-600"><?php echo $houseTrained; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($note) ) : ?>
							<tr>
								<td>Note</td>
								<td class="text-600"><?php echo $note; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($animalID) ) : ?>
							<tr>
								<td>Animal ID</td>
								<td class="text-600"><?php echo $animalID; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($declawed) ) : ?>
							<tr>
								<td>Declawed</td>
								<td class="text-600"><?php echo $declawed; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($location) ) : ?>
							<tr>
								<td>Location</td>
								<td class="text-600"><?php echo $location; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($intakeDate) ) : ?>
							<tr>
								<td>Intake Date</td>
								<td class="text-600"><?php echo $intakeDate; ?></td>
							</tr>
						<?php endif; ?>
						<?php if ( !empty($arn) ) : ?>
							<tr>
								<td>ARN</td>
								<td class="text-600"><?php echo $arn; ?></td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>

				<hr>

				<p>
					<?php if (in_category('dogs')) : ?>
						<a href="/adopt/adopt-a-dog/">&laquo; &nbsp;See all available dogs</a>
					<?php else : ?>
						<a href="/adopt/adopt-a-cat/">&laquo; &nbsp;See all available cats</a>
					<?php endif; ?>
				</p>
			</div>
			<div class="col-md-5">

				<?php 
				$firstPetPointImageShown = false;
				if ( has_post_thumbnail() ) : ?>
					<a href="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>">
						<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'w-100' ) ); ?>
					</a>
				<?php elseif ( !empty($petPointImage1) ) :
					$firstPetPointImageShown = true;
				?>
					<a href="<?php echo $petPointImage1; ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>">
						<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'w-100' ) ); ?>
						<img src="<?php echo $petPointImage1; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
					</a>
				<?php endif; ?>

				<div class="row">
					<?php 
					if ( class_exists('Dynamic_Featured_Image') ) {
						global $dynamic_featured_image;
						$additional_featured_images = $dynamic_featured_image->get_featured_images( );
						?>
						<?php foreach( $additional_featured_images as $additional_featured_image ): ?>
							<div class="col-6 mt-4">
								<a href="<?php echo $additional_featured_image['full'] ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>">
									<img src="<?php echo $additional_featured_image['thumb'] ?>" alt="" class="w-100">
								</a>
							</div>
						<?php endforeach; ?>
					<?php } ?>
					
					<?php if ( !empty($petPointImage1) && !$firstPetPointImageShown ) : ?>
						<div class="col-6 mt-4">
							<a href="<?php echo $petPointImage1; ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>" class="square-thumb">
								<img src="<?php echo $petPointImage1; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
							</a>
						</div>
					<?php endif; ?>
					
					<?php if ( !empty($petPointImage2) ) : ?>
						<div class="col-6 mt-4">
							<a href="<?php echo $petPointImage2; ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>" class="square-thumb">
								<img src="<?php echo $petPointImage2; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
							</a>
						</div>
					<?php endif; ?>
					
					<?php if ( !empty($petPointImage3) ) : ?>
						<div class="col-6 mt-4">
							<a href="<?php echo $petPointImage3; ?>" data-toggle="lightbox" data-gallery="gallery-<?php echo $post->ID; ?>" class="square-thumb">
								<img src="<?php echo $petPointImage3; ?>" alt="<?php echo get_the_title(); ?>" class="w-100">
							</a>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
