<?php

// The Query
$query = new WP_Query( array( 'tag' => 'featured', 'posts_per_page' => 1 ) );

// The Loop
while ( $query->have_posts() ) {
  $query->the_post(); {
?>

  <div class="featured-article-wrapper">
    
    <div class="featured-article">
      
      <div class="featured-article-content">
        
        <button class="btn btn-success btn-sm mb-3">Featured</button>
        
        <?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
      '</a></h1>' ); ?>
          
        <a class="btn btn-outline-success btn-lg" href="<?php echo esc_url( get_permalink() ); ?>" role="button">Read more</a>
      
      </div>
      
      <div class="featured-article-image">
        
        <?php the_post_thumbnail( 'featured-article', array ( 'class' => 'img-fluid' ) ); ?>
      
      </div>
      
      <div class="featured-article-bg"></div>
      <!-- Background -->
    
    </div>
  
  </div>

  <?php 
}
/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
  wp_reset_postdata();
} ?>