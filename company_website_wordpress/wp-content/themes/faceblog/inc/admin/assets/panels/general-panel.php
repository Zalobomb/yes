<?php
/**
 * General Settings Panel and respective sections 
 * 
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */
 
 add_action( 'customize_register', 'faceblog_general_settings_register' );
 
 function faceblog_general_settings_register( $wp_customize ) {
    
    $wp_customize->get_section( 'title_tagline' )->panel = 'faceblog_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '3';
    $wp_customize->get_section( 'header_image' )->panel = 'faceblog_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->panel = 'faceblog_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '6';    
    $wp_customize->remove_section( 'header_image' );
    
    /**
     * Add General Settings Panel 
     */
    $wp_customize->add_panel( 
        'faceblog_general_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'General Settings', 'faceblog' ),
            ) 
        );
 }