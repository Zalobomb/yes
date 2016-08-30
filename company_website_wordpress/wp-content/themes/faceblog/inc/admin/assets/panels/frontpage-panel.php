<?php
/**
 * Customizer option and settings for Frontpage.
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

add_action( 'customize_register', 'faceblog_frontpage_settings_register' );

function faceblog_frontpage_settings_register( $wp_customize ) {
	
	/**
     * Add FronPage Settings Panel 
     */
    $wp_customize->add_panel( 
        'faceblog_frontpage_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Front Page Settings', 'faceblog' ),
            ) 
        );
/*------------------------------------------------------------------------------------------------------*/
    /**
     * About Blog Section
     */
    $wp_customize->add_section(
        'faceblog_front_about_section',
        array(
            'title'         => esc_html__( 'About Faceblog Section', 'faceblog' ),
            'priority'      => 5,
            'panel'         => 'faceblog_frontpage_settings_panel'
        )
    );

    // About Faceblog Content
    $wp_customize->add_setting(
        'faceblog_front_about_textarea',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'faceblog_sanitize_text',
        )
    );
    $wp_customize->add_control( new FaceBlog_Textarea_Custom_Control(
        $wp_customize,
        'faceblog_front_about_textarea',
            array(
                'type' => 'faceblog_textarea',
                'label' => esc_html__( 'About Us Content', 'faceblog' ),
                'priority' => 5,
                'section' => 'faceblog_front_about_section'
                )
        )
    );

    // About us link text
    $wp_customize->add_setting(
        'front_about_link_text', 
        array(
              'default' => '',
              'capability' => 'edit_theme_options',
              'transport'=> 'postMessage',
              'sanitize_callback' => 'faceblog_sanitize_text',
            )
    );
	$wp_customize->add_control(
	    'front_about_link_text', 
	    array(
	          'type' => 'text',
	          'label' => esc_html__( 'About Us link text', 'faceblog' ),
	          'section' => 'faceblog_front_about_section',
	          'priority' => 6
	        )
	);

	//About us text url
    $wp_customize->add_setting(
        'front_about_url',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'transport'=> 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
            )
    );
    $wp_customize->add_control(
        'front_about_url',
        array(
            'type' => 'text',
            'priority' => 7,
            'label' => esc_html__( 'About Link url', 'faceblog' ),
            'section' => 'faceblog_front_about_section'
            )
    );

}