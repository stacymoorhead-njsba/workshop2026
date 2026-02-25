<?php
/*
Template Name: Front Page 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

get_header();
?>

	<main id="primary" class="site-main front-page-bg">
		<section class="hero" id="hero">
			<img class="spotlight" src="/wp-content/themes/workshop/img/ws-website-graphics_homepage-spotlights.svg" alt="spotlights pointing down">
			<div class="video-container">
				<iframe src="https://player.vimeo.com/video/1056527543?autoplay=1&loop=1&background=1" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
				<script src=https://player.vimeo.com/api/player.js></script>
			<img class="kids" src="/wp-content/themes/workshop/img/ws-website-graphics_kids.svg" alt="sillouettes of kids standing in fun positions">	
			<img class="bottom-spotlight" src="/wp-content/themes/workshop/img/ws-website-graphics_bottom-spotlight.svg" alt="spotlights pointing up">		
			</div><!--video-container-->
			<?php
			$call_to_action = get_field('call_to_action');
			if( $call_to_action['headline'] || $call_to_action['description'] || $call_to_action['call_to_action_button_url'] || $call_to_action['call_to_action_button_link_text'] ) { ?>
			<div class="container call-to-action-position">
				<div class="call-to-action">
					<div class="row">
						<div id="fade-in-4s" class="col-md-12 d-flex justify-content-between align-items-center flex-wrap">
							<div class="call-to-action-text">
								<h2><?php echo esc_html( $call_to_action['headline'] ); ?></h2>
								<p><?php echo esc_html( $call_to_action['description'] ); ?></p>
							</div><!--call-to-action-text-->
							<?php 
							if( $call_to_action['call_to_action_button_url'] && $call_to_action['call_to_action_button_link_text'] ) { ?>
							<div class="btn-center">
								<a role="button" class="btn call-to-action-btn" href="<?php echo esc_url( $call_to_action['call_to_action_button_url'] ); ?>"><?php echo esc_html( $call_to_action['call_to_action_button_link_text'] ); ?></a>
								<?php } ?>
							</div><!--btn-center-->
						</div><!--col-md-12-->
					</div><!--row-->	
				</div><!--call-to-action-->		
				<div class="scroll-down"><a href="#scroll-down"><img class="ticket-fade" src="wp-content/uploads/ws-website-graphics_scroll.svg" alt="scroll down icon"></a></div>
			</div><!--container-->	
			<?php } ?>			
		</section><!--hero-->
		<div id="scroll-down"></div>
		<?php
		$icons = get_field('homepage_icons');
		if( $icons ) { ?>		
		<section class="icons">
			<div class="container-fluid">
				<div class="row fade-in-6s">
					<div class="col-md-12 d-flex justify-content-around flex-wrap">
						<?php
						foreach( $icons as $icon ) { 
							$link = $icon['link'];
							$image = $icon['icon_image']['url'];
							$alt = $icon['icon_image']['alt'];
							$text = $icon['text'];
							$description = $icon['description'];
						?>
						<figure>
							<a href="<?php echo esc_url( $link ); ?>">
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
								<figcaption><?php echo esc_html( $text ); ?></figcaption>
								<p><?php echo esc_html( $description ); ?></p>
							</a>	
						</figure>
						<?php } ?>
					</div><!--col-md--12-->						
				</div><!--row-->
			</div><!--container-->		
		</section><!--icons-->
		<?php } ?>		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'home' );

					endwhile; // End of the loop.
					?>
					
				</div><!--col-md-12-->	
			</div><!--row-->	
		</div><!--container -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();