<?php
/**
 * FaceBlog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

if ( ! function_exists( 'faceblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function faceblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on FaceBlog, use a find and replace
	 * to change 'faceblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'faceblog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_image_size( 'faceblog-site-logo', 400, 175 );
	add_theme_support( 'custom-logo', array( 'size' => 'faceblog-site-logo' ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'faceblog-header-banner', 1920, 900, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'faceblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif;
add_action( 'after_setup_theme', 'faceblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function faceblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'faceblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'faceblog_content_width', 0 );

/**
 * Custom functions
 */
require get_template_directory() . '/inc/faceblog-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Faceblog widget areas
 */
require get_template_directory() . '/inc/faceblog-widgets.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Customizer panels
 */
require get_template_directory() . '/inc/admin/assets/panels/general-panel.php'; //general settings panel
require get_template_directory() . '/inc/admin/assets/panels/header-panel.php'; //header settings panel
require get_template_directory() . '/inc/admin/assets/panels/frontpage-panel.php'; //frontpage settings panel
require get_template_directory() . '/inc/admin/assets/panels/design-panel.php'; //design settings panel
require get_template_directory() . '/inc/admin/assets/panels/footer-panel.php'; //footer settings panel

/**
 * Load customizer custom class
 */
require get_template_directory() . '/inc/admin/assets/faceblog-customize-controls.php'; //customizer custom class

/**
 * Load Faceblog Sanitize function
 */
require get_template_directory() . '/inc/admin/assets/faceblog-sanitize.php'; // sanitize file

/**
 * Load Faceblog metaboxes
 */
require get_template_directory() . '/inc/admin/assets/metaboxes/faceblog-page-sidebar.php';