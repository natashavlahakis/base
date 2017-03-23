<div id="featured-games-wrapper" class="bg-warning py-5">

  <div class="container">
    
    <h1 class="featured-heading text-gradient red">Featured Games</h1>
    
    <div class="row">
      
      <?php 
        $args = array( 'post_type' => 'games', 'posts_per_page' => 1 );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
      
      <div class="col-md-4 push-md-8">
        
        <?php the_title( sprintf( '<h2 class="entry-title display-1 mt-0 mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <p class="hidden-md-down"><?php the_excerpt(); ?></p>
        
        <div class="buttonL red">

          <a href="<?php echo get_post_type_archive_link( 'games' ); ?>">More Games</a>

        </div>

      </div>
      
      <div class="col-md-8 pull-md-4">
        
        <?php the_post_thumbnail( 'featured-games', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
      
      </div>  
          
    <?php endwhile; ?>
    
    </div>
  
  </div>

</div>
<!-- /featured-games -->