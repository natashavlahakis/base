<?php
/**
 * The template for displaying all single posts.
 *
 * @package base
 */

get_header(); ?>

  <div class="container mt-5">

    <div class="past-games">

      <h1>Athletes List</h1>

      <ul class="athlete-details">
        <li>
          <h4>Athletes</h4></li>
        <li>
          <h4>Sports</h4></li>
        <li>
          <h4>Games</h4></li>
        <li>
          <h4>Medals</h4></li>
      </ul>

      <hr>

      <?php
        
        // args
        $args = array(
          'numberposts'	=> -1,
          'post_type'		=> 'athletes',
          'orderby'			=> 'meta_value',
	         'order'				=> 'DESC',
        );

        $loop = new WP_Query( $args );

          while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <ul class="athlete-details">
          <?php the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
            <li>
              <?php echo get_post_meta($post->ID, 'sports', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'games', true); ?>
            </li>
            <li>
              Medals...
            </li>
            <li>
              <?php the_post_thumbnail( 'athlete-archive', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </li>
        </ul>

        <hr>

        <?php endwhile; ?>

    </div>

  </div>

  <?php get_footer(); ?>