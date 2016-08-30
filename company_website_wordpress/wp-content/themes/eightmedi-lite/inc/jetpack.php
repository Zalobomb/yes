<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package 8Medi Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function eightmedi_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'eightmedi_lite_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function eightmedi_lite_jetpack_setup
add_action( 'after_setup_theme', 'eightmedi_lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function eightmedi_lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function eightmedi_lite_infinite_scroll_render
