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
	<?php
	// check for rows (parent repeater)
if( have_rows('leadership') ): ?>
		<div class="row leadership">
			<div class="col-md-12">
			<?php 

			// loop through rows (parent repeater)
			while( have_rows('leadership') ): the_row(); ?>
				<div class="d-flex justify-content-center">
					<h2 class="organization"><?php the_sub_field('organization'); ?></h2>
				</div>
				<?php 

				// check for rows (sub repeater)
				if( have_rows('members') ): ?>
				<div class="members">
					<?php 

					// loop through rows (sub repeater)
					while( have_rows('members') ): the_row();
						$photo = get_sub_field('photo');
						$url = $photo['url'];
						$alt = $photo['alt'];
						// display each item as a list - with a class of completed ( if completed )
						?>
					<article class="member">
						<img src="<?php echo esc_url($url) ?>" alt="<?php echo esc_attr($alt) ?>" />
						<h3><?php the_sub_field('position'); ?></h3>
						<p class="name"><strong><?php the_sub_field('name'); ?></strong></p>
						<p class="district"><?php the_sub_field('district'); ?></p>
					</article><!--member-->	
					<?php endwhile; ?>
				<?php endif; //if( get_sub_field('members') ): ?>   
				</div><!--members-->
			<?php endwhile; // while( has_sub_field('organization') ): ?>
		</div><!--row-->
<?php endif; // if( get_field('leadership') ): ?>
			
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
