<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						//the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							workshop_posted_on();
							workshop_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php workshop_post_thumbnail(); ?>

				<div class="entry-content content-bg">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'workshop' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'workshop' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php workshop_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div><!--col-md-12-->	
		</div><!--row-->	
	</div><!--container -->				
</article><!-- #post-<?php the_ID(); ?> -->
