<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package base
 */

?>

<article <?php post_class('row my-4'); ?> id="post-<?php the_ID(); ?>">

  <div class="col-sm-8">
    <header class="entry-header ">

      <?php the_title( sprintf( '<h2 class="entry-title mt-0 mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

      <?php if ( 'post' == get_post_type() ) : ?>

      <div class="entry-meta">
        <?php base_posted_on(); ?>
      </div><!-- .entry-meta -->

      <?php endif; ?>

    </header><!-- .entry-header -->	

    <div class="entry-content">

      <?php the_excerpt(); ?>

      <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'base' ),
        'after'  => '</div>',
      ) );
      ?>

    </div><!-- .entry-content -->

  </div>

  <div class=" col-sm-4">
    
    <?php base_post_thumbnail(); ?>
  
  </div>

</article><!-- #post-## -->