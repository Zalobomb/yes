<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'faceblog' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php
            if( is_front_page() || is_home() ) {
                do_action( 'faceblog_front_header_banner' );
            } else {
                do_action( 'faceblog_inner_header_banner' );
            }
		?>
		<div class="mt-container">
			<div class="site-branding">
				<?php 
					if ( function_exists( 'the_custom_logo' ) ) { 
						the_custom_logo();
					} 
				?>
                <div class="site-title-desc-wrapper">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
                </div>
			</div><!-- .site-branding -->
		</div>
	</header><!-- #masthead -->
    
    <div id="sideslide-menu" class="side-menu clearfix">   
        <div class="slide-toggle"> <i class="fa fa-navicon"> </i> </div>
        <div class="menu-overlay"> </div>
        <div class="side-menu-wrapper clearfix">
            <aside class="widget widget-profile-image">
                <div class="image-text-wrapper">
                    <figure class="widget-profile-img"></figure>
                    <span class="widget-profile-image-overlay"></span>
                    <h2 class="widget-profile-title"><?php echo esc_attr( get_theme_mod( 'menu_featured_text', __( 'Welcome To Faceblog', 'faceblog' ) ) );?></h2>
                </div>
            </aside>
            <nav id="site-navigation" class="main-navigation" role="navigation">
    			<button class="menu-toggle hide" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'faceblog' ); ?></button>
                <div class="close-menu"><i class="fa fa-close"> </i></div>
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    		</nav><!-- #site-navigation -->
    		<section class="menu-sidebar">
	                <?php
	                    if ( is_active_sidebar( 'faceblog_sidebar_menu' ) ) {
	                    	dynamic_sidebar( 'faceblog_sidebar_menu' );
	                    }
	                ?>      
			</section>
      </div>
    </div>

	<div id="content" class="site-content">
		<div class="mt-container">
			<div class="content-wrapper clearfix">            
			<?php if( is_front_page() ) { ?>
				<section class="faceblog-home-section clearfix" id="faceblog-about-home">
	                <div class="mt-container">
	                    <div class="about-content-wrapper">
	        				<div class="about-content">
	        					<?php echo esc_html( get_theme_mod( 'faceblog_front_about_textarea', '' ) );?>
	        				</div>
	        				<?php
	        					$about_link_txt = get_theme_mod( 'front_about_link_text', '' );
	        					if( !empty( $about_link_txt ) ){
	        				?>
			        				<span class="about-link">
			        					<a href="<?php echo esc_url( get_theme_mod( 'front_about_url', '' ) ) ;?>">
			        						<?php echo esc_html( $about_link_txt ) ;?>
			        					</a>
			        				</span>
	        				<?php } ?>
	                    </div>
	                </div>
				</section>
			<?php } ?>
