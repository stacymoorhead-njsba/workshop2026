<?php
/*
Template Name: FAQ
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */


get_header();
?>

	<main id="primary" class="site-main">
		<?php include 'secondary-page-header.php'; ?>
		<div class="container">
			<div class="row">
				<div id="fade-in-6s" class="col-md-12">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'faq' );

					endwhile; // End of the loop.
					?>
					
				</div><!--col-md-12-->	
			</div><!--row-->	
		</div><!--container -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
