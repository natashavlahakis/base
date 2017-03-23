<?php
/**
 * Theme basic setup.
 *
 * @package base
 */

require get_template_directory() . '/inc/theme-settings.php';

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'base_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function base_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on base, use a find and replace
		 * to change 'base' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'base', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'base' ),
   'footer-1' => __( 'Footer 1', 'base' ),
   'footer-2' => __( 'Footer 2', 'base' ),
   'social' => __( 'Social Menu', 'base' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 290, 180, array( 'center', 'center') );
  add_image_size( 'featured-article', 640, 448, array( 'center', 'center' ) );
  add_image_size( 'featured-games', 650, 420, array( 'center', 'center' ) );
  add_image_size( 'profile', 960, 400, array( 'center', 'center' ) );
  add_image_size( 'athlete-archive', 233, 135, array( 'center', 'center' ) );
  add_image_size( 'view-more', 183, 135, array( 'center', 'center' ) );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'base_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the Wordpress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Check and setup theme default settings.
		setup_theme_default_settings();
	}
endif; // base_setup.
add_action( 'after_setup_theme', 'base_setup' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Filter the except class to .excerpt.
 *
 * @param int $excerpt Excerpt class.
 * @return int (Maybe) modified excerpt class.
 */
function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}
 
add_filter( "the_excerpt", "add_excerpt_class" );