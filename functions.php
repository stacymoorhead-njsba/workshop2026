<?php
/**
 * workshop2026 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package workshop2026
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function workshop2026_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on workshop2026, use a find and replace
		* to change 'workshop2026' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'workshop2026', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	
	// bootstrap 5 wp_nav_menu walker
	class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
	{
	  private $current_item;
	  private $dropdown_menu_alignment_values = [
		'dropdown-menu-start',
		'dropdown-menu-end',
		'dropdown-menu-sm-start',
		'dropdown-menu-sm-end',
		'dropdown-menu-md-start',
		'dropdown-menu-md-end',
		'dropdown-menu-lg-start',
		'dropdown-menu-lg-end',
		'dropdown-menu-xl-start',
		'dropdown-menu-xl-end',
		'dropdown-menu-xxl-start',
		'dropdown-menu-xxl-end'
	  ];

	  function start_lvl(&$output, $depth = 0, $args = null)
	  {
		$dropdown_menu_class[] = '';
		foreach($this->current_item->classes as $class) {
		  if(in_array($class, $this->dropdown_menu_alignment_values)) {
			$dropdown_menu_class[] = $class;
		  }
		}
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
	  }

	  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	  {
		$this->current_item = $item;

		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;

		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) {
		  $classes[] = 'dropdown-menu dropdown-menu-end';
		}

		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		$active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
		$nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
		$attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	  }
	}
	// register a new menu
	register_nav_menu('main-menu', 'Main Menu');
    register_nav_menu('quick-links', 'Quick Links');
	register_nav_menu('landing-page', 'Landing Page');
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'workshop2026' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'workshop2026_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
	/* Editor styles */
	add_theme_support('editor-styles');
	add_editor_style ( array('inc/editor-styles.css', workshop2026_fonts_url() ));
}
add_action( 'after_setup_theme', 'workshop2026_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function workshop2026_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'workshop2026_content_width', 640 );
}
add_action( 'after_setup_theme', 'workshop2026_content_width', 0 );

/**
 * Register custom fonts.
 */
function workshop2026_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro and PT Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$acumin_pro_extra_condensed = _x( 'on', 'acumin-pro-extra-condensed: on or off', 'workshop2026' );
	$acumin_pro_semi_condensed = _x( 'on', 'acumin-pro-semi-condensed: on or off', 'workshop2026' );
	$bodega_sans = _x( 'on', 'pf-videotext: on or off', 'workshop2026' );

	$font_families = array();

	if ( 'off' !== $acumin_pro_extra_condensed ) {
		$font_families[] = 'acumin-pro-extra-condensed:400,400i';
	}

	if ( 'off' !== $acumin_pro_semi_condensed ) {
		$font_families[] = 'acumin-pro-semi-condensed:400,400i,700,700i';
	}
	
	if ( 'off' !== $bodega_sans ) {
		$font_families[] = 'pf-videotext:400'; 
	}


	if ( in_array( 'on', array($acumin_pro_extra_condensed, $acumin_pro_semi_condensed, $bodega_sans) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://use.typekit.net/chm1krq.css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function workshop2026_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'workshop2026' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'workshop2026' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'workshop2026_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function workshop2026_scripts() {
	wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'typekit', '//use.typekit.net/aei5can.css', array(), _S_VERSION );
	wp_enqueue_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'fontawesome', '//kit.fontawesome.com/b468ecb3b1.js', array(), _S_VERSION );
	wp_enqueue_script( 'chart', get_template_directory_uri() . '/js/Chart.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'chart', get_template_directory_uri() . '/js/Chart.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'dashboard', get_template_directory_uri() . '/js/live_dashboard.js', array('jquery'), _S_VERSION);
	wp_enqueue_script( 'bootstrap-scripts', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	
	wp_enqueue_style( 'workshop2026-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'workshop2026-style', 'rtl', 'replace' );

	wp_enqueue_script( 'workshop2026-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if (get_the_title() != 'Checkout') {
		wp_enqueue_script( 'libraries', get_template_directory_uri() . '/js/libraries.min.js', array('jquery'), _S_VERSION, true );
	}		
	wp_enqueue_script( 'zenscroll', get_template_directory_uri() . '/js/zenscroll-min.js', array('jquery'), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bucket', get_template_directory_uri() . '/js/bucket.js', array('jquery'), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
}
add_action( 'wp_enqueue_scripts', 'workshop2026_scripts' );

/**
 * Woo Commerce Support
 */
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Shop', 'breadcrumb', 'woocommerce' ),
        );
}

/**
 * Replace the home link URL
 */
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return '/shop';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

