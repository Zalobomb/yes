<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 8Medi Lite
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
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eightmedi-lite' ); ?></a>
		<?php if(get_theme_mod('eightmedi_lite_top_header_setting','1')==1): ?>
			<div class="top-header">
				<div class="ed-container-home">
					<div class="header-callto clear">
						<div class="callto-left">
							<?php echo wp_kses_post(get_theme_mod('eightmedi_lite_callto_text',''));?>
						</div>
						<div class="callto-right">
							<div class="cta">
								<?php echo wp_kses_post(get_theme_mod('eightmedi_lite_callto_text_right',''));?>
							</div>
							<?php if(get_theme_mod('eightmedi_lite_social_icons_in_header','1')==1){ ?>
								<div class="header-social social-links">
									<?php do_action('eightmedi_lite_social_links');?>
								</div>
								<?php }?>						

								<?php if(get_theme_mod('eightmedi_lite_hide_header_search')!='1'){
									?>
									<div class="header-search">
										<i class="fa fa-search"></i>
										<?php get_search_form();?>
									</div>
									<?php
								}?>						
							</div>
						</div>
					</div>
				</div>
			<?php endif;?>
			<header id="masthead" class="site-header" role="banner">
				<?php $logo_align = get_theme_mod('eightmedi_lite_logo_alignment_setting','1');
				if($logo_align == 0){ $logo_align_class='center-align'; }
				else{ $logo_align_class='left-align'; }
				?>
				<div class="ed-container-home <?php echo esc_attr($logo_align_class);?>">
					<div class="site-branding">
						<div class="site-logo">
							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								if ( has_custom_logo() ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php the_custom_logo(); ?>
									</a>
									<?php 
									endif;
								}
								?>
							</div>
							<div class="site-text">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
									<p class="site-description"><?php bloginfo( 'description' ); ?></p>
								</a>
							</div>
						</div><!-- .site-branding -->

						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<?php //esc_html_e( 'Primary Menu', 'eightmedi-lite' ); ?>
								<span class="menu-bar menubar-first"></span>
								<span class="menu-bar menubar-second"></span>
								<span class="menu-bar menubar-third"></span>
							</button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
				</header><!-- #masthead -->
				<?php 
				$no_margin = "";
				if(is_page_template( 'template-home.php' ) || is_page_template('template-boxedhome.php')){
					if(is_home() || is_front_page() || is_page_template('template-boxedhome.php')){
						$yes_slider = esc_attr(get_theme_mod('eightmedi_lite_display_slider','1'));
						if($yes_slider==1){
							$no_margin=' no-margin';
						}
					}
				}
				?>
				<div id="content" class="site-content<?php echo $no_margin;?>">
