<?php

/* ------------------------ initial setup ----------------------- */

function metroino_setup() {

    add_theme_support( 'automatic-feed-links' );

	add_theme_support('post-thumbnails');
	add_image_size('metroino-blogpost', 720, 400, false);

    load_theme_textdomain('metroino', get_template_directory() . '/languages');

    register_nav_menus( array(
            'homepage_menu' => __('Tiled Homepage Menu', 'metroino'),
            'blog_menu' => __('Blog Menu', 'metroino'),
        )
    );

	add_theme_support( 'custom-logo', array(
	   'height'      => 150,
	   'width'       => 300,
	   'flex-width' => true,
	) );
	
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
    add_theme_support( 'title-tag' );

}
add_action('after_setup_theme', 'metroino_setup');

function metroino_widgets_init() {

	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'metroino'),
		'id'            => 'blog_sidebar',
		'before_widget' => '<aside class="col-sm-6 col-md-12 col-lg-12 widget %1$s %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
	
}
add_action('widgets_init', 'metroino_widgets_init');

// content width
if ( ! isset( $content_width ) ) {
    $content_width = 870;
}

/* Display a notice that can be dismissed */

add_action('admin_notices', 'metroino_admin_notice');

function metroino_admin_notice() {
	global $current_user ;
    $metroino_user_id = $current_user->ID;
	if ( current_user_can('edit_theme_options') ) {
		/* Check that the user hasn't already clicked to ignore the message */
		if ( ! get_user_meta($metroino_user_id, 'metroino_ignore_notice') ) {
			echo '<div class="updated"><p>'; 
			printf(__('To see Metroino Tiled Homepage you should setup a static front page. Go to Setting -> Reading -> 
		"Front page displays" then click "A static page" and select a page as Front page and click save changes.  | <a href="%1$s">Hide Notice</a>'), '?metroino_nag_ignore=0');
			echo '</p></div>';
		}
	}
}

add_action('admin_init', 'metroino_nag_ignore');

function metroino_nag_ignore() {
	global $current_user;
    $metroino_user_id = $current_user->ID;
	if ( current_user_can('edit_theme_options') ) {
		/* If user clicks to ignore the notice, add that to their user meta */
		if ( isset($_GET['metroino_nag_ignore']) && '0' == $_GET['metroino_nag_ignore'] ) {
			add_user_meta($metroino_user_id, 'metroino_ignore_notice', 'true', true);
		}
	}
}
