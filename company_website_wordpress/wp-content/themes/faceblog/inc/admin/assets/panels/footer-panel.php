<?php
/**
 * Settings for footer section
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

add_action( 'customize_register', 'faceblog_footer_settings_register' );

function faceblog_footer_settings_register( $wp_customize ) {
	/**
     * Add Footer Settings Panel 
     */
    $wp_customize->add_panel( 
        'faceblog_footer_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Footer Settings', 'faceblog' ),
            ) 
        );
/*------------------------------------------------------------------------------------------------------*/
    /**
     * Footer Widget Section
     */
    $wp_customize->add_section(
        'faceblog_widget_section',
        array(
            'title'         => esc_html__( 'Footer Widget Section', 'faceblog' ),
            'priority'      => 5,
            'panel'         => 'faceblog_footer_settings_panel'
        )
    );

    // Footer widget area
    $wp_customize->add_setting(
        'footer_widget_option',
        array(
            'default' =>'column3',
            'sanitize_callback' => 'faceblog_sanitize_footer_widget',
        )
    );
    $wp_customize->add_control(
        'footer_widget_option',
        array(
            'type' => 'radio',
            'priority'    => 4,
            'label' => esc_html__( 'Choose Widget Option', 'faceblog' ),
            'description' => esc_html__( 'Choose option to display number of widget in footer area.', 'faceblog' ),
            'section' => 'faceblog_widget_section',
            'choices' => array(
                'column1'   => esc_html__( 'Column One', 'faceblog' ),
                'column2'   => esc_html__( 'Column Two', 'faceblog' ),
                'column3'   => esc_html__( 'Column Three', 'faceblog' ),
                'column4'   => esc_html__( 'Column Four', 'faceblog' ),
            ),
        )
    );  

}