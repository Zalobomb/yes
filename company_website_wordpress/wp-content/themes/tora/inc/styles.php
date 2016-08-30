<?php
/**
 * @package Tora
 */

//Converts hex colors to rgba for the menu background color
function tora_hex2rgba($color, $opacity = false) {

        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map('hexdec', $hex);
        $opacity = 0.9;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        return $output;
}


//Dynamic styles
function tora_custom_styles($custom) {

	$custom = '';

	//Logo
	$logo_height = get_theme_mod('logo_height','60');
	$custom .= ".site-logo { max-height:" . intval($logo_height) . "px;}"."\n";

	//Contact
	$contact_mobile = get_theme_mod('contact_mobile');
	if ($contact_mobile != 1) {
		$custom .= "@media only screen and (max-width: 1024px) { .contact-area { display:none;}}"."\n";	
	}

	//Menu
	$menu_style = get_theme_mod('menu_style','inline');
	if ($menu_style == 'centered') {
		$custom .= ".site-header .container { display: block;}"."\n";
		$custom .= ".site-branding { width: 100%; text-align: center;margin-bottom:15px;}"."\n";
		$custom .= ".main-navigation { width: 100%;float: none;}"."\n";
		$custom .= ".main-navigation ul { float: none;text-align:center;}"."\n";
		$custom .= ".main-navigation li { float: none; display: inline-block;}"."\n";
		$custom .= ".main-navigation ul ul li { display: block; text-align: left;}"."\n";
	}

	//Sidebar
	$sidebar_position = get_theme_mod('sidebar_position', 'right');
	if ($sidebar_position == 'left') {
		$custom .= "@media only screen and (min-width: 991px) { .content-area { float:right;}"."\n".".widget-area { float:left;}}"."\n";
	}

	//Fonts
	$body_fonts 	= get_theme_mod('body_font_family', 'font-family: \'Lato\', sans-serif;');
	$headings_fonts = get_theme_mod('headings_font_family', 'font-family: \'Raleway\', sans-serif;');
	$custom 		.= "body {" . wp_kses_post($body_fonts) . "}"."\n";
	$custom 		.= "h1, h2, h3, h4, h5, h6 {" . wp_kses_post($headings_fonts) . "}"."\n";

	//Font sizes
	$h1_size = get_theme_mod( 'h1_size', '36' );
	$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
    $h2_size = get_theme_mod( 'h2_size', '30' );
    $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    $h3_size = get_theme_mod( 'h3_size', '24' );
    $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    $h4_size = get_theme_mod( 'h4_size', '18' );
    $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    $h5_size = get_theme_mod( 'h5_size', '14' );
    $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    $h6_size = get_theme_mod( 'h6_size', '12' );
    $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    $body_size = get_theme_mod( 'body_size', '14' );
    $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    $menu_size = get_theme_mod( 'menu_size', '14' );
    $custom .= ".main-navigation li { font-size:" . intval($menu_size) . "px; }"."\n";


    //Colors

	$primary_color = get_theme_mod( 'color_primary', '#ED5A5A' );
	if ( $primary_color != '#ED5A5A' ) {
		$custom .= "#main #dslc-content .dslc-staff-member .dslc-staff-member-social a:hover,.footer-widgets .widget a:hover,.site-footer a:hover,.contact-info .tora-icon,.contact-social a:hover,.entry-meta .tora-icon,.entry-footer .tora-icon,.single-meta .tora-icon,.entry-title a:hover,.slicknav_nav a:hover,.main-navigation a:hover,a,a:hover,a:focus { color:" . esc_attr($primary_color) . ";}"."\n";
		$custom .= ".go-top,button,.button:not(.header-button),input[type=\"button\"],input[type=\"reset\"],input[type=\"submit\"],button:hover,.button:not(.header-button):hover,input[type=\"button\"]:hover,input[type=\"reset\"]:hover,input[type=\"submit\"]:hover,.mobile-nav .search-item,.search-item .tora-icon,.widget-area .tora_social_widget li a,.contact-data .tora-icon { background-color:" . esc_attr($primary_color) . ";}"."\n";
		$custom .= ".preloader-inner { border-bottom-color:" . esc_attr($primary_color) . ";}"."\n";
		$custom .= ".preloader-inner { border-right-color:" . esc_attr($primary_color) . ";}"."\n";
	}
	$color_site_title = get_theme_mod( 'color_site_title', '#3E4C53' );
	$custom .= ".site-title a { color:" . esc_attr($color_site_title) . ";}"."\n";	
	$color_site_description = get_theme_mod( 'color_site_description', '#1C1E21' );
	$custom .= ".site-description { color:" . esc_attr($color_site_description) . ";}"."\n";
	$background_contact = get_theme_mod( 'background_contact', '#22394C' );
	$custom .= ".contact-area { background-color:" . esc_attr($background_contact) . ";}"."\n";
	$color_contact = get_theme_mod( 'color_contact', '#7496AB' );
	$custom .= ".contact-area, .contact-area a { color:" . esc_attr($color_contact) . ";}"."\n";
	$background_header = get_theme_mod( 'background_header', '#fff' );
	$custom .= ".site-header { background-color:" . esc_attr($background_header) . ";}"."\n";
	$color_nav = get_theme_mod( 'color_nav', '#3E4C53' );
	$custom .= ".main-navigation a { color:" . esc_attr($color_nav) . ";}"."\n";
	$color_header_text = get_theme_mod( 'color_header_text', '#fff' );
	$custom .= ".header-text { color:" . esc_attr($color_header_text) . ";}"."\n";
	$color_left_btn = get_theme_mod( 'color_left_btn', '#fff' );
	$custom .= ".left-button { color:" . esc_attr($color_left_btn) . ";}"."\n";
	$custom .= ".left-button { border-color:" . esc_attr($color_left_btn) . ";}"."\n";
    $custom .= ".left-button:hover { background-color:" . esc_attr($color_left_btn) . ";}"."\n";
	$color_right_btn = get_theme_mod( 'color_right_btn', '#22394C' );
	$custom .= ".right-button:hover { color:" . esc_attr($color_right_btn) . ";}"."\n";
	$custom .= ".right-button { border-color:" . esc_attr($color_right_btn) . ";}"."\n";
    $custom .= ".right-button { background-color:" . esc_attr($color_right_btn) . ";}"."\n";
	$background_footer = get_theme_mod( 'background_footer', '#22394C' );
	$custom .= ".footer-widgets, .site-footer { background-color:" . esc_attr($background_footer) . ";}"."\n";
	$color_footer = get_theme_mod( 'color_footer', '#7496AB' );
	$custom .= ".site-footer, .site-footer a, .footer-widgets .widget, .footer-widgets .widget a { color:" . esc_attr($color_footer) . ";}"."\n";
	
	//Output all the styles
	wp_add_inline_style( 'tora-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'tora_custom_styles' );