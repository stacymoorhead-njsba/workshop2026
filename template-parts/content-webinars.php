<?php
/**
 * Template part for displaying page content in webinars.php
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
	$webinars = get_field('webinars');
	if( $webinars ) { ?>			
		<div class="d-flex justify-content-center flex-wrap">
			<?php
			foreach( $webinars as $webinar ) { 		
				$title = $webinar['title'];
				$exhibitor = $webinar['exhibitor_name'];
				$booth = $webinar['booth_number'];
				$date_time = $webinar['date_time'];
				$description = $webinar['description'];
				$image = $webinar['image_logo']['url'];
				$alt = $webinar['image_logo']['alt'];
				$url = $webinar['url'];
				$link_text = $webinar['link_text'];
			?>		
			<article class="fade-in-4s webinar">
				<div class="webinar-header">
					<div class="webinar-image">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
					</div><!--speaker-image-->	
					<div class="webinar-info">
						<h2><?php echo esc_html( $title ); ?></h2>
						<h3><?php echo esc_html( $exhibitor ); ?></h3>	
						<h3 class="booth">Booth #<?php echo esc_html( $booth ); ?></h3>
					</div>	
				</div><!--webinar-header-->
				<p><?php echo $description; ?></p>
				<div class="webinar-btn"><a  role="button" class="btn btn-primary" href="<?php echo esc_url( $url ); ?>" target="new">
						<?php echo esc_html( $link_text ); ?>
					</a></div>
			</article>
			<?php } ?>	
		</div><!--d-flex-->	
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
