<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

if ( ! function_exists( 'faceblog_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function faceblog_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'faceblog' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'faceblog' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	//echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'faceblog' ), esc_html__( 'Comment (1)', 'faceblog' ), esc_html__( 'Comments (%)', 'faceblog' ) );
		echo '</span>';
	}

}
endif;

if( ! function_exists( 'faceblog_posted_date' ) ):
/**
 * Prints HTML with the posted date based on homepage design
 */
	function faceblog_posted_date() {
		$date_value = get_the_date( 'd' );
		$month_value = get_the_date( 'M' );
?>
		<div class="homepage-posted">
			<span class="post-month"><?php echo esc_attr( $month_value ); ?></span>
			<span class="post-date"><?php echo esc_attr( $date_value ); ?></span>
		</div>
<?php
	}
endif;

if ( ! function_exists( 'faceblog_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function faceblog_entry_footer() {
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'faceblog' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function faceblog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'faceblog_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'faceblog_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so faceblog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so faceblog_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in faceblog_categorized_blog.
 */
function faceblog_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'faceblog_categories' );
}
add_action( 'edit_category', 'faceblog_category_transient_flusher' );
add_action( 'save_post',     'faceblog_category_transient_flusher' );
