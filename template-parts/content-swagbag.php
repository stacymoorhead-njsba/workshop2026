<?php
/**
 * Template part for displaying page content in swagbag.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php workshop_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'workshop' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php
	$swagbags = get_field('swagbags');
	if( $swagbags ) { ?>			
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center flex-wrap">
			<?php
			foreach( $swagbags as $swagbag ) { 		
				$image = $swagbag['swagbag_image']['url'];
				$alt = $swagbag['swagbag_image']['alt'];
				$text = $swagbag['swagbag_text'];				
			?>		
			<article class="fade-in-4s">
				<div class="swagbag">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
					<div class="swagbag-text">
						<?php echo $text; ?>
					</div><!-- swagbag-text -->
				</div><!--swagbag-speaker-->
			</article>
			<?php } ?>	
		</div><!--col-md-12-->	
	</div><!--row-->
	<?php } ?>			
<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer container">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'workshop' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
