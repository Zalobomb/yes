<?php
/**
 * Metroino Theme Customizer
 *
 * @package metroino
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function metroino_customize_register( $wp_customize ) {
	
	
	$metroino_transitions = array(
				'pt-page-moveToRight$pt-page-moveFromLeft' 							=> __('Move To Right - Move From Left', 'metroino'),
				'pt-page-moveToBottom$pt-page-moveFromTop' 							=> __('Move To Bottom - Move From Top', 'metroino'),
				'pt-page-rotateFoldRight$pt-page-moveFromLeftFade' 					=> __('Rotate Fold Right - Move From Left', 'metroino'),
				'pt-page-rotateCubeLeftOut pt-page-ontop$pt-page-rotateCubeLeftIn'	=> __('Rotate Cube Left Out - Rotate Cube Left In', 'metroino'),
    );
	
	
    //  =============================================================
    //  = 					 Homepage Options						=
    //  =============================================================
	
	$wp_customize->add_panel( 'metroino_homepage_tiles_options', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Homepage Tiles Options', 'metroino' ),
	    'description' 		=> __( 'To Have All Metroino Theme Features Upgrade to metroino Pro: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro Demo</a>', 'metroino' ),
	) );

	
	// ---------------------- Tile Options 1 -------------------
	
	
    $wp_customize->add_section('metroino_options_1', array(
        'title'    			=> __('Tile Options 1', 'metroino'),
        'priority' 			=> 120,
		'panel'				=> 'metroino_homepage_tiles_options'
    ));

    $wp_customize->add_setting('metroino_enable_1', array(
		'default'			=> 1,
		'sanitize_callback' => 'sanitize_text_field',
        'capability' 		=> 'edit_theme_options',
        'type'       		=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_enable_1', array(
		'label'    			=> __('Enable This Tile', 'metroino'),
        'settings' 			=> 'metroino_enable_1',
        'section'  			=> 'metroino_options_1',
        'type'     			=> 'checkbox',
    ));

    $wp_customize->add_setting('metroino_name_1', array(
        'default'        	=> __('Portfolio', 'metroino'),
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type' 			 	=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_name_1', array(
        'label'      		=> __('Tile Name', 'metroino'),
        'section'    		=> 'metroino_options_1',
        'settings'   		=> 'metroino_name_1',
    ));

    $wp_customize->add_setting('metroino_icon_1', array(
        'default'           => get_template_directory_uri().'/images/tile/tile-portfolio.png',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_icon_1', array(
        'label'    			=> __('Tile Icon', 'metroino'),
        'section'  			=> 'metroino_options_1',
        'settings' 			=> 'metroino_icon_1',
    )));

    $wp_customize->add_setting('metroino_color_1', array(
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_color_1', array(
        'label'    			=> __('Tile Color', 'metroino'),
        'section'  			=> 'metroino_options_1',
        'settings' 			=> 'metroino_color_1',
    )));
	
    $wp_customize->add_setting('metroino_css_1', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		'default'        	=> 'background: linear-gradient(215deg, rgba(255,0,255,1) , rgba(0,255,255,1));',
        'capability'     	=> 'edit_theme_options',
        'type' 				=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_css_1', array(
        'label'     		=> __('Tile Custom CSS Style', 'metroino'),
        'section'    		=> 'metroino_options_1',
        'settings'   		=> 'metroino_css_1',
		'type'				=> 'textarea',
    ));

    $wp_customize->add_setting('metroino_page_1', array(
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
    ));

    $wp_customize->add_control('metroino_page_1', array(
        'label'      		=> __('Select Page', 'metroino'),
        'section'    		=> 'metroino_options_1',
        'type'    			=> 'dropdown-pages',
        'settings'  		=> 'metroino_page_1',
    ));

     $wp_customize->add_setting('metroino_transition_1', array(
        'default'        	=> 'pt-page-rotateCubeLeftOut pt-page-ontop$pt-page-rotateCubeLeftIn',
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));
    $wp_customize->add_control( 'metroino_transition_1', array(
        'settings' 			=> 'metroino_transition_1',
        'label'   			=> __('Select Page Transition', 'metroino'),
		'description' 		=> __('Get 40+ Page Transitions: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro</a>', 'metroino'),
        'section'	 		=> 'metroino_options_1',
        'type'    			=> 'select',
        'choices'    		=> $metroino_transitions,
    ));

    $wp_customize->add_setting('metroino_pagebgimage_1', array(
        'default'           => get_template_directory_uri().'/images/background.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_pagebgimage_1', array(
        'label'    			=> __('Page Background Image', 'metroino'),
        'section'  			=> 'metroino_options_1',
        'settings' 			=> 'metroino_pagebgimage_1',
    )));

    $wp_customize->add_setting('metroino_pagebgcolor_1', array(
        'default'           => '#0FA2CB',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_pagebgcolor_1', array(
        'label'    			=> __('Page Background Color', 'metroino'),
        'section'  			=> 'metroino_options_1',
        'settings' 			=> 'metroino_pagebgcolor_1',
    )));

	// ---------------------- Tile Options 2 -------------------
	
	
    $wp_customize->add_section('metroino_options_2', array(
        'title'    			=> __('Tile Options 2', 'metroino'),
        'priority' 			=> 121,
		'panel'				=> 'metroino_homepage_tiles_options'
    ));

    $wp_customize->add_setting('metroino_enable_2', array(
		'default'			=> 1,
		'sanitize_callback' => 'sanitize_text_field',
        'capability' 		=> 'edit_theme_options',
        'type'       		=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_enable_2', array(
		'label'    			=> __('Enable This Tile', 'metroino'),
        'settings' 			=> 'metroino_enable_2',
        'section'  			=> 'metroino_options_2',
        'type'     			=> 'checkbox',
    ));

    $wp_customize->add_setting('metroino_name_2', array(
        'default'        	=> __('About', 'metroino'),
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type' 			 	=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_name_2', array(
        'label'      		=> __('Tile Name', 'metroino'),
        'section'    		=> 'metroino_options_2',
        'settings'   		=> 'metroino_name_2',
    ));

    $wp_customize->add_setting('metroino_icon_2', array(
        'default'           => get_template_directory_uri().'/images/tile/tile-about.png',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_icon_2', array(
        'label'    			=> __('Tile Icon', 'metroino'),
        'section'  			=> 'metroino_options_2',
        'settings' 			=> 'metroino_icon_2',
    )));

    $wp_customize->add_setting('metroino_color_2', array(
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_color_2', array(
        'label'    			=> __('Tile Color', 'metroino'),
        'section'  			=> 'metroino_options_2',
        'settings' 			=> 'metroino_color_2',
    )));
	
    $wp_customize->add_setting('metroino_css_2', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		'default'        	=> 'background: linear-gradient(45deg, rgba(0,59,59,1) , rgba(5,193,255,1) , rgba(0,59,59,1) );',
        'capability'     	=> 'edit_theme_options',
        'type' 				=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_css_2', array(
        'label'     		=> __('Tile Custom CSS Style', 'metroino'),
        'section'    		=> 'metroino_options_2',
        'settings'   		=> 'metroino_css_2',
		'type'				=> 'textarea',
    ));

    $wp_customize->add_setting('metroino_page_2', array(
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
    ));

    $wp_customize->add_control('metroino_page_2', array(
        'label'      		=> __('Select Page', 'metroino'),
        'section'    		=> 'metroino_options_2',
        'type'    			=> 'dropdown-pages',
        'settings'  		=> 'metroino_page_2',
    ));

     $wp_customize->add_setting('metroino_transition_2', array(
        'default'        	=> 'pt-page-rotateFoldRight$pt-page-moveFromLeftFade',
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));
    $wp_customize->add_control( 'metroino_transition_2', array(
        'settings' 			=> 'metroino_transition_2',
        'label'   			=> __('Select Page Transition', 'metroino'),
		'description' 		=> __('Get 40+ Page Transitions: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro</a>', 'metroino'),
        'section'	 		=> 'metroino_options_2',
        'type'    			=> 'select',
        'choices'    		=> $metroino_transitions,
    ));

    $wp_customize->add_setting('metroino_pagebgimage_2', array(
        'default'           => get_template_directory_uri().'/images/background.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_pagebgimage_2', array(
        'label'    			=> __('Page Background Image', 'metroino'),
        'section'  			=> 'metroino_options_2',
        'settings' 			=> 'metroino_pagebgimage_2',
    )));

    $wp_customize->add_setting('metroino_pagebgcolor_2', array(
        'default'           => '#0FA2CB',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_pagebgcolor_2', array(
        'label'    			=> __('Page Background Color', 'metroino'),
        'section'  			=> 'metroino_options_2',
        'settings' 			=> 'metroino_pagebgcolor_2',
    )));
	
	
	// ---------------------- Tile Options 3 -------------------
	
	
    $wp_customize->add_section('metroino_options_3', array(
        'title'    			=> __('Tile Options 3', 'metroino'),
        'priority' 			=> 122,
		'panel'				=> 'metroino_homepage_tiles_options'
    ));

    $wp_customize->add_setting('metroino_enable_3', array(
		'default'			=> 1,
		'sanitize_callback' => 'sanitize_text_field',
        'capability' 		=> 'edit_theme_options',
        'type'       		=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_enable_3', array(
		'label'    			=> __('Enable This Tile', 'metroino'),
        'settings' 			=> 'metroino_enable_3',
        'section'  			=> 'metroino_options_3',
        'type'     			=> 'checkbox',
    ));

    $wp_customize->add_setting('metroino_name_3', array(
        'default'        	=> __('Team', 'metroino'),
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type' 			 	=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_name_3', array(
        'label'      		=> __('Tile Name', 'metroino'),
        'section'    		=> 'metroino_options_3',
        'settings'   		=> 'metroino_name_3',
    ));

    $wp_customize->add_setting('metroino_icon_3', array(
        'default'           => get_template_directory_uri().'/images/tile/tile-team.png',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_icon_3', array(
        'label'    			=> __('Tile Icon', 'metroino'),
        'section'  			=> 'metroino_options_3',
        'settings' 			=> 'metroino_icon_3',
    )));

    $wp_customize->add_setting('metroino_color_3', array(
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_color_3', array(
        'label'    			=> __('Tile Color', 'metroino'),
        'section'  			=> 'metroino_options_3',
        'settings' 			=> 'metroino_color_3',
    )));
	
    $wp_customize->add_setting('metroino_css_3', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		'default'        	=> 'background: linear-gradient(45deg, rgba(0,255,0,1), rgba(0,255,255,1));',
        'capability'     	=> 'edit_theme_options',
        'type' 				=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_css_3', array(
        'label'     		=> __('Tile Custom CSS Style', 'metroino'),
        'section'    		=> 'metroino_options_3',
        'settings'   		=> 'metroino_css_3',
		'type'				=> 'textarea',
    ));

    $wp_customize->add_setting('metroino_page_3', array(
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
    ));

    $wp_customize->add_control('metroino_page_3', array(
        'label'      		=> __('Select Page', 'metroino'),
        'section'    		=> 'metroino_options_3',
        'type'    			=> 'dropdown-pages',
        'settings'  		=> 'metroino_page_3',
    ));

     $wp_customize->add_setting('metroino_transition_3', array(
        'default'        	=> 'pt-page-moveToBottom$pt-page-moveFromTop',
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));
    $wp_customize->add_control( 'metroino_transition_3', array(
        'settings' 			=> 'metroino_transition_3',
        'label'   			=> __('Select Page Transition', 'metroino'),
		'description' 		=> __('Get 40+ Page Transitions: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro</a>', 'metroino'),
        'section'	 		=> 'metroino_options_3',
        'type'    			=> 'select',
        'choices'    		=> $metroino_transitions,
    ));

    $wp_customize->add_setting('metroino_pagebgimage_3', array(
        'default'           => get_template_directory_uri().'/images/background.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_pagebgimage_3', array(
        'label'    			=> __('Page Background Image', 'metroino'),
        'section'  			=> 'metroino_options_3',
        'settings' 			=> 'metroino_pagebgimage_3',
    )));

    $wp_customize->add_setting('metroino_pagebgcolor_3', array(
        'default'           => '#0FA2CB',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_pagebgcolor_3', array(
        'label'    			=> __('Page Background Color', 'metroino'),
        'section'  			=> 'metroino_options_3',
        'settings' 			=> 'metroino_pagebgcolor_3',
    )));
	

	// ---------------------- Tile Options 4 -------------------
	
	
    $wp_customize->add_section('metroino_options_4', array(
        'title'    			=> __('Tile Options 4', 'metroino'),
        'priority' 			=> 123,
		'panel'				=> 'metroino_homepage_tiles_options'
    ));

    $wp_customize->add_setting('metroino_enable_4', array(
		'default'			=> 1,
		'sanitize_callback' => 'sanitize_text_field',
        'capability' 		=> 'edit_theme_options',
        'type'       		=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_enable_4', array(
		'label'    			=> __('Enable This Tile', 'metroino'),
        'settings' 			=> 'metroino_enable_4',
        'section'  			=> 'metroino_options_4',
        'type'     			=> 'checkbox',
    ));

    $wp_customize->add_setting('metroino_name_4', array(
        'default'        	=> __('Blog', 'metroino'),
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type' 			 	=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_name_4', array(
        'label'      		=> __('Tile Name', 'metroino'),
        'section'    		=> 'metroino_options_4',
        'settings'   		=> 'metroino_name_4',
    ));

    $wp_customize->add_setting('metroino_icon_4', array(
        'default'           => get_template_directory_uri().'/images/tile/tile-blog.png',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_icon_4', array(
        'label'    			=> __('Tile Icon', 'metroino'),
        'section'  			=> 'metroino_options_4',
        'settings' 			=> 'metroino_icon_4',
    )));

    $wp_customize->add_setting('metroino_color_4', array(
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_color_4', array(
        'label'    			=> __('Tile Color', 'metroino'),
        'section'  			=> 'metroino_options_4',
        'settings' 			=> 'metroino_color_4',
    )));
	
    $wp_customize->add_setting('metroino_css_4', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses',
		'default'        	=> 'background: linear-gradient(215deg, rgba(255,102,102,1) , rgba(0,255,255,1) );',
        'capability'     	=> 'edit_theme_options',
        'type' 				=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_css_4', array(
        'label'     		=> __('Tile Custom CSS Style', 'metroino'),
        'section'    		=> 'metroino_options_4',
        'settings'   		=> 'metroino_css_4',
		'type'				=> 'textarea',
    ));

    $wp_customize->add_setting('metroino_page_4', array(
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
    ));

    $wp_customize->add_control('metroino_page_4', array(
        'label'      		=> __('Select Page', 'metroino'),
        'section'    		=> 'metroino_options_4',
        'type'    			=> 'dropdown-pages',
        'settings'  		=> 'metroino_page_4',
    ));

     $wp_customize->add_setting('metroino_transition_4', array(
        'default'        	=> 'pt-page-moveToRight$pt-page-moveFromLeft',
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));
    $wp_customize->add_control( 'metroino_transition_4', array(
        'settings' 			=> 'metroino_transition_4',
        'label'   			=> __('Select Page Transition', 'metroino'),
		'description' 		=> __('Get 40+ Page Transitions: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro</a>', 'metroino'),
        'section'	 		=> 'metroino_options_4',
        'type'    			=> 'select',
        'choices'    		=> $metroino_transitions,
    ));

    $wp_customize->add_setting('metroino_pagebgimage_4', array(
        'default'           => get_template_directory_uri().'/images/background.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_pagebgimage_4', array(
        'label'    			=> __('Page Background Image', 'metroino'),
        'section'  			=> 'metroino_options_4',
        'settings' 			=> 'metroino_pagebgimage_4',
    )));

    $wp_customize->add_setting('metroino_pagebgcolor_4', array(
        'default'           => '#0FA2CB',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_pagebgcolor_4', array(
        'label'    			=> __('Page Background Color', 'metroino'),
        'section'  			=> 'metroino_options_4',
        'settings' 			=> 'metroino_pagebgcolor_4',
    )));
	
	
	// ---------------------- More Tiles -------------------
	
	
    $wp_customize->add_section('metroino_more', array(
        'title'    			=> __('More Tiles', 'metroino'),
        'priority' 			=> 124,
		'panel'				=> 'metroino_homepage_tiles_options'
    ));

    $wp_customize->add_setting('metroino_pro', array(
        'default'           => get_template_directory_uri().'/images/metroino-pro.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_pro', array(
        'label'    			=> __('Need More Tiles', 'metroino'),
		'description'		=> __('Upgrade to Metroino Pro: <a href="http://theme77.com/metroino-demo/" target="_blank" class="get-pro">Metroino Pro Demo</a>','metroino'),
        'section'  			=> 'metroino_more',
        'settings' 			=> 'metroino_pro',
    )));
	
	
    //  =============================================================
    //  = 					 	General Options						=
    //  =============================================================
	
    $wp_customize->add_section('metroino_general_options', array(
        'title'    			=> __('General Options', 'metroino'),
        'priority' 			=> 2,
    ));
	
    $wp_customize->add_setting('metroino_tile_title_color', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_tile_title_color', array(
        'label'    			=> __('Tiles Title Color', 'metroino'),
        'section'  			=> 'metroino_general_options',
        'settings' 			=> 'metroino_tile_title_color',
    )));
	
    $wp_customize->add_setting('metroino_menu_color', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_menu_color', array(
        'label'    			=> __('Menu Font Color', 'metroino'),
        'section'  			=> 'metroino_general_options',
        'settings' 			=> 'metroino_menu_color',
    )));
	
    $wp_customize->add_setting('metroino_menu_bg_color', array(
        'default'           => '#00AB4D',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_menu_bg_color', array(
        'label'    			=> __('Menu Background Color', 'metroino'),
        'section'  			=> 'metroino_general_options',
        'settings' 			=> 'metroino_menu_bg_color',
    )));
	

    $wp_customize->add_setting('metroino_homebgimage', array(
        'default'           => get_template_directory_uri().'/images/homepage.jpg',
		'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        'type' 			 	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'metroino_homebgimage', array(
        'label'    			=> __('Homepage Background Image', 'metroino'),
        'section'  			=> 'metroino_general_options',
        'settings' 			=> 'metroino_homebgimage',
    )));
	

    $wp_customize->add_setting('metroino_homebgcolor', array(
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'theme_mod',
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'metroino_homebgcolor', array(
        'label'    			=> __('Homepage Background Color', 'metroino'),
        'section'  			=> 'metroino_general_options',
        'settings' 			=> 'metroino_homebgcolor',
    )));
	
	
    //  =============================================================
    //  = 					 	Blog Options						=
    //  =============================================================
	
    $wp_customize->add_section('metroino_blog_options', array(
        'title'    			=> __('Blog Options', 'metroino'),
        'priority' 			=> 3,
    ));
	
    $wp_customize->add_setting('metroino_blog_sidebar', array(
        'default'        	=> 'rightsidebar',
		'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type' 			 	=> 'theme_mod', 
		'transport'	 		=> 'postMessage',
    ));

    $wp_customize->add_control('metroino_blog_sidebar', array(
        'label'      		=> __('Blog sidebar', 'metroino'),
        'section'    		=> 'metroino_blog_options',
        'settings'   		=> 'metroino_blog_sidebar',
		'type'				=> 'radio',
        'choices'    		=> array(
								'rightsidebar' => __('Right Sidebar', 'metroino'),
								'leftsidebar' => __('Left Sidebar', 'metroino'),
        ),
    ));
	
	
	
}
add_action( 'customize_register', 'metroino_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function metroino_customize_preview_js() {
	wp_enqueue_script( 'metroino_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), NULL, true );
}
add_action( 'customize_preview_init', 'metroino_customize_preview_js' );


/*
Enqueue Script for top buttons
*/
function metroino_customizer_controls(){

	wp_register_script( 'metroino_customizer_top_buttons', get_template_directory_uri() . '/js/customizer-top-buttons.js', array( 'jquery' ), true  );
	wp_enqueue_script( 'metroino_customizer_top_buttons' );

	wp_localize_script( 'metroino_customizer_top_buttons', 'customBtns', array(
		'prodemo' => esc_html__( 'Demo Premium version', 'metroino' ),
        'proget' => esc_html__( 'Get Premium version', 'metroino' )
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'metroino_customizer_controls' );
