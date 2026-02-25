<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package workshop
 */

get_header();
?>

	<main id="primary" class="site-main">
	<section class="header-secondary" id="hero">
		<img class="pipe" src="/wp-content/themes/workshop2026/img/ws24-homepage-elements_pipe2.svg" alt="super mario bros. style pipe with pixel student popping out ">
		<img class="boy" src="/wp-content/themes/workshop2026/img/ws24-homepage-elements_boy.svg" alt="pixel style boy holding a paint pallet">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<h1 class="page-title"><?php esc_html_e( 'Page can&rsquo;t be found.', 'workshop' ); ?></h1>
				</div><!--col-md-7-->
			</div><!--row-->
		</div><!--container-->	
	</section>							
		<section class="error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="entry-content content-404">
                            <p><?php esc_html_e( 'Oops! That page can&rsquo;t be found. It looks like nothing was found at this location. Maybe try a search?', 'workshop' ); ?></p>

                                <?php
                                get_search_form();
                                ?>

                        </div><!-- .page-content -->
                    </div><!--col-md-12-->
                </div><!--row-->    
            </div><!--container-->    
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();