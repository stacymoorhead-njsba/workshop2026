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
	<svg id="line" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 2500" strokeLinecap="round" strokeMiterlimit="1">
		<defs>
		<linearGradient id="myGradient" gradientTransform="rotate(90)">
		  <stop offset="5%" stop-color="#ec174c" />
		</linearGradient>
	  </defs>
		<path id="line-base" d="M439.2-2.9c21.3,42.4,7.1,118.4-27.8,150.7s-81.9,47.3-127.7,59.6c-45.9,12.2-93.3,22.9-133.1,48.8-57,37-92.4,105-90.2,172.9,2.2,67.9,42.1,133.4,101.3,166.6,36,20.2,77.9,28.9,111.7,52.5s57.3,71.6,34.8,106.1c-35.1,53.6-129,15-177,57.4-32,28.2-27.8,81.5-4.4,117.1,23.4,35.6,60.9,59,94.4,85.3,112.6,88.2,189.1,221.2,208.8,362.9,7.1,51,5.6,107.6-26.7,147.8-40.1,49.9-111.5,57-173.8,71.6-62.3,14.6-132.5,55.5-130.3,119.4,1.8,53.6,55,90.8,106.1,107.1,51.1,16.3,107.5,22,150.5,54.1,80.9,60.4,73.2,195.3,2.6,267.6-38.8,39.7-90.2,64-139.5,89.5-49.3,25.5-99.3,54.4-131.3,99.7-32,45.4-30.9,118.1,3.5,161.7" fill="none" stroke="#f06c71" stroke-width="3" stroke-dasharray="15" />
		<path class="line-running" stroke="url('#myGradient')"  pathLength="1" d="M439.2-2.9c21.3,42.4,7.1,118.4-27.8,150.7s-81.9,47.3-127.7,59.6c-45.9,12.2-93.3,22.9-133.1,48.8-57,37-92.4,105-90.2,172.9,2.2,67.9,42.1,133.4,101.3,166.6,36,20.2,77.9,28.9,111.7,52.5s57.3,71.6,34.8,106.1c-35.1,53.6-129,15-177,57.4-32,28.2-27.8,81.5-4.4,117.1,23.4,35.6,60.9,59,94.4,85.3,112.6,88.2,189.1,221.2,208.8,362.9,7.1,51,5.6,107.6-26.7,147.8-40.1,49.9-111.5,57-173.8,71.6-62.3,14.6-132.5,55.5-130.3,119.4,1.8,53.6,55,90.8,106.1,107.1,51.1,16.3,107.5,22,150.5,54.1,80.9,60.4,73.2,195.3,2.6,267.6-38.8,39.7-90.2,64-139.5,89.5-49.3,25.5-99.3,54.4-131.3,99.7-32,45.4-30.9,118.1,3.5,161.7" fill="none" stroke="#000" stroke-width="3" />
	</svg>
	<h1 style="display:none;">Welcome to Workshop </h1>
	<section class="hero" id="hero">
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
		<div class="banner">
			<img class="desktop" src="/wp-content/themes/workshop2026/img/ws26website_homepage_banner_bg.svg" alt="vintage rolled out map with the outline of land. There are blue and gold hot air balloons with pencil points for a basket floating along a coral-colored dotted line. There are two sketched sillouttes of student explorers waling along the line. In the center, the words Workshop 2026 are writtin in a cursive font. To the right of that a larger hot air balloon floats with a banner containing the tagline Charting the Path, Empowering Journeys.">

			<div class="banner-graphic">
				<img src="/wp-content/themes/workshop2026/img/ws26website_homepage_banner_graphics.svg">
			</div><!--banner-graphic-->	
			<img class="mobile" src="/wp-content/themes/workshop2026/img/ws26website_homepage_banner_bg_mobile.svg" alt="vintage rolled out map with the outline of land. There are blue and gold hot air balloons with pencil points for a basket floating along a coral-colored dotted line. There are two sketched sillouttes of student explorers waling along the line. In the center, the words Workshop 2026 are writtin in a cursive font. To the right of that a larger hot air balloon floats with a banner containing the tagline Charting the Path, Empowering Journeys.">		
			<img class="banner-graphic-mobile" src="/wp-content/themes/workshop2026/img/ws26website_homepage_banner_graphics_mobile.svg">		
			<div class="date-co-sponsor">
				<div class="date">
				<strong>Oct. <br>19-22</strong> 			
				</div>	
				<div class="co-sponsor">
					<span>Co-sponsored by</span> <br><strong>NJASA &amp; NJASBO</strong> 	
				</div>
			</div><!--date-co-sponsor-->	
			<!--<div class="date">
				<strong>Oct. <br>19-20</strong> 			
			</div>	
			<div class="co-sponsor">
				<span>Co-sponsored by</span> <br><strong>NJASA &amp; NJASBO</strong> 	
			</div><!--date-->			
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