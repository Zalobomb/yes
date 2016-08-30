<?php
/**
 * Header functions - text, image, search, contact
 *
 * @package Tora
 *
 */


/**
 * Header image
 */
function tora_has_header() {
	$front_header = get_theme_mod('front_header_type' ,'image');
	$site_header  = get_theme_mod('site_header_type', 'nothing');
	global $post;
	$single_toggle = get_post_meta( $post->ID, '_tora_header_key', true );

	if ( get_header_image() && ( ( $front_header == 'image' && is_front_page() ) || ( $site_header == 'image' && !is_front_page() ) ) ) 
		if (!$single_toggle)
		return 'has-header';
}

/**
 * Contact info
 */
function tora_contact_info() {
	$toggle_contact = get_theme_mod('toggle_contact', 0);
	$phone 	 		= get_theme_mod('contact_phone', __('111.222.333','tora'));
	$email 	 		= antispambot(get_theme_mod('contact_email', __('office@yoursite.com','tora')));
	$address 		= get_theme_mod('contact_address', __('New York City','tora'));
	$mobile_button  = get_theme_mod('mobile_button', __('Contact','tora'));

	if ($toggle_contact) {
		if (has_nav_menu( 'social' )) : ?>
		<div class="contact-area has-social">
		<?php else : ?>
		<div class="contact-area">
		<?php endif; ?>
			<div class="container clearfix">
				<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="contact-social clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
				</nav>
				<?php endif; ?>
				<div class="contact-info">
					<?php if ($phone) : ?>
					<div class="contact-block">
						<i class="tora-icon dslc-icon-ei-icon_phone"></i><?php echo esc_html($phone); ?>
					</div>
					<?php endif; ?>
					<?php if ($email) : ?>
					<div class="contact-block">
						<i class="tora-icon dslc-icon-ei-icon_mail_alt"></i><a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a>
					</div>
					<?php endif; ?>
					<?php if ($address) : ?>
					<div class="contact-block">
						<i class="tora-icon dslc-icon-ei-icon_pin_alt"></i><?php echo esc_html($address); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="contact-mobile">
				<i class="tora-icon dslc-icon-ei-arrow_triangle-down_alt2"></i><?php echo esc_html($mobile_button); ?>
			</div>
		</div>			
	<?php }
}
add_action('tora_header_bar', 'tora_contact_info', 8);

/**
 * Site branding and menu
 */
function tora_branding() {

	if ( get_theme_mod('site_logo') ) {
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>'; 
	} elseif ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
	} else {
		echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h1>';
		if ( get_bloginfo( 'description' ) ) {
			echo '<p class="site-description">' . esc_html(get_bloginfo( 'description' )) . '</p>';
		}
	}
}

function tora_menu_bar() {
	?>
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php tora_branding(); ?>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tora' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<nav class="mobile-nav"></nav>
		</div>
	</header><!-- #masthead -->
	<div class="header-clone"></div>
	<?php
}
add_action('tora_header_bar', 'tora_menu_bar', 9);

/**
 * Register Polylang strings
 */
if ( function_exists('pll_register_string') && !function_exists('tora_register_strings')) :
function tora_register_strings() {
	pll_register_string('Header text', get_theme_mod('header_text'), 'Tora');
	pll_register_string('Left button text', get_theme_mod('button_left'), 'Tora');
	pll_register_string('Right button text', get_theme_mod('button_right'), 'Tora');
}
add_action( 'admin_init', 'tora_register_strings' );
endif;

/**
 * Header image and text
 */
function tora_header_text() {

	if ( !function_exists('pll_register_string') ) {
		$header_text 		= get_theme_mod('header_text');
		$button_left		= get_theme_mod('button_left');
		$button_right 		= get_theme_mod('button_right');
	} else {
		$header_text 		= pll__(get_theme_mod('header_text'));
		$button_left		= pll__(get_theme_mod('button_left'));
		$button_right 		= pll__(get_theme_mod('button_right'));	
	}
	$button_left_url	= get_theme_mod('button_left_url');
	$button_right_url 	= get_theme_mod('button_right_url');

	echo '<div class="header-info">
			<div class="header-info-inner container">
				<h3 class="header-text">' . wp_kses_post($header_text) . '</h3>
				<div class="header-buttons">';
				if ($button_left_url) {
					echo '<a class="button header-button left-button" href="' . esc_url($button_left_url) . '">' . esc_html($button_left) . '</a>';
				}
				if ($button_right_url) {
					echo '<a class="button header-button right-button" href="' . esc_url($button_right_url) . '">' . esc_html($button_right) . '</a>';
				}
	echo 		'</div>';
	echo 	'</div>';
	echo '</div>';
}

function tora_header_area() {
	if ( tora_has_header() == 'has-header' ) : ?>
	<div class="header-image">
		<?php tora_header_text(); ?>
		<img class="large-header" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">		
		<?php $mobile = get_theme_mod('mobile_header'); ?>
		<?php if ( $mobile ) : ?>
		<img class="small-header" src="<?php echo esc_url($mobile); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
		<?php else : ?>
		<img class="small-header" src="<?php header_image(); ?>" width="1024" alt="<?php bloginfo('name'); ?>">
		<?php endif; ?>
	</div>
	<?php endif;
}
add_action('tora_header_image', 'tora_header_area', 9);

/**
 * Search
 */
function tora_header_search() {
	echo '<div class="header-search"><div class="search-close"><i class="tora-icon dslc-icon-ei-icon_close"></i></div><div class="header-search-inner">' . get_search_form(false) . '</div></div>';
}
add_action('tora_header_bar', 'tora_header_search', 10);

function tora_search_menu_item( $items, $args ) {
    if ($args->theme_location == 'primary') {
        $items .= '<li class="search-item"><i class="tora-icon dslc-icon-ei-icon_search"></i></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'tora_search_menu_item', 10, 2 );
