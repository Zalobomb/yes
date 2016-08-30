<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tora
 */

if ( ! function_exists( 'tora_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tora_posted_on() {
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

	$posted_on = '<span class="tora-icon dslc-icon-ei-icon_clock_alt"></span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = sprintf(
		'<span class="tora-icon dslc-icon-ei-icon_profile"></span>' . esc_html_x( '%s', 'post author', 'tora' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

/**
 * Meta visibility check
 */
function tora_meta_check() {
	$hide_meta_index = get_theme_mod('hide_meta_index');
	$hide_meta_single = get_theme_mod('hide_meta_single');
	if ( ( !is_single() && !$hide_meta_index ) || ( is_single() && !$hide_meta_single) ) {
		return true;
	} else {
		return false;
	}
}

if ( ! function_exists( 'tora_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories and comments.
 */
function tora_entry_meta() {

	$hide_meta_index = get_theme_mod('hide_meta_index');
	if ( 'post' === get_post_type() && tora_meta_check() ) {
		tora_posted_on();

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'tora' ) );
		if ( $categories_list ) {
			echo '<span class="cat-links"><span class="tora-icon dslc-icon-ei-icon_archive_alt"></span>' . $categories_list . '</span>';
		}	
	}
}
endif;

if ( ! function_exists( 'tora_entry_tags' ) ) :
/**
 * Prints HTML with meta information for tags.
 */
function tora_entry_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'tora' ) );
		if ( $tags_list && tora_meta_check() ) {
			echo '<span class="tags-links"><span class="tora-icon dslc-icon-ei-icon_tags_alt"></span>' . $tags_list . '</span>';
		}		
	}
}
endif;


/**
 * Flush out the transients used in tora_categorized_blog.
 */
function tora_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tora_categories' );
}
add_action( 'edit_category', 'tora_category_transient_flusher' );
add_action( 'save_post',     'tora_category_transient_flusher' );