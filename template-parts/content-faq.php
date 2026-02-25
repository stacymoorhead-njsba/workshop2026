<?php
/**
 * Template part for displaying page content in faq.php
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
	
	<?php
	$faqs = get_field('faqs');
	$i = 1;
	if( $faqs ) { ?>			
	<div class="row">
		<div class="col-md-12">
			<div class="faq">	
				<?php
				foreach( $faqs as $faq ) { 		
					$question = $faq['question'];
					$answer = $faq['answer'];
				?>				
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne-<?php echo $i;?>">
					  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $i;?>">
						<?php echo esc_html( $question ); ?>
					  </button>
					</h2>
					<div id="collapseOne-<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="headingOne-<?php echo $i;?>" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<?php echo $answer; ?>
						 </div><!--accordion-body-->
					</div><!--accordion-collapse-->
				</div><!--accordion-item-->
				<?php $i++; 
				} ?>
			</div><!--faq-->
		</div><!--col-md-12-->	
	</div><!--row-->
	<?php } ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
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
	</div><!-- .entry-content -->		
</article><!-- #post-<?php the_ID(); ?> -->
