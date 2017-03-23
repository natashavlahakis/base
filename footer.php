<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package base
 */
?>

  <div id="wrapper-footer">
    <div class="wrapper">
      <footer id="site-footer" class="row">
        <div id="footer-logo">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?>
        </div>
        <div id="footer-menu" class="col-sm-10 col-md-8">
        <!-- The WordPress Menu goes here -->
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'footer-1',
            'container'       => '',
            'container_id'    => '',
            'container_class' => '',
            'menu_id'         => '',
            'menu_class'      => 'nav',
            'fallback_cb'     => '',
            'walker'          => new WP_Bootstrap_Navwalker(),
          )
        ); ?>
        
        <!-- The WordPress Menu goes here -->
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'footer-2',
            'container'       => '',
            'container_id'    => '',
            'container_class' => '',
            'menu_id'         => '',
            'menu_class'      => 'nav',
            'fallback_cb'     => '',
            'walker'          => new WP_Bootstrap_Navwalker(),
          )
        ); ?>
        <p class="ml-3 mt-3">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
        </div>
      </footer>
    </div>
  </div>

<?php wp_footer(); ?>

</body>

</html>
