<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

	<section class="header-secondary" id="hero">
		<img class="pipe" src="/wp-content/themes/workshop2026/img/ws24-homepage-elements_pipe2.svg" alt="super mario bros. style pipe with pixel student popping out ">
		<img class="boy" src="/wp-content/themes/workshop2026/img/ws24-homepage-elements_boy.svg" alt="pixel style boy holding a paint pallet">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div><!--col-md-7-->
			</div><!--row-->
		</div><!--container-->	
	</section>				

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
