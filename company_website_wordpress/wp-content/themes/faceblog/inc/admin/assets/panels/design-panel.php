<?php
/**
 * Customize option for theme design
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

add_action( 'customize_register', 'faceblog_design_settings_register' );

function faceblog_design_settings_register( $wp_customize ) {

	$wp_customize->get_section( 'colors' )->panel = 'faceblog_design_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '3';

    /**
     * Add Design Settings Panel 
     */
    $wp_customize->add_panel( 
        'faceblog_design_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Design Settings', 'faceblog' ),
            ) 
        );
/*--------------------------------------------------------------------------------------------------------*/
  
  	//Theme color
    $wp_customize->add_setting(
        'faceblog_theme_color',
        array(
            'default'           => '#02D090',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'faceblog_theme_color',
            array(
                'label'         => esc_html__( 'Theme color', 'faceblog' ),
                'section'       => 'colors',
                'priority'      => 11
            )
        )
    );
/*------------------------------------------------------------------------------------------------------*/
    /**
     * Single Page
     */
    $wp_customize->add_section(
        'faceblog_archive_design_section',
        array(
            'title'         => esc_html__( 'Archive Section', 'faceblog' ),
            'priority'      => 5,
            'panel'         => 'faceblog_design_settings_panel'
        )
    );

    // Archive page sidebar
    $wp_customize->add_setting(
        'archive_sidebar_option',
        array(
            'default' =>'right_sidebar',
            'sanitize_callback' => 'faceblog_page_layout_sanitize',
        )
    );

    $wp_customize->add_control( new FaceBlog_Image_Radio_Control(
        $wp_customize, 
        'archive_sidebar_option', 
        array(
            'type' => 'radio',
            'label' => esc_html__( 'Available layouts', 'faceblog' ),
            'description' => esc_html__( 'Select layout for whole site archives, categories, search page etc.', 'faceblog' ),
            'section' => 'faceblog_archive_design_section',
            'priority'       => 3,
            'choices' => array(
                    'right_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/right-sidebar.png',
                    'left_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/left-sidebar.png',
                    'no_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/no-sidebar.png',
                )
           )
        )
    );
/*--------------------------------------------------------------------------------------------------------*/
 /**
  * Customm design
  *
  * @since 1.0.6
  */ 
 $wp_customize->add_section(
        'faceblog_custom_design',
        array(
            'title'         => esc_html__( 'Custom Design', 'faceblog' ),
            'priority'      => 6,
            'panel'         => 'faceblog_design_settings_panel'
        )
    );
     
    // Custom css field
    $wp_customize->add_setting(
        'faceblog_custom_css',
        array(
            'default' =>'',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'faceblog_sanitize_text',
        )
    );
    $wp_customize->add_control( new FaceBlog_Textarea_Custom_Control(
        $wp_customize,
        'faceblog_custom_css',
            array(
                'type' => 'faceblog_textarea',
                'label' => esc_html__( 'Custom css', 'faceblog' ),
                'priority' => 5,
                'section' => 'faceblog_custom_design'
                )
        )
    ); 

}