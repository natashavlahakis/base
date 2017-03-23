<?php
/**
 * Check and setup theme's default settings
 *
 * @package base
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$base_posts_index_style = get_theme_mod( 'base_posts_index_style' );
	if ( '' == $base_posts_index_style ) {
		set_theme_mod( 'base_posts_index_style', 'default' );
	}

	// Sidebar position.
	$base_sidebar_position = get_theme_mod( 'base_sidebar_position' );
	if ( '' == $base_sidebar_position ) {
		set_theme_mod( 'base_sidebar_position', 'right' );
	}

	// Container width.
	$base_container_type = get_theme_mod( 'base_container_type' );
	if ( '' == $base_container_type ) {
		set_theme_mod( 'base_container_type', 'container' );
	}
}
