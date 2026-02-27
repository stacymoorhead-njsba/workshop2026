<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package workshop
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="container-fluid">
            <div class="row footer">
                <div class="col-md-12">
                    <div class="d-flex justify-content-around flex-wrap">
						<div class="award fade-in-6s">
							<h2>Award Winning Workshops</h2>
							<div class="d-flex">
								<div class="div2021">
									<h3>Workshop 2021</h3>
									<p><strong>Best Nonprofit Event</strong></p>
									<a href="https://eventeerawards.vfairs.com/winners/"><img src="/wp-content/themes/workshop2026/img/badge.png" alt="Eventeer Awards 2022 runner up badge" /></a>
								</div>
								<div class="div2022">
									<h3>Workshop 2022</h3>
									<a href="https://www.associationtrends.com/trendy-awards/" target="_blank"><img src="/wp-content/themes/workshop2026/img/trendy-logo-2023.png" alt="Association Trends, Trendy 2024 logo" /></a>
									<p><strong>Gold</strong> — Convention Promotion Package</p>
									<p><strong>Gold</strong> — Exhibitor Sales Kit</p>
								</div>	
								<div class="div2024">
									<h3>Workshop 2024</h3>
									<p><strong>Honoree</strong></p>
									<a href="https://tsefastest50.com/honorees/" target="_blank"><img src="/wp-content/themes/workshop2026/img/F50-2025-Tile-Blue-Horizontal.jpg" alt="" /></a>
								</div>
							</div><!--d-flex-->	
						</div><!--award-->
						<?php
						// check if menu is empty or not					
						$has_menu_items = wp_nav_menu( array( 'theme_location' => 'quick-links', 'echo' => false )) !== false;

						// check if menu location is assigned
						$is_assigned = has_nav_menu('quick-links');

						// check for both conditions
						if($has_menu_items && $is_assigned) {
						?>
                        <div class="quick-links fade-in-6s">
                            <h2>Quick Links</h2>
                           <?php
                            wp_nav_menu(array(
					           'theme_location' => 'quick-links',
                                'depth' => 1
                            ));
				            ?>
                        </div><!--quick-links-->
						<?php } ?>
                        <div class="sponsored-by fade-in-6s">
                            <h2>Sponsored by</h2>
                            <p><a href="https://www.njsba.org" target="new">NJSBA</a></p>
                            <p><a href="http://www.njasa.net/" target="new">NJASA</a></p>
                            <p><a href="http://www.njasbo.com/" target="new">NJASBO</a></p>
                        </div><!--sposored-by-->
                        <div class="social fade-in-6s">
                            <h2>Find us on</h2>
                            <p>
                                <a href="https://www.facebook.com/njsba" target="new"><i class="fab fa-2x fa-facebook"></i></a> 
                                <a href="https://www.twitter.com/njsba" target="new"><i class="fa-brands fa-2x fa-x-twitter"></i></a> 
								<a href="https://www.instagram.com/njschoolboards/" target="new"><i class="fab fa-2x fa-instagram"></i></a> 
                                <a href="https://www.youtube.com/njsba" target="new"><i class="fab fa-2x fa-youtube"></i></a>
								<a href="https://www.linkedin.com/company/new-jersey-school-boards-association/" target="new"><i class="fab fa-2x fa-brands fa-linkedin-in"></i></a>
                            </p>
                            <p>#NJSBAWorkshop</p>
                            <a href="/contact/" role="button" class="btn btn-primary">Contact</a>
                        </div><!--social-->
                    </div><!--d-flex-->                          
                </div><!--col-med-12-->
            </div><!--row-->
            <div class="row copyright">
                <div class="col-md-12 fade-in-6s">
                    <p>&copy; <?php echo date("Y"); ?> New Jersey School Boards Association. All Rights Reserved.<br>
                    No part of this document may be reproduced in any form or by any means without permission in writing from NJSBA.</p>                       
                </div><!--col-med-12-->
            </div><!--row-->       
        </div><!--container-fluid-->       
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
