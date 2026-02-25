<?php
/**
 * Template part for displaying page content in partners.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php workshop_post_thumbnail(); ?>

	<div class="container-fluid">
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
	$logos = get_field('logos');
	if( $logos ) { ?>			
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center align-items-center flex-wrap">
			<?php
			foreach( $logos as $logo ) { 		
				$image = $logo['logo_image']['url'];
				$alt = $logo['logo_image']['alt'];
				$company = $logo['company_name'];	
				$website = $logo['website'];
				$image_width = $logo['image_width'];
			?>		
			<article class="fade-in-4s logo">
				<a href="<?php echo esc_url( $website ); ?>" target="new">
					<?php if( $image_width == '300px' ) { ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" style="max-width: 300px;"/>
					<?php } elseif( $image_width == '75px' ) { ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" style="max-width: 75px;"/>
					<?php } elseif( $image_width == '150px' ) { ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" style="max-width: 150px;"/>
					<?php } elseif( $image_width == '200px' ) { ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" style="max-width: 200px;"/>
					<?php }; ?>
					<div class="logo-text">
						<?php echo $company; ?>
					</div><!-- logo-text -->
				</a><!--logo-->
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