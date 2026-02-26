<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package workshop
 */

?>

<article class="content-page-center content-bg" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php workshop_post_thumbnail(); ?>
	<?php
	$call_to_action = get_field('call_to_action');
	if( $call_to_action['headline'] || $call_to_action['description'] || $call_to_action['call_to_action_button_url'] || $call_to_action['call_to_action_button_link_text'] ) { ?>
	<div class="call-to-action fade-in-4s">
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
	<?php } ?>		
	<div class="entry-content
				<?php if( $call_to_action['headline'] || $call_to_action['description'] || $call_to_action['call_to_action_button_url'] || $call_to_action['call_to_action_button_link_text'] ) {?> cta-padding <?php } ?>
				
				">
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
</article><!-- #post-<?php the_ID(); ?> -->

