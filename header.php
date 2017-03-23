<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package base
 */

$container = get_theme_mod( 'base_container_type' );
?>

<!DOCTYPE html>
  <html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,700" rel="stylesheet">
    
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  
    <div class="container-fluid linearBg1">
      
      <div id="top-bar" class="container">
        
      <div id="social-menu">
        <!-- The WordPress Menu goes here -->
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'social',
            'container'       => '',
            'container_id'    => '',
            'container_class' => '',
            'menu_id'         => '',
            'menu_class'      => 'nav',
            'fallback_cb'     => '',
            'walker'          => new WP_Bootstrap_Navwalker(),
          )
        ); ?>
      </div>
        
      </div>
    </div>
    <!-- Navigation -->
    <header id="masthead">
      
      <div class="container">
        
        <a class="skip-link screen-reader-text sr-only" href="#content">
          <?php esc_html_e( 'Skip to content',	'base' ); ?>
        </a>

        <!-- The WordPress Menu goes here -->
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'container'       => 'nav',
            'container_id'    => 'main-menu',
            'container_class' => '',
            'menu_id'         => '',
            'menu_class'      => 'right-nav',
            'fallback_cb'     => '',
            'walker'          => new WP_Bootstrap_Navwalker(),
          )
        ); ?>
        
        <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
          echo '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';
          echo '<img id="header-logo" src="'. esc_url( $logo[0] ) .'">';
          echo '<h1  class="brand">'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
          echo '</a>';
  } else {
          echo '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';  
          echo '<h1  class="brand">'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
          echo '</a>';
        } ?>
        
      </div>
        
    </header>