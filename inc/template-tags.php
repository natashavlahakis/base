<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package base
 */

if ( ! function_exists( 'base_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function base_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'base' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<p class="posted-on">' . $posted_on . '</p>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'base_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function base_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'base' ) );
		if ( $categories_list && base_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'base' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'base' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'base' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'base' ), esc_html__( '1 Comment', 'base' ), esc_html__( '% Comments', 'base' ) );
		echo '</span>';
	}
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'base' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'base_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function base_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'base_author_avatar_size', 140 );
		printf( '%1$s <p class="byline"><a href="%2$s">%3$s</a></p>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<p class="entry-format">%1$s<a href="%2$s">%3$s</a></p>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'base' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}
	if ( 'post' === get_post_type() ) {
		base_entry_taxonomies();
	}
	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<p class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'base' ), get_the_title() ) );
		echo '</p>';
	}
}
endif;

if ( ! function_exists( 'base_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 */
function base_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'base' ) );
	if ( $categories_list && base_categorized_blog() ) {
		printf( '<p class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</p>',
			_x( 'Categories', 'Used before category names.', 'base' ),
			$categories_list
		);
	}
	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'base' ) );
	if ( $tags_list ) {
		printf( '<p class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</p>',
			_x( 'Tags', 'Used before tag names.', 'base' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'base_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function base_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular( 'post' ) ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail('large'); ?>
	</div><!-- .post-thumbnail -->

 <?php elseif ( is_singular( array( 'games', 'athletes' )) ) : ?>

 <div class="post-thumbnail">
		<?php the_post_thumbnail('profile'); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function base_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'base_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );
		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'base_categories', $all_the_cool_cats );
	}
	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so components_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so components_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in base_categorized_blog.
 */
function base_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'base_categories' );
}
add_action( 'edit_category', 'base_category_transient_flusher' );
add_action( 'save_post',     'base_category_transient_flusher' );

