<?php
/**
 * The template for displaying all single posts.
 *
 * @package base
 */

get_header(); ?>

  <div class="container mt-5">

    <div class="upcoming-games">

      <h1>Upcoming Games</h1>

      <ul class="game-details">
        <li>
          <h4>Year</h4></li>
        <li>
          <h4>Games</h4></li>
        <li>
          <h4>Host Nation</h4></li>
        <li>
          <h4>Athletes</h4></li>
        <li>
          <h4>Sports</h4></li>
        <li>
          <h4>Events</h4></li>
      </ul>

      <hr>

      <?php
        $current_year = get_the_date('Y');
        
        // args
        $args = array(
          'numberposts'	=> -1,
          'post_type'		=> 'games',
          'orderby'			=> 'meta_value',
	         'order'				=> 'DESC',
          'meta_query'	=> array(
            'relation'		=> 'AND',
            array(
            'key'		=> 'year',
            'value'		=> $current_year,
            'type'		=> 'NUMERIC',
            'compare'	=> '>',
            )
          )
        );

        $loop = new WP_Query( $args );

          while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <ul class="game-details">
          <li>
            <?php echo get_post_meta($post->ID, 'year', true); ?>
          </li>
          <?php the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
            <li>
              <?php echo get_post_meta($post->ID, 'host-nation', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'athletes', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'sports', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'events', true); ?>
            </li>
        </ul>

        <hr>

        <?php endwhile; ?>


    </div>

    <div class="past-games">

      <h1>Past Games</h1>

      <ul class="game-details">
        <li>
          <h4>Year</h4></li>
        <li>
          <h4>Games</h4></li>
        <li>
          <h4>Host Nation</h4></li>
        <li>
          <h4>Athletes</h4></li>
        <li>
          <h4>Sports</h4></li>
        <li>
          <h4>Events</h4></li>
      </ul>

      <hr>

      <?php
        $current_year = get_the_date('Y');
        
        // args
        $args = array(
          'numberposts'	=> -1,
          'post_type'		=> 'games',
          'orderby'			=> 'meta_value',
	         'order'				=> 'DESC',
          'meta_query'	=> array(
            'relation'		=> 'AND',
            array(
            'key'		=> 'year',
            'value'		=> $current_year,
            'type'		=> 'NUMERIC',
            'compare'	=> '<'
            )
          )
        );

        $loop = new WP_Query( $args );

          while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <ul class="game-details">
          <li>
            <?php echo get_post_meta($post->ID, 'year', true); ?>
          </li>
          <?php the_title( sprintf( '<li><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' ); ?>
            <li>
              <?php echo get_post_meta($post->ID, 'host-nation', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'athletes', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'sports', true); ?>
            </li>
            <li>
              <?php echo get_post_meta($post->ID, 'events', true); ?>
            </li>
        </ul>

        <hr>

        <?php endwhile; ?>

    </div>

  </div>

  <?php get_footer(); ?>