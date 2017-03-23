<?php
/**
 * Single post partial template.
 *
 * @package base
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  
  <div class="background single"></div>
  
  <div class="">
    <header class="entry-header pt-5">

      <?php the_title( '<h1 class="entry-title display-1"><span class="text-highlight">', '</span></h1>' ); ?>

      <div class="entry-meta">
        <?php base_posted_on(); ?>
      </div><!-- .entry-meta -->

      <span class="entry-share float-right">
        <a href="#" class="card-link"><i class="fa fa-facebook-official fa-2x"aria-hidden="true"></i></a>
        <a href="#" class="card-link"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
        <a href="#" class="card-link"><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
        <a href="#" class="card-link"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></a>
      </span>

    </header><!-- .entry-header -->
    
  </div>

  <div class="wrapper my-5">

    <div class="entry-excerpt">
      <?php the_excerpt(); ?>
    </div><!-- .entry-excerpt -->

    <div class="row">

      <?php base_post_thumbnail(); ?>

      <div class="entry-content">
        <?php the_content(); ?>

        <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'base' ),
          'after'  => '</div>',
        ) );
        ?>
      </div><!-- .entry-content -->

      <footer class="entry-footer">

        <?php base_entry_meta(); ?>

      </footer><!-- .entry-footer -->

    </div>

  </div><!-- .wrapper -->

</article><!-- #post-## -->
