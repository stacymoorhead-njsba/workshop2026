<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package workshop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
		
			<section class="header-animation">
				<div id="container" class="wrapper">
					<ul id="scene" class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" style="width: 100%; transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden;">

						<!---SUN--->
						<li class="layer" data-depth="0.20" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-14.85px, 7.89px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="sun"></div></li>
						<!---AC--->
						<li class="layer" data-depth="0.10" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-14.85px, 7.89px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="ac"></div></li>
						<!---CLOUDS--->
						<li class="layer" data-depth="0.90" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-89.1px, 47.34px, 0px); transform-style: preserve-3d; backface-visibility: hidden;">
							<ul class="clouds depth-60">
								<li><div class="cloud2"><img class="cloud-small" src="/wp-content/themes/workshop/img/website-layers_cloud.svg" alt="animated cloud"></div></li>
								<li><div class="cloud3"><img class="cloud-med" src="/wp-content/themes/workshop/img/website-layers_cloud.svg" alt="animated cloud"></div></li>					
							</ul>
						</li>
						<!---WAVES--->
						<li class="layer" data-depth="0.50" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-74.25px, 39.45px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="wave wave4 depth-50"></div></li>		
						<li class="layer" data-depth="0.60" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-89.1px, 47.34px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="wave wave3 depth-60"></div></li>
						<li class="layer" data-depth="0.80" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-118.8px, 63.12px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="wave wave2 depth-80"></div></li>
						<li class="layer" data-depth="1.00" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-148.5px, 78.9px, 0px); transform-style: preserve-3d; backface-visibility: hidden;"><div class="wave wave1 depth-100"></div></li>
						<!---HEADING--->
						<li class="layer" data-depth="0" style="position: absolute; display: block; left: 0px; top: 0px; transform: translate3d(-29.7px, 15.78px, 0px); transform-style: preserve-3d; backface-visibility: hidden;">
							<h1>	
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'workshop' ), '<span>' . get_search_query() . '</span>' );
							?>
							</h1>
						</li>
				</ul>
				</div><!--wrapper-->		
			</section>						

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
            ?>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php the_posts_navigation(); ?>
                    </div><!--col-md-12-->
                </div><!--row-->    
            </div><!--container-->
        <?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
