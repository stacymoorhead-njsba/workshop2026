<?php
/**
 * Template part for displaying results in search pages
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
				    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				    <?php if ( 'post' === get_post_type() ) : ?>
				    <div class="entry-meta">
				    <?php
				    workshop_posted_on();
				    workshop_posted_by();
				    ?>
				    </div><!-- .entry-meta -->
				    <?php endif; ?>
				</header><!-- .entry-header -->

				<?php workshop_post_thumbnail(); ?>

				<div class="entry-summary">
						<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			</div><!--col-md-12-->	
		</div><!--row-->	
	</div><!--container -->						
</article><!-- #post-<?php the_ID(); ?> -->
