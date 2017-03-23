<?php
/**
 * The template for displaying all single posts.
 *
 * @package base
 */

get_header(); ?>

<div class="container-fluid linearBg1 py-2 mb-5">

  <div class="container">

    <div class="row">

      <div class="col-2 offset-1 pl-4">
      
        <h3>Athletes</h3>
      
      </div>

      <div class="col-4 px-0">
      
        <form class="form-inline">
          
          <label class="custom-control mb-2 mr-sm-2 mb-sm-0">
        
            <input class="form-control" type="search" value="Search" id="example-search-input">
          
          </label>

          <button type="submit" class="btn btn-primary mr-sm-4">Search</button>
        
        </form>
      
      </div>

      <div class="col-5 px-0">
        
        <form class="form-inline">
          
          <label class="mr-sm-2" for="inlineFormCustomSelect">Sport</label>
          
          <select class="custom-select mb-2 mr-sm-2 mb-sm-0">
  
            <option selected="">All</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>

          </select>

          
          
          <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>

          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
            <option selected="">All</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
          </select>

          <button type="submit" class="btn btn-primary">Filter</button>
          
        </form>
      </div>

    </div>

  </div>

</div>
<!-- filter-->

<div class="container">

  <?php while ( have_posts() ) : the_post(); ?>

  <div class="row">

    <?php base_post_thumbnail(); ?>

    <div class="col-8 mt-3 mb-5">

      <h1 class="text-uppercase mt-4 mb-3">Fast Facts</h1>

      <div class="row">

        <div class="col-6 ">

          <h3>Date of birth</h3>

          <p><?php echo get_post_meta($post->ID, 'date-of-birth', true); ?></p>

        </div>

        <div class="col-6">

          <h3>Age</h3>

          <p><?php echo get_post_meta($post->ID, 'age', true); ?></p>

        </div>

      </div>
      <!-- stats 1 -->

      <div class="row">

        <div class="col-6">

          <h3>Sports</h3>

          <p><?php echo get_post_meta($post->ID, 'sports', true); ?></p>

        </div>

        <div class="col-6">

          <h3>Games</h3>

          <p><?php echo get_post_meta($post->ID, 'games', true); ?></p>

        </div>

      </div>
      <!-- stats 2 -->

      <div class="row px-3">

        <h1 class="text-uppercase mt-4 mb-3">Biography</h1>

        <?php the_content(); ?>

      </div>
      <!-- desc -->

      <h1 class="text-uppercase mt-4 mb-3">Medal Record</h1>

      <div class="row py-4" style="border-top: 1px solid #000">

        <div class="col-8">

          <h2>Sport title</h2>

          <h3>Games title</h3>

        </div>

        <div class="col-4 text-right">

          <img src="//placehold.it/50x75" class="mr-sm-2">

          <img src="//placehold.it/50x75" class="mr-sm-2">

          <img src="//placehold.it/50x75">

        </div>

      </div>
      <!-- result 1 -->

      <div class="row py-4" style="border-top: 1px solid #000">

        <div class="col-8">

          <h2>Sport title</h2>

          <h3>Games title</h3>

        </div>

        <div class="col-4 text-right">

          <img src="//placehold.it/50x75" class="mr-sm-2">

          <img src="//placehold.it/50x75" class="mr-sm-2">

          <img src="//placehold.it/50x75">

        </div>

      </div>
      <!-- result 2 -->

      <h1 class="text-uppercase mt-4 mb-3">More Athletes</h1>

      <div class="row">

        <?php 

        $postid = get_the_ID();

        $args = array( 'post_type' => 'athletes', 'posts_per_page' => 3, 'post__not_in'=> array($postid) );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="col-4 mb-5">

          <a href="<?php the_permalink(); ?>" aria-hidden="true">
            
            <span class="more-thumbnail">

              <?php the_post_thumbnail( 'view-more', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>

            </span>

            <button class="btn btn-secondary active" style="position: relative; margin-top: -2rem; border: none;"><?php the_title(); ?></button>

          </a>

        </div>

        <?php endwhile; ?>

      </div>
      
      <div class="more-games buttonL white">

        <a href="<?php echo get_post_type_archive_link( 'athletes' ); ?>">More Athletes</a>
          
      </div>
      
    </div>
    <!-- content -->

    <div class="col-4 my-5">

      <h3>Sidebar</h3>

    </div>
    <!-- sidebar -->

  </div>

  <?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>