<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package workshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'workshop' ); ?></a>

<nav class="navbar navbar-expand-xl sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<?php
				if(has_custom_logo()) {
					the_custom_logo();
				} else {
					bloginfo( 'name' );
				}
				?>
			</a>
			<button class="navbar-toggler x" type="button" data-bs-toggle="offcanvas" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<!--<span class="navbar-toggler-icon"></span>-->
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="offcanvas offcanvas-start justify-content-end" id="main-menu">
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
					<span class="icon-bar left"></span>
					<span class="icon-bar right"></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'container' => false,
					'menu_class' => '',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker()
				));
				?>
				<?php
				$frontpage_id = get_option( 'page_on_front' );
				if ( have_rows('navbar_buttons', $frontpage_id) ): ?>				
				<div class="buttons">
					<?php
					while ( have_rows('navbar_buttons', $frontpage_id) ) : the_row();
						$link = get_sub_field('navbar_button_link', $frontpage_id);
						$text= get_sub_field('navbar_button_text', $frontpage_id);
						print_r($link, $text);
						if ($link && $text):
						?>
						<a  role="button" class="btn btn-primary" href="<?php echo esc_url( $link ); ?>">
							<?php echo esc_html( $text ); ?>
						</a>
						<?php endif; ?>
					<?php endwhile; ?>	
				</div>
				<?php endif; ?>	
			</div><!--offcanvas-->
		</div><!--container-fluid-->
	</nav><!--navbar-->