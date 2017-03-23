<div class="container-fluid">

  <div class="row">
    <?php 
    $args = array( 'post_type' => 'athletes', 'posts_per_page' => 1 );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <div class="parent col-md-3 px-0">

      <div class="child" style="background-image: url(<?php the_post_thumbnail_url( 'featured-games', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>)">

        <?php the_title( sprintf( '<span><h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></span>' ); ?>

      </div>

    </div>
    <!-- one -->

    <?php endwhile; ?>

    <div class="col-md-3 px-0">

      <?php 
      $args = array( 'post_type' => 'athletes', 'posts_per_page' => 2, 'offset' => 1 );

      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <div class="parent slim">

        <div class="child" style="background-image: url(<?php the_post_thumbnail_url( 'featured-games', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>)">

          <?php the_title( sprintf( '<span><h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></span>' ); ?>

        </div>

      </div><!-- two, three -->

      <?php endwhile; ?>

    </div>

    <div class="col-md-6">

      <div class="row">

        <?php 
        $args = array( 'post_type' => 'athletes', 'posts_per_page' => 2, 'offset' => 3 );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="parent slim col-md-6 px-0">

          <div class="child" style="background-image: url(<?php the_post_thumbnail_url( 'featured-games', array ( 'class' => 'img-fluid' ),  array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>)">

            <?php the_title( sprintf( '<span><h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4></span>' ); ?>

          </div>

</div><!-- five -->

        <?php endwhile; ?>

        <div class="more-athletes-section col-12 px-0">

          <div class="more-athletes-content">
            <!-- 380 x 240 -->

            <span><a class="btn btn-outline-secondary btn-lg" href="<?php echo get_post_type_archive_link( 'athletes' ); ?>" role="button">More Athletes</a></span>

          </div><!-- four -->

</div>

      </div>

    </div>

  </div><!-- /.row -->

</div><!-- /.container-fluid -->
<!-- /featured-athletes -->