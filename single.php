<?php
/**
 * The template for displaying all single posts.
 *
 * @package base
 */

get_header(); ?>

<div id="primary" class="content-area" tabindex="-1">

  <main id="main" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'single' ); ?>
    
    <?php base_post_nav(); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
    comments_template();
    endif;
    ?>

    <?php endwhile; // end of the loop. ?>

  </main><!-- #main -->

</div><!-- Container end -->

<?php get_footer(); ?>
