<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package base
 */

get_header(); ?>

<div class="container mb-5">
  <div class="row">
    <main class="site-main col-lg-8" id="main">

      <?php if ( have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
      
      <?php while ( have_posts() ) : the_post(); ?>

          <?php
          /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
          get_template_part( 'template-parts/content', get_post_format() );
          ?>

      <?php endwhile; ?>
        
      <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

      <!-- The pagination component -->
      <?php //base_pagination(); ?>

    </main>
    <!-- #main -->

    <aside id="sidebar" class="col-lg-4">
      <?php get_sidebar( 'right' ); ?>
    </aside>

  </div>
</div>

<?php get_footer(); ?>