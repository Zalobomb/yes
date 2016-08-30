<?php
/**
 * Footer credits and menu
 *
 * @package Tora
 */


/**
 * Footer menu
 */
function tora_footer_menu() {
	?>
		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1 ) ); ?>
		</nav>
	<?php
}
add_action('tora_footer', 'tora_footer_menu', 7);

/**
 * Go to top button
 */
function tora_go_to_top() {
	echo '<a class="go-top"><i class="tora-icon dslc-icon-ei-arrow_triangle-up"></i></a>';
}
add_action('tora_footer', 'tora_go_to_top', 8);

/**
 * Footer credits
 */
function tora_footer_credits() {
	?>
		<div class="site-info">
			<?php printf( esc_html__( '© 2016 The Rolling Wave' ));?>
		</div>
	<?php
}
add_action('tora_footer', 'tora_footer_credits', 9);