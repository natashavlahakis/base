<?php
/**
 * Partial template for content in page.php
 *
 * @package base
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <div class="background page"></div>

  <header class="entry-header container pt-5 mb-5">

    <?php the_title( '<h1 class="entry-title card-title">', '</h1>' ); ?>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <div class="page-feature">

      <?php base_post_thumbnail(); ?>

    </div>

    <div style="page-copy">

      <?php the_content(); ?>

      <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'base' ),
        'after'  => '</div>',
      ) );
      ?>

    </div>

  </div><!-- .entry-content -->

  <footer class="entry-footer container">

    <?php edit_post_link( __( 'Edit', 'base' ), '<span class="edit-link">', '</span>' ); ?>

  </footer><!-- .entry-footer -->

</article><!-- #post-## -->