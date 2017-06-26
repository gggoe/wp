<?php
/**
 * Power Mag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Power_Mag
 */

if ( ! function_exists( 'power_mag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function power_mag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Power Mag, use a find and replace
	 * to change 'power-mag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'power-mag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    
    add_image_size('power-mag-hilight-large', 600, 282, true );
    add_image_size('power-mag-hilight-thumb', 300, 282, true );
    add_image_size('power-mag-widget-large', 426, 220, true );
    add_image_size('power-mag-widget-large-2', 426, 256, true );
    add_image_size('power-mag-cat-1-banner',600, 564, true);
    add_image_size('power-mag-cat-2-banner',426, 564, true);
       
    
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'power_mag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    add_theme_support( 'custom-logo', array(
       'height'      => 70,
       'width'       => 160,
       'flex-width' => true,
       'flex-height' => true,
       'priority' => 6
    ) );
    
    add_theme_support( 'woocommerce' );
    
   	$GLOBALS['content_width'] = apply_filters( 'power_mag_content_width', 1230 );
}
endif;
add_action( 'after_setup_theme', 'power_mag_setup' );


/**
 * Enqueue scripts and styles.
 */
function power_mag_scripts() {
	wp_enqueue_style( 'power-mag-style', get_stylesheet_uri() );
    wp_enqueue_style( 'power-mag-google-font-arimo', '//fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css');
    wp_enqueue_style( 'power-mag-responsive-css', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
    
	wp_enqueue_script( 'power-mag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'power-mag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.1.4', true );
    wp_enqueue_script( 'jquery-newsTicker', get_template_directory_uri() . '/js/newsTicker.js', array('jquery'), '1.0.11', true );
    wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '', true );
    wp_enqueue_script( 'power-mag-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
    
}
add_action( 'wp_enqueue_scripts', 'power_mag_scripts' );

function power_mag_custom_wp_admin_style() {
        wp_register_style( 'power-mag-admin-style-css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'power-mag-admin-style-css' );
}
add_action( 'admin_enqueue_scripts', 'power_mag_custom_wp_admin_style' );


/**
 * Define Directory Location Constants
 */
define( 'POWERMAG_MAIN_DIR', get_template_directory() );
define( 'POWERMAG_CHILD_DIR', get_stylesheet_directory() );

define( 'POWERMAG_INCLUDES_DIR', POWERMAG_MAIN_DIR. '/inc' );
define( 'POWERMAG_CSS_DIR', POWERMAG_MAIN_DIR . '/css' );
define( 'POWERMAG_JS_DIR', POWERMAG_MAIN_DIR . '/js' );
define( 'POWERMAG_LANGUAGES_DIR', POWERMAG_MAIN_DIR . '/languages' );

define( 'POWERMAG_ADMIN_DIR', POWERMAG_INCLUDES_DIR . '/admin' );
define( 'POWERMAG_WIDGETS_DIR', POWERMAG_INCLUDES_DIR . '/widgets' );

define( 'POWERMAG_ADMIN_IMAGES_DIR', POWERMAG_ADMIN_DIR . '/images' );



define( 'POWERMAG_MAIN_URL', get_template_directory_uri() );

define( 'POWERMAG_INCLUDES_URL', POWERMAG_MAIN_URL. '/inc' );
define( 'POWERMAG_CSS_URL', POWERMAG_MAIN_URL . '/css' );
define( 'POWERMAG_JS_URL', POWERMAG_MAIN_URL . '/js' );
define( 'POWERMAG_LANGUAGES_URL', POWERMAG_MAIN_URL . '/languages' );

define( 'POWERMAG_ADMIN_URL', POWERMAG_INCLUDES_URL . '/admin' );
define( 'POWERMAG_WIDGETS_URL', POWERMAG_INCLUDES_URL . '/widgets' );

define( 'POWERMAG_IMAGES_URL', POWERMAG_INCLUDES_URL . '/images' );
define( 'POWERMAG_ADMIN_IMAGES_URL', POWERMAG_ADMIN_URL . '/images' );


/**
 * Custom template tags for this theme.
 */
require POWERMAG_MAIN_DIR . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require POWERMAG_MAIN_DIR . '/inc/extras.php';

/**
 * Customizer additions.
 */
require POWERMAG_MAIN_DIR . '/inc/customizer.php';

/**
 * Customizer additions.
 */

require_once( POWERMAG_MAIN_DIR . '/trt-customize-pro/upsale/class-customize.php' );

/**
 * Power Mag custom Functions
 */
require POWERMAG_MAIN_DIR . '/inc/powermag-functions.php';


/**
 * Power Mag custom widgets
 */
require POWERMAG_INCLUDES_DIR . '/powermag-widgets.php';