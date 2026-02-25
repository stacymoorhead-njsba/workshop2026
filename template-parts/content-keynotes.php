<?php
/**
 * Template part for displaying page content in keynotes.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php workshop_post_thumbnail(); ?>



	<?php
		$keynotes = get_field('keynotes');
		if( $keynotes ) { ?>	
		<div class="container">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-around flex-wrap">
					<?php
					foreach( $keynotes as $keynote ) { 		
						$name = $keynote['name'];
						$title = $keynote['title'];
						$bio = $keynote['bio'];
						$image = $keynote['keynote_image']['url'];
						$alt = $keynote['keynote_image']['alt'];
					?>		
					<article class="fade-in-4s">
						<div class="keynote-speaker">	
							<div class="keynote-speaker-header">
								<div class="speaker-image">
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
								</div><!--speaker-image-->	
								<div class="speaker-info">
									<h2><?php echo esc_html( $name ); ?></h2>
									<h3><?php echo esc_html( $title ); ?></h3>							
								</div>	
							</div><!--keynote-speaker-header-->
							<!--<div class="squiggly">
								<img src="/wp-content/themes/workshop/img/ws24-homepage-elements_squiggly.svg" alt="90s style squiggly purple graphic">
							</div><!--squiggly-->	
							<div class="bio">
								<?php echo $bio; ?>
							</div>	
						</div><!--keynote-speaker-->
					</article>
					<?php } ?>	
				</div><!--col-md-12-->	
			</div><!--row-->
		</div><!--container-->	
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
