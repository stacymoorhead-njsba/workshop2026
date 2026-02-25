<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package workshop
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php include 'secondary-page-header.php'; ?>
		<div class="container">
			<div class="row">
				<div  id="fade-in-6s" class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'workshop' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'workshop' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

					endwhile; // End of the loop.
					?>
				</div><!--col-md-12-->	
			</div><!--row-->	
		</div><!--container -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
