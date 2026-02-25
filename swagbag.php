<?php
/*
Template Name: Swag Bag
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */


get_header();
?>

	<main id="primary" class="site-main">
		<?php include 'animated-page-header.php'; ?>
		<?php
		$call_to_action = get_field('call_to_action');
		if( $call_to_action['headline'] || $call_to_action['description'] || $call_to_action['call_to_action_button_url'] || $call_to_action['call_to_action_button_link_text'] ) { ?>
		<section class="call-to-action">
			<div class="container">
				<div id="fade-in-4s" class="row">
					<div class="col-md-12 d-flex justify-content-between align-items-center">
						<div class="call-to-action-text">
							<h2><?php echo esc_html( $call_to_action['headline'] ); ?></h2>
							<p><?php echo esc_html( $call_to_action['description'] ); ?></p>
						</div><!--call-to-action-text-->
						<?php 
						if( $call_to_action['call_to_action_button_url'] && $call_to_action['call_to_action_button_link_text'] ) { ?>
						<a role="button" class="btn call-to-action-btn" href="<?php echo esc_url( $call_to_action['call_to_action_button_url'] ); ?>"><?php echo esc_html( $call_to_action['call_to_action_button_link_text'] ); ?></a>
						<?php } ?>
					</div><!--col-md-12-->
				</div><!--row-->	
			</div><!--container-->				
		</section><!--call-to-action-->	
		<?php } ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'swagbag' );

					endwhile; // End of the loop.
					?>
					
				</div><!--col-md-12-->	
			</div><!--row-->	
		</div><!--container -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
