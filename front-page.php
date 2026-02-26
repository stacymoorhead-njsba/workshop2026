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
<main id="primary" class="site-main">

	<h1 style="display:none;">Welcome to Workshop </h1>
	<section class="hero" id="hero">
		<div class="banner">
			<img src="/wp-content/themes/workshop2026/img/ws26website_homepage_banner.svg" alt="vintage rolled out map with the outline of land. There are blue and gold hot air balloons with pencil points for a basket floating along a coral-colored dotted line. There are two sketched sillouttes of student explorers waling along the line. In the center, the words Workshop 2026 are writtin in a cursive font. To the right of that a larger hot air balloon floats with a banner containing the tagline Charting the Path, Empowering Journeys.">
			<?php
			$call_to_action = get_field('call_to_action');
			if( $call_to_action['headline'] || $call_to_action['description'] || $call_to_action['call_to_action_button_url'] || $call_to_action['call_to_action_button_link_text'] ) { ?>
			<div class="container call-to-action-position">
				<div id="fade-in-4s" class="call-to-action-home">
							<div class="call-to-action-text <?php 
							if( $call_to_action['call_to_action_button_url'] && $call_to_action['call_to_action_button_link_text'] ) { ?>text-align-left <?php } ?>">
								<h2><?php echo esc_html( $call_to_action['headline'] ); ?></h2>
								<p><?php echo esc_html( $call_to_action['description'] ); ?></p>
							</div><!--call-to-action-text-->
							<?php 
							if( $call_to_action['call_to_action_button_url'] && $call_to_action['call_to_action_button_link_text'] ) { ?>

								<a role="button" class="btn call-to-action-btn" href="<?php echo esc_url( $call_to_action['call_to_action_button_url'] ); ?>"><?php echo esc_html( $call_to_action['call_to_action_button_link_text'] ); ?></a>
								<?php } ?>
				</div><!--call-to-action-->			
			</div><!--container-->	
			<?php } ?>	
		</div><!--banner-->	
		<div class="scroll-down">
			<a href="#scroll-down"><img src="/wp-content/themes/workshop2026/img/ws26website_scroll.svg" alt="red gps marker with the words scroll and an arrow pointing down"></a>
		</div><!--scroll-down-->		
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
	<?php
	$video_description = get_field('video_description');
	$video_embed = get_field('video_embed');
	if( $video_embed ) { ?>	
	<section class="homepage-video">		
		<div class="row">
			<div class="col-xl-7 video-bg">
				<div class="video-container ">
					<?php the_field('video_embed'); ?>
				</div>	<!--video-container-->
			</div><!--col-xl-8-->			
			<div class="col-xl-5 video-description">
				<?php the_field('video_description'); ?>
			</div><!--video-description-->
		</div><!--row-->	
	
	</section><!--homepage-video-->	
	<?php } ?>
	<div class="container-homepage">
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