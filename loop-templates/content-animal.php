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

	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="row">
			<div class="col-md-7">
				<?php
					$ageCategory = get_post_meta($post->ID, 'ageCategory', true);
					$gender = get_post_meta($post->ID, 'gender', true);
					$sizeCategory = get_post_meta($post->ID, 'sizeCategory', true);
					$breed = get_post_meta($post->ID, 'breed', true);
					$age = get_post_meta($post->ID, 'age', true);
					$coatLength = get_post_meta($post->ID, 'coatLength', true);
					$color = get_post_meta($post->ID, 'color', true);
					$health = get_post_meta($post->ID, 'health', true);
					$houseTrained = get_post_meta($post->ID, 'houseTrained', true);
					$note = get_post_meta($post->ID, 'note', true);
					$animalID = get_post_meta($post->ID, 'animalID', true);
					$declawed = get_post_meta($post->ID, 'declawed', true);
					$location = get_post_meta($post->ID, 'location', true);
					$intakeDate = get_post_meta($post->ID, 'intakeDate', true);
					$arn = get_post_meta($post->ID, 'arn', true);
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

				<p><a href="/adopt/">Adoption information</a></p>
				<p><a href="/adopt/available-pets/">See all pets</a></p>
			</div>
			<div class="col-md-5">
				<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>

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

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
