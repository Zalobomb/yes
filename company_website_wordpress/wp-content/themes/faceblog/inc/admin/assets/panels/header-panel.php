<?php
/**
 * Customize header settings and it's relative
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

add_action( 'customize_register', 'faceblog_header_settings_register' );

function faceblog_header_settings_register( $wp_customize ) {
	/**
     * Add Header Settings Panel 
     */
    $wp_customize->add_panel(
        'faceblog_header_settings_panel', 
        array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Header Settings', 'faceblog' ),
            ) 
    );

/*------------------------------------------------------------------------------------------------------*/
    /**
     * Header Menu Section
     */
    $wp_customize->add_section(
        'faceblog_header_menu_section',
        array(
            'title'         => esc_html__( 'Menu Section', 'faceblog' ),
            'priority'      => 4,
            'panel'         => 'faceblog_header_settings_panel'
        )
    );

    // Menu Featured Image
    $wp_customize->add_setting( 
        'menu_featured_image',
        array(
            'default' => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'menu_featured_image', 
            array(
                'label'     => esc_html__( 'Menu Featured Image', 'faceblog' ),
                'section'   => 'faceblog_header_menu_section',
                'context'   => 'header-banner-image',
                'priority'  => 3,
                )
        )
    );

    // Menu featured title
    $wp_customize->add_setting(
        'menu_featured_text', 
        array(
              'default' => esc_html__( 'Welcome To Faceblog', 'faceblog' ),
              'capability' => 'edit_theme_options',
              'transport'=> 'postMessage',
              'sanitize_callback' => 'faceblog_sanitize_text',
            )
    );
  $wp_customize->add_control(
      'menu_featured_text', 
      array(
            'type' => 'text',
            'label' => esc_html__( 'Menu Featured Text', 'faceblog' ),
            'section' => 'faceblog_header_menu_section',
            'priority' => 4
          )
  );

/*------------------------------------------------------------------------------------------------------*/
    /**
     * FrontPage Banner Section
     */
    $wp_customize->add_section(
        'faceblog_frontpage_banner_section',
        array(
            'title'      => esc_html__( 'Frontpage Banner Section', 'faceblog' ),
            'priority'   => 5,
            'panel'      => 'faceblog_header_settings_panel'
        )
    );
    
    // Header option
    $wp_customize->add_setting(
        'faceblog_header_layout',
        array(
            'default' =>'banner_layout1',
            'sanitize_callback' => 'faceblog_header_layout_sanitize',
        )
    );
    $wp_customize->add_control(
        'faceblog_header_layout',
        array(
            'type' => 'radio',
            'priority'    => 3,
            'label' => __( 'Banner Layout', 'faceblog' ),
            'description' => __( 'Choose layout for header banner', 'faceblog' ),
            'section' => 'faceblog_frontpage_banner_section',
            'choices' => array(
                'banner_layout1'   => esc_html__( 'Category Posts', 'faceblog' ),
                'banner_layout2'   => esc_html__( 'Single Banner', 'faceblog' ),
            ),
        )
    );

    // Category for header section
    $wp_customize->add_setting(
        'header_banner_cat',
        array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => '__return_false_value'
        )
    );
    $wp_customize->add_control( 
        new FaceBlog_Customize_Category_Control( 
        $wp_customize,
        'header_banner_cat', 
        array(
            'label' => esc_html__( 'Select Category', 'faceblog' ),
            'description' => esc_html__( 'Select category for header banner section posts.', 'faceblog' ),
            'section' => 'faceblog_frontpage_banner_section',
            'priority' => 5,
            'active_callback' => 'banner_layout_category_cb'
            )
        )
    );

    // Banner image upload
    $wp_customize->add_setting( 
        'header_front_banner_image',
        array(
            'default' => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'header_front_banner_image', 
            array(
                'label'     => esc_html__( 'Banner Image', 'faceblog' ),
                'description'     => __( 'Added banner image for Frontpage header section.', 'faceblog' ),
                'section'   => 'faceblog_frontpage_banner_section',
                'context'   => 'header-banner-image',
                'priority'  => 6,
                'active_callback' => 'banner_layout_image_cb'
                )
        ) 
    );
/*------------------------------------------------------------------------------------------------------*/
    /**
     * Innerpages Banner Section
     */
    $wp_customize->add_section(
        'faceblog_innerpage_banner_section',
        array(
            'title'      => esc_html__( 'Innerpage Banner Section', 'faceblog' ),
            'priority'   => 6,
            'panel'      => 'faceblog_header_settings_panel'
        )
    );
    
    // Top Header Option
    $wp_customize->add_setting(
        'innerpage_banner_option', 
        array(
              'default' => 0,
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'faceblog_sanitize_checkbox'
            )
    );
	$wp_customize->add_control(
	    'innerpage_banner_option', 
	    array(
	          'type' => 'checkbox',
	          'label' => esc_html__( 'Banner Option', 'faceblog' ),
	          'description' => esc_html__( 'Checked to disable header banner for innerpages.', 'faceblog' ),
	          'section' => 'faceblog_innerpage_banner_section',
	          'priority'      => 4
	        )
	);
    
    // Banner image upload
    $wp_customize->add_setting( 
        'header_inner_banner_image',
        array(
            'default' => '',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
            'header_inner_banner_image', 
            array(
                'label'     => esc_html__( 'Banner Image', 'faceblog' ),
                'description'     => esc_html__( 'Added banner image for Innerpages header section.', 'faceblog' ),
                'section'   => 'faceblog_innerpage_banner_section',
                'context'   => 'header-banner-image',
                'priority'  => 5
                )
        ) 
    );
}