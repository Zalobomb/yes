<?php
/**
 * Blog related functions - body and posts classes, excerpts, blog layout, archive labels
 *
 * @package Tora
 */


/**
 * Body classes
 */
function tora_body_classes( $classes ) {
	global $post;
	$front_header = get_theme_mod('front_header_type' ,'image');
	$site_header  = get_theme_mod('site_header_type', 'image');
	$sticky_menu = get_theme_mod('sticky_menu' ,'sticky');
	$single_toggle = get_post_meta( $post->ID, '_tora_header_key', true );

	if ( $sticky_menu == 'sticky' ) {
		$classes[] = 'tora-sticky-menu';
	} else {
		$classes[] = 'tora-no-sticky';
	}
	if ( tora_has_header() == 'has-header' ) {
		if (!$single_toggle) {
			$classes[] = 'tora-has-header';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'tora_body_classes' );

/**
 * Clearfix posts
 */
function tora_clearfix_posts( $classes ) {
	$classes[] = 'clearfix';
	return $classes;
}
add_filter( 'post_class', 'tora_clearfix_posts' );

/**
 * Excerpt length
 */
function tora_excerpt_length( $length ) {
  $excerpt = get_theme_mod('exc_length', '30');
  return $excerpt;
}
add_filter( 'excerpt_length', 'tora_excerpt_length', 999 );

/**
 * Excerpt read more
 */
function tora_custom_excerpt( $more ) {
	$more = get_theme_mod('custom_read_more');
	if ($more == '') {
		return '&nbsp;[&hellip;]';
	} else {
		return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . esc_html($more) . '</a>';
	}
}
add_filter( 'excerpt_more', 'tora_custom_excerpt' );

/**
 * Blog layout
 */
function tora_blog_layout() {
	$layout = get_theme_mod('blog_layout','list');
	return $layout;
}

/**
 * Remove archive labels
 */
function tora_archive_labels($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
    return $title;
}
add_filter( 'get_the_archive_title', 'tora_archive_labels');

/**
 * Full width single posts
 */
function tora_fullwidth_posts() {
	$fullwidth = get_theme_mod('fullwidth_single');
	if ( $fullwidth )
		return 'fullwidth';
}