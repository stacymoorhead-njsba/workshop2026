<?php
/*
Template Name: Leadership
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */


get_header();
?>

	<main id="primary" class="site-main">
		<?php include 'secondary-page-header.php'; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'leadership' );

					endwhile; // End of the loop.
					?>
					
				</div><!--col-md-12-->	
			</div><!--row-->	
		</div><!--container -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
