<?php
/* ------------------------------- enqueue scripts ---------------------------- */

function metroino_scripts() {

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, null);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, null);
  
	if ( is_front_page() or is_page_template('page-homepage.php') ) {
		wp_enqueue_style('metroino-transition', get_template_directory_uri() . '/css/transition.min.css', false, null);
	}

	wp_enqueue_style('metroino-style', get_template_directory_uri() . '/style.css', false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
	
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true);
    wp_enqueue_script('metroino-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), null, true);

}
add_action('wp_enqueue_scripts', 'metroino_scripts', 100);

function metroino_admin_scripts( $hook ) {
	
	if ( 'appearance_page_theme77support' == $hook ) {
		wp_enqueue_style( 'metroino-admin', get_template_directory_uri() . '/css/admin.css', false, null );
	}

}
add_action( 'admin_enqueue_scripts', 'metroino_admin_scripts' );


function metroino_custom_style() {
	
	$output = '';
	$output .= '<style>';
	$output .= '.navbar-default .navbar-nav li a, .navbar-default .navbar-brand { color: ' . esc_attr ( get_theme_mod('metroino_menu_color', '#FFFFFF') ) . ' }';
	$output .= '.navbar { background: ' . esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_menu_bg_color', '#00AB4D'), 0.4 ) ) . ' !important }';
	$output .= '</style>';
	echo $output;
	
}
add_action( 'wp_head', 'metroino_custom_style' );