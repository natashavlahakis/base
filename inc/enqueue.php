<?php
/**
 * base enqueue scripts
 *
 * @package base
 */

if ( ! function_exists( 'base_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function base_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'base-styles', get_stylesheet_directory_uri() . '/a/c/theme.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'base-scripts', get_template_directory_uri() . '/a/j/theme-min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'base_scripts' ).

add_action( 'wp_enqueue_scripts', 'base_scripts' );
