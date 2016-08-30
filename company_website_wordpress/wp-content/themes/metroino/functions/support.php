<?php

/***** Theme Info Page *****/



if (!function_exists('metroino_add_theme_info_page')) {
    function metroino_add_theme_info_page() {
        add_theme_page(__('Welcome to metroino', 'metroino'), __('Theme support', 'metroino'), 'edit_theme_options', 'theme77support', 'metroino_display_theme_info_page');
    }
}
add_action('admin_menu', 'metroino_add_theme_info_page');

if (!function_exists('metroino_display_theme_info_page')) {
    function metroino_display_theme_info_page() {
		$metroino_pro_link = "http://theme77.com/metroino-demo/";
        $theme_data = wp_get_theme(); ?>
        <div class="theme-info-wrap">
            <h1><?php printf(__('Welcome to %1s %2s', 'metroino'), esc_attr ( $theme_data->Name ), esc_attr ( $theme_data->Version ) ); ?></h1>
            <div class="theme-description"><?php echo esc_attr ( $theme_data->Description ); ?></div>
            <hr>
			<div class="theme-links clearfix">
				<p>
					<a href="<?php echo get_template_directory_uri(); ?>/documentation/index.html" target="_blank" class="button button-primary"><?php _e('Documentation', 'metroino'); ?></a>
					<a href="<?php echo admin_url('customize.php?return=themes.php?page=theme77support'); ?>" class="button button-primary"><?php _e('Theme Customizer', 'metroino'); ?></a>
					<a href="https://wordpress.org/support/view/theme-reviews/metroino?filter=5" target="_blank" class="button button-primary"><?php _e('Rate this theme', 'metroino'); ?></a>
				</p>
			</div>
			<hr>
            <div id="getting-started">
                <div class="row clearfix">
                    <div class="col col-1">
                        <div class="section">
						<h3><?php echo _e('How To Setup HomePage', 'metroino'); ?></h3>
                            <p class="about"><?php _e('To see Metroino Tiled Homepage you should setup a static front page. Go to Setting -> Reading -> "Front page displays" then click "A static page" and select a page as Front page and click save changes.', 'metroino'); ?></p>
						<h3><?php echo _e('Upgrade to Metroino Pro', 'metroino'); ?></h3>
                            <p class="about"><?php _e('Need more features and options? Check out the Premium Version of this theme which comes with additional features and advanced Customize Options for your website.', 'metroino'); ?></p>
                            <p>
                                <a href="<?php echo $metroino_pro_link ?>" target="_blank" class="button button-primary"><?php _e('Metroino Pro Demo', 'metroino'); ?></a>
                            </p>
							<a href="<?php echo $metroino_pro_link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/metroino-pro.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php
	}
}
?>