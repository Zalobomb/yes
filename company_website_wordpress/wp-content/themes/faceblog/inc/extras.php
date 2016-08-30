<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

/*---------------------------------------------------------------------------*/
/**
 * Add action on wp_head
 */
add_action( 'wp_head', 'faceblog_wp_head' );

if( !function_exists( 'faceblog_wp_head' ) ):

	function faceblog_wp_head() {
		$theme_color = get_theme_mod( 'faceblog_theme_color', '#02D090' );
	?>
		<style type="text/css" media="screen">
			.site-header, .slide-toggle, .forkit .tag, .single-post-image .homepage-posted, .navigation .nav-links a:hover, button, .widget .widget-title::after, .widget_search .search-submit, .navigation .nav-links a,.header-banner-wrapper .cat-links a,.forkit-widget-wrapper .wpcf7 input[type="submit"],.close-menu,.sub-menu-toggle,#site-navigation ul > li:hover > .sub-menu-toggle, #site-navigation ul > li.current-menu-item .sub-menu-toggle, #site-navigation ul > li.current-menu-ancestor .sub-menu-toggle,.looks-text,.reply .comment-reply-link{
				background:<?php echo esc_attr( $theme_color );?>;
			}
			.slide-toggle:hover, .bttn:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, .post-btn:hover,.close-menu:hover, .forkit-curtain .close-button {
				background:<?php echo esc_attr( faceblog_color_brightness( $theme_color, '-0.9' ) );?>;
			}
			.widget_search .search-submit,.number-404,.search #primary article,.comment-list .comment-body {
				border-color:<?php echo esc_attr( $theme_color );?>;
			}
			.navigation .nav-links a, .bttn, button, input[type="button"], input[type="reset"], input[type="submit"] {
				border:1px solid <?php echo esc_attr( $theme_color );?>;
			}
			a, .about-content-wrapper .about-link::after, .post-meta-wrapper .faceblog-post-comments a:hover, .post-meta-wrapper .cat-links a:hover, .about-content-wrapper .about-link::before, .widget a:hover, .widget a:hover::before, .widget li:hover::before, .logged-in-as a, .widget_faceblog_latest_posts .latest-post-desc-wrapper .post-title a:hover, .footer-widgets-wrapper .widget_categories a:hover, .footer-widgets-wrapper .widget_recent_entries a:hover, .footer-widgets-wrapper .widget_meta a:hover, .footer-widgets-wrapper .widget_recent_comments li:hover, .footer-widgets-wrapper .widget_rss li:hover, .footer-widgets-wrapper .widget_pages li a:hover, .footer-widgets-wrapper .widget_nav_menu li a:hover, .footer-widgets-wrapper .widget_nav_menu li:hover, .site-info a:hover, .post-content-wrapper .entry-title a:hover,#site-navigation ul li:hover > a, #site-navigation ul li.current-menu-item > a,.not-found-text,.number-404,.search .entry-title a:hover,.header-banner-wrapper .post-info-wrapper .posted-on a:hover, .header-banner-wrapper .post-info-wrapper .comments-link a:hover, .header-banner-wrapper .post-info-wrapper .byline a:hover, .header-banner-wrapper .post-title a:hover {
				color: <?php echo esc_attr( $theme_color );?>;
			}
			a:hover, a:focus, a:active {
				color:<?php echo esc_attr( faceblog_color_brightness( $theme_color, '-0.9' ) );?>;
			}
		</style>
	<?php
		$flexible_custom_css = get_theme_mod( 'faceblog_custom_css', '' );
		if( !empty( $flexible_custom_css ) ) {
	?>
		<style type="text/css" media="screen">
			<?php echo ( $flexible_custom_css ); ?>
		</style>
	<?php
		}
	?>
	<?php
	    $menu_bg_image = get_theme_mod( 'menu_featured_image', '' );
	    if( !empty( $menu_bg_image ) ) {
	?>
	    <style type="text/css" media="screen">
	        .widget-profile-img {
	            background: url('<?php echo esc_url( $menu_bg_image );?>') no-repeat scroll center center ;
	        }
	    </style>
	<?php
	    }
		if( 'page' == get_post_type() && ! is_front_page() ) {
			global $post;
			$post_id = $post->ID;
			$image_id = get_post_thumbnail_id( $post_id );
			$image_path = wp_get_attachment_image_src( $image_id, 'faceblog-header-banner', true );
			if( has_post_thumbnail( $post_id ) ) {
	?>
			<style type="text/css" media="screen">
				.page .header-inner-banner-wrapper {
					background: url( '<?php echo esc_url( $image_path[0] ); ?>' ) no-repeat fixed center top;
					min-height: 350px ;
				}
			</style>
	<?php
			}
		}
	}

endif;
/*------------------------------------------------------------------------------*/
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function faceblog_body_classes( $classes ) {
	global $post;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( $post ) { $sidebar_meta = get_post_meta( $post->ID, 'faceblog_page_sidebar', true ); }
    
	if( is_home() ) {
		$queried_id = get_option( 'page_for_posts' );
		$sidebar_meta = get_post_meta( $queried_id, 'faceblog_page_sidebar', true );
	}

	if( empty( $sidebar_meta ) || is_archive() || is_search() ) { $sidebar_meta = 'right_sidebar'; }
	$faceblog_archive_sidebar = get_theme_mod( 'archive_sidebar_option', 'right_sidebar' );

	if( is_page() || is_single() ) {
		if( $sidebar_meta == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
		elseif( $sidebar_meta == 'no_sidebarh' ) { $classes[] = 'no-sidebar'; }
		else { $classes[] = ''; }
	} else {
		if( $faceblog_archive_sidebar == 'left_sidebar' ) { $classes[] = 'left-sidebar'; }
		elseif( $faceblog_archive_sidebar == 'no_sidebar' ) { $classes[] = 'no-sidebar'; }
		else { $classes[] = ''; }
	}
    
    $header_banner_cat = get_theme_mod( 'header_banner_cat', '' );
    if( is_front_page() && empty( $header_banner_cat ) ) {
        $classes[] = 'innerpage-banner-disable';
    }
    
    $innerpage_check_option = get_theme_mod( 'innerpage_banner_option', '0' );
    if( ! is_front_page() && $innerpage_check_option == 1 ) {
        $classes[] = 'innerpage-banner-disable';
    }

	return $classes;
}
add_filter( 'body_class', 'faceblog_body_classes' );