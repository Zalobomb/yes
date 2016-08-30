<?php
/**
 * Tora functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tora
 */

if ( ! function_exists( 'tora_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tora_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tora, use a find and replace
	 * to change 'tora' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tora', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('tora-large-thumb', 680);
	add_image_size('tora-small-thumb', 540);	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'tora' ),
		'social'  => esc_html__( 'Social Menu' , 'tora' ),
		'footer'  => esc_html__( 'Footer Menu', 'tora' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tora_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
	) );

}
endif; // tora_setup
add_action( 'after_setup_theme', 'tora_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tora_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tora_content_width', 1170 );
}
add_action( 'after_setup_theme', 'tora_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tora_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tora' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'tora' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

	//Custom widgets
	register_widget( 'Tora_Video_Widget' );
	register_widget( 'Tora_Contact_Info' );
	register_widget( 'Tora_Social_Profile' );
	register_widget( 'Tora_Recent_Posts' );

}
add_action( 'widgets_init', 'tora_widgets_init' );

/**
 * Custom widgets
 */
require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/contact-widget.php";
require get_template_directory() . "/widgets/social-widget.php";
require get_template_directory() . "/widgets/posts-widget.php";

/**
 * Enqueue scripts and styles.
 */
function tora_scripts() {
	
	wp_enqueue_style( 'tora-style', get_stylesheet_uri() );

	$body_font 		= get_theme_mod('body_fonts', '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic');
	$headings_font 	= get_theme_mod('headings_fonts', '//fonts.googleapis.com/css?family=Raleway:400,600');

	wp_enqueue_style( 'tora-body-fonts', esc_url($body_font) ); 
	
	wp_enqueue_style( 'tora-headings-fonts', esc_url($headings_font) ); 

	wp_enqueue_style( 'tora-elegant-icons', get_template_directory_uri() . '/fonts/style.css' );		

	wp_enqueue_script( 'tora-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'tora-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true );

	wp_enqueue_script( 'tora-main', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true );

	if ( tora_blog_layout() == 'masonry-layout' && (is_home() || is_archive()) ) {
		wp_enqueue_script( 'tora-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('masonry'), '', true );		
	}

	wp_enqueue_script( 'tora-html5shiv', get_template_directory_uri() . '/js/html5.js', array(), '', true );
    wp_script_add_data( 'tora-html5shiv', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'tora_scripts' );

/**
 * Enqueue Bootstrap
 */
function tora_enqueue_bootstrap() {
	wp_enqueue_style( 'tora-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'tora_enqueue_bootstrap', 9 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions
 */
require get_template_directory() . '/inc/functions/functions-lc.php';
require get_template_directory() . '/inc/functions/functions-blog.php';
require get_template_directory() . '/inc/functions/functions-footer.php';
require get_template_directory() . '/inc/functions/functions-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Live Composer modules
 */
require get_template_directory() . '/modules/defaults.php';
require get_template_directory() . '/modules/module-section-title.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Header toggle
 */
require get_template_directory() . '/inc/metabox.php';

/**
 *TGM Plugin activation.
 */
require get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'tora_recommend_plugin' );
function tora_recommend_plugin() {
 
    $plugins = array(
        array(
            'name'               => 'Live Composer Page Builder',
            'slug'               => 'live-composer-page-builder',
            'required'           => false,
        ),       
    );
 
    tgmpa( $plugins);
 
}