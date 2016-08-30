<?php
/**
 * Tora Theme Customizer.
 *
 * @package Tora
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tora_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->get_section( 'title_tagline' )->panel        = 'tora_header_panel';    
    $wp_customize->get_section( 'header_image' )->panel         = 'tora_header_panel';


    //Titles
    class Tora_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;background-color:#343540;padding:5px;color:#fff;text-align:center;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

    /* Panel - Header area */
    $wp_customize->add_panel( 'tora_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header', 'tora'),
    ) );

    /* Sections */
    $sections = array(
        //Header type
        'tora_header_type' => array(
            'slug'          => 'tora_header_type',
            'title'         => __('Type', 'tora'),
            'panel'         => 'tora_header_panel',
            'description'   => '',
            'priority'      => 10,
        ),
        //Header text
        'tora_header_text' => array(
            'slug'           => 'tora_header_text',
            'title'          => __('Text', 'tora'),
            'panel'          => 'tora_header_panel',
            'description'    => '',
            'priority'       => 11,
        ),
        //Menu style
        'tora_menu_style'   => array(
            'slug'           => 'tora_menu_style',
            'title'          => __('Menu', 'tora'),
            'panel'          => 'tora_header_panel',
            'description'    => '',
            'priority'       => 12,
        ),
        //Contact info
        'tora_contact'   => array(
            'slug'         => 'tora_contact',
            'title'        => __('Contact', 'tora'),
            'panel'        => 'tora_header_panel',
            'description'  => '',
            'priority'     => 13,
        ),
        //Fonts
        'tora_fonts'   => array(
            'slug'         => 'tora_fonts',
            'title'        => __('Fonts', 'tora'),
            'panel'        => '',
            'description'  => __('For help selecting fonts see the <a href="http://theme.blue/documentation/tora" target="_blank">documentation</a>. Please note that your font selection applies to theme elements, not to Live Composer modules. The font list is here: google.com/fonts', 'tora'),
            'priority'     => 14,
        ),                  
        //Blog
        'tora_blog'       => array(
            'slug'         => 'tora_blog',
            'title'        => __('Blog', 'tora'),
            'panel'        => '',
            'description'  => '',
            'priority'     => 21,
        ),  
        //Footer
        'tora_footer'       => array(
            'slug'         => 'tora_footer',
            'title'        => __('Footer', 'tora'),
            'panel'        => '',
            'description'  => '',
            'priority'     => 22,
        ),                      
    );

    foreach ( $sections as $key => $section ) {
        $wp_customize->add_section(
            $section['slug'],
            array(
                'title'         => $section['title'],
                'description'   => $section['description'],
                'panel'         => $section['panel'],
                'priority'      => $section['priority']
            )
        );
    }


    /* Controls */

    //Label - Blog layout
    $wp_customize->add_setting('tora_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Tora_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'tora'),
        'section' => 'tora_blog',
        'settings' => 'tora_options[info]',
        'priority' => 10
        ) )
    );    
    //Label - Excerpt
    $wp_customize->add_setting('tora_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Tora_Info( $wp_customize, 'content', array(
        'label' => __('Excerpt', 'tora'),
        'section' => 'tora_blog',
        'settings' => 'tora_options[info]',
        'priority' => 14
        ) )
    );      
    //Label - Meta
    $wp_customize->add_setting('tora_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',            
        )
    );
    $wp_customize->add_control( new Tora_Info( $wp_customize, 'meta', array(
        'label' => __('Meta', 'tora'),
        'section' => 'tora_blog',
        'settings' => 'tora_options[info]',
        'priority' => 17
        ) )
    ); 

   $controls = array( 
        //Header
        'front_header_type' => array(
            'slug'          => 'front_header_type',
            'section'       => 'tora_header_type',
            'sanitize'      => 'tora_sanitize_header',
            'default'       => 'image',
            'type'          => 'radio',
            'label'         => __('Homepage header', 'tora'),
            'description'   => __('Select the header type for your front page', 'tora'),
            'choices'       => array(
                'image'    => __('Image', 'tora'),
                'nothing'  => __('Only the menu', 'tora')
            ),
            'priority'     => 10,
        ),
        'site_header_type' => array(
            'slug'          => 'site_header_type',
            'section'       => 'tora_header_type',
            'sanitize'      => 'tora_sanitize_header',
            'default'       => 'nothing',
            'type'          => 'radio',
            'label'         => __('Secondary pages header', 'tora'),
            'description'   => __('Select the header type for your secondary pages', 'tora'),
            'choices'       => array(
                'image'    => __('Image', 'tora'),
                'nothing'  => __('Only the menu', 'tora')
            ),
            'priority'     => 11,            
        ),
        //Header text
        'header_text' => array(
            'slug'          => 'header_text',
            'section'       => 'tora_header_text',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Header text', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 10,            
        ),
        'button_left' => array(
            'slug'          => 'button_left',
            'section'       => 'tora_header_text',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Left button text', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'     => 11,
        ),
        'button_left_url' => array(
            'slug'          => 'button_left_url',
            'section'       => 'tora_header_text',
            'sanitize'      => 'esc_url_raw',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Left button URL', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'     => 12,
        ),
        'button_right' => array(
            'slug'          => 'button_right',
            'section'       => 'tora_header_text',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Right button text', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 13,
        ),
        'button_right_url' => array(
            'slug'          => 'button_right_url',
            'section'       => 'tora_header_text',
            'sanitize'      => 'esc_url_raw',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Right button URL', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 14,
        ),
        //Menu style
        'sticky_menu' => array(
            'slug'          => 'sticky_menu',
            'section'       => 'tora_menu_style',
            'sanitize'      => 'tora_sanitize_sticky',
            'default'       => 'sticky',
            'type'          => 'radio',
            'label'         => __('Sticky menu', 'tora'),
            'description'   => '',
            'choices'       => array(
                'sticky'   => __('Sticky', 'tora'),
                'static'   => __('Static', 'tora'),
            ),
            'priority'     => 10,
        ),        
        'menu_style' => array(
            'slug'          => 'menu_style',
            'section'       => 'tora_menu_style',
            'sanitize'      => 'tora_sanitize_menu_style',
            'default'       => 'inline',
            'type'          => 'radio',
            'label'         => __('Menu style', 'tora'),
            'description'   => '',
            'choices'       => array(
                'inline'     => __('Inline', 'tora'),
                'centered'   => __('Centered', 'tora'),
            ),
            'priority'      => 11,
        ),
        //Blog
        'blog_layout' => array(
            'slug'          => 'blog_layout',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_blog',
            'default'       => 'list',
            'type'          => 'radio',
            'label'         => __('Blog layout', 'tora'),
            'description'   => '',
            'choices'       => array(
                'list'              => __( 'List', 'tora' ),
                'fullwidth'         => __( 'Full width', 'tora' ),
                'masonry-layout'    => __( 'Masonry', 'tora' )
            ),
            'priority'      => 11,
        ),
        'fullwidth_single' => array(
            'slug'          => 'fullwidth_single',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_checkbox',
            'default'       => '',
            'type'          => 'checkbox',
            'label'         => __('Full width single posts?', 'tora'),
            'description'   => '',
            'choices'       => '',
            'priority'      => 12,
        ),
        'sidebar_position' => array(
            'slug'          => 'sidebar_position',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_sidebar',
            'default'       => 'right',
            'type'          => 'radio',
            'label'         => __('Sidebar position', 'tora'),
            'description'   => '',
            'choices'       => array(
                'left'    => __( 'Left', 'tora' ),
                'right'   => __( 'Right', 'tora' ),
            ),
            'priority'      => 13,
        ),
        'exc_length' => array(
            'slug'          => 'exc_length',
            'section'       => 'tora_blog',
            'sanitize'      => 'absint',
            'default'       => '30',
            'type'          => 'number',
            'label'         => __('Excerpt length', 'tora'),
            'description'   => __('Excerpt length [default: 30 words]', 'tora'),
            'choices'       => '',
            'input_attrs'   => array(
                'min'   => 10,
                'max'   => 200,
                'step'  => 5,
                'style' => 'padding: 15px;',
            ),            
            'priority'      => 15,
        ),        
        'custom_read_more' => array(
            'slug'          => 'custom_read_more',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => '',
            'type'          => 'text',
            'label'         => __( 'Read more text', 'tora' ),
            'description'   => __( 'Add some text here to replace the default [&hellip;]. It will automatically be linked to your article', 'tora' ),
            'choices'       => '',
            'priority'      => 16,
        ),
        'hide_meta_index' => array(
            'slug'          => 'hide_meta_index',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_checkbox',
            'default'       => '',
            'type'          => 'checkbox',
            'label'         => __('Hide post meta on the blog?', 'tora'),
            'description'   => '',
            'choices'       => '',
            'priority'      => 18,
        ),
        'hide_meta_single' => array(
            'slug'          => 'hide_meta_single',
            'section'       => 'tora_blog',
            'sanitize'      => 'tora_sanitize_checkbox',
            'default'       => '',
            'type'          => 'checkbox',
            'label'         => __('Hide post meta on single posts?', 'tora'),
            'description'   => '',
            'choices'       => '',
            'priority'      => 19,
        ),
        //Contact
        'toggle_contact' => array(
            'slug'          => 'toggle_contact',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_checkbox',
            'default'       => '0',
            'type'          => 'checkbox',
            'label'         => __('Display the contact info?', 'tora'),
            'description'   => '',
            'choices'       => '',
            'priority'      => 9,
        ),    
        'contact_mobile' => array(
            'slug'          => 'contact_mobile',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_checkbox',
            'default'       => '',
            'type'          => 'checkbox',
            'label'         => __('Show the contact info on small screens?', 'tora'),
            'description'   => '',
            'choices'       => '',
            'priority'      => 10,
        ),    
        //Mobile toggle text
        'mobile_button' => array(
            'slug'          => 'mobile_button',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => __('Contact','tora'),
            'type'          => 'text',
            'label'         => __( 'Mobile contact toggle text', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 11,            
        ),             
        'contact_phone' => array(
            'slug'          => 'contact_phone',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => '111.222.333',
            'type'          => 'text',
            'label'         => __( 'Phone', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 12,
        ),     
        'contact_email' => array(
            'slug'          => 'contact_email',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => 'office@yoursite.com',
            'type'          => 'text',
            'label'         => __( 'Email', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 13,
        ),     
        'contact_address' => array(
            'slug'          => 'contact_address',
            'section'       => 'tora_contact',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => 'New York City',
            'type'          => 'text',
            'label'         => __( 'Address', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 14,
        ),   
        //Fonts
        'body_fonts' => array(
            'slug'          => 'body_fonts',
            'section'       => 'tora_fonts',
            'sanitize'      => 'esc_url_raw',
            'default'       => '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic',
            'type'          => 'text',
            'label'         => __( 'Body font', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 10,
        ),    
        'body_font_family' => array(
            'slug'          => 'body_font_family',
            'section'       => 'tora_fonts',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => 'font-family: \'Lato\', sans-serif;',
            'type'          => 'text',
            'label'         => __( 'Body font family', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 11,
        ),
        'headings_fonts' => array(
            'slug'          => 'headings_fonts',
            'section'       => 'tora_fonts',
            'sanitize'      => 'esc_url_raw',
            'default'       => '//fonts.googleapis.com/css?family=Raleway:400,600',
            'type'          => 'text',
            'label'         => __( 'Headings font', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 12,
        ),    
        'headings_font_family' => array(
            'slug'          => 'headings_font_family',
            'section'       => 'tora_fonts',
            'sanitize'      => 'tora_sanitize_text',
            'default'       => 'font-family: \'Raleway\', sans-serif;',
            'type'          => 'text',
            'label'         => __( 'Headings font family', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 13,
        ),
        'h1_size' => array(
            'slug'          => 'h1_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '36',
            'type'          => 'number',
            'label'         => __( 'H1 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 14,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),
        'h2_size' => array(
            'slug'          => 'h2_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '30',
            'type'          => 'number',
            'label'         => __( 'H2 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 15,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),  
        'h3_size' => array(
            'slug'          => 'h3_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '24',
            'type'          => 'number',
            'label'         => __( 'H3 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 16,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ), 
        'h4_size' => array(
            'slug'          => 'h4_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '18',
            'type'          => 'number',
            'label'         => __( 'H4 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 17,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),  
        'h5_size' => array(
            'slug'          => 'h5_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '14',
            'type'          => 'number',
            'label'         => __( 'H5 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 18,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),     
        'h6_size' => array(
            'slug'          => 'h6_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '12',
            'type'          => 'number',
            'label'         => __( 'H6 size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 19,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),  
        'body_size' => array(
            'slug'          => 'body_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '14',
            'type'          => 'number',
            'label'         => __( 'Body size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 20,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),    
        'menu_size' => array(
            'slug'          => 'menu_size',
            'section'       => 'tora_fonts',
            'sanitize'      => 'absint',
            'default'       => '14',
            'type'          => 'number',
            'label'         => __( 'Menu items size', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 21,
            'input_attrs' => array(
                'min'   => 10,
                'max'   => 60,
                'step'  => 1,
                'style' => 'margin-bottom: 15px; padding: 10px;',
            ),            
        ),                                                                   
        //Footer widget areas
        'footer_widget_areas' => array(
            'slug'          => 'footer_widget_areas',
            'section'       => 'tora_footer',
            'sanitize'      => 'tora_sanitize_widgets',
            'default'       => '3',
            'type'          => 'radio',
            'label'         => __('Footer widget areas', 'tora'),
            'description'   => __('Select the no. of widget areas you want in the footer. Changes will be completely visible once you leave the Customizer. To add widgets, go to Appearance > Widgets', 'tora'),
            'choices'       => array(
                '1'     => __('One', 'tora'),
                '2'     => __('Two', 'tora'),
                '3'     => __('Three', 'tora'),
            ),
            'priority'     => 10,
        ),
        //Colors
        'color_primary' => array(
            'slug'          => 'color_primary',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#ED5A5A',
            'type'          => 'color',
            'label'         => __( 'Primary', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 11,
        ),
        'color_site_title' => array(
            'slug'          => 'color_site_title',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#3E4C53',
            'type'          => 'color',
            'label'         => __( 'Site title', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 12,
        ),
        'color_site_description' => array(
            'slug'          => 'color_site_description',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#94959A',
            'type'          => 'color',
            'label'         => __( 'Site description', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 13,
        ),
        'background_contact' => array(
            'slug'          => 'background_contact',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#22394C',
            'type'          => 'color',
            'label'         => __( 'Contact background', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 14,
        ),
        'color_contact' => array(
            'slug'          => 'color_contact',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#7496AB',
            'type'          => 'color',
            'label'         => __( 'Contact color', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 15,
        ),
        'background_header' => array(
            'slug'          => 'background_header',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#fff',
            'type'          => 'color',
            'label'         => __( 'Header background', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 16,
        ),
        'color_nav' => array(
            'slug'          => 'color_nav',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#3E4C53',
            'type'          => 'color',
            'label'         => __( 'Menu items', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 17,
        ),
        'color_header_text' => array(
            'slug'          => 'color_header_text',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#fff',
            'type'          => 'color',
            'label'         => __( 'Header text', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 18,
        ),
        'color_left_btn' => array(
            'slug'          => 'color_left_btn',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#fff',
            'type'          => 'color',
            'label'         => __( 'Left button', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 19,
        ),
        'color_right_btn' => array(
            'slug'          => 'color_right_btn',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#22394C',
            'type'          => 'color',
            'label'         => __( 'Right button', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 20,
        ),
        'background_footer' => array(
            'slug'          => 'background_footer',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#22394C',
            'type'          => 'color',
            'label'         => __( 'Footer background', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 21,
        ),
        'color_footer' => array(
            'slug'          => 'color_footer',
            'section'       => 'colors',
            'sanitize'      => 'sanitize_hex_color',
            'default'       => '#7496AB',
            'type'          => 'color',
            'label'         => __( 'Footer color', 'tora' ),
            'description'   => '',
            'choices'       => '',
            'priority'      => 22,
        ),





    );

    foreach ( $controls as $key => $control ) {
        if ($control['type'] != 'number') {
            $wp_customize->add_setting(
                $control['slug'],
                array(
                    'default'           => $control['default'],
                    'sanitize_callback' => $control['sanitize'],
                )
            );
            $wp_customize->add_control(
                $control['slug'],
                array(
                    'type'        => $control['type'],
                    'label'       => $control['label'],
                    'section'     => $control['section'],
                    'description' => $control['description'],
                    'choices'     => $control['choices'],
                    'priority'    => $control['priority'],
                )
            );
        } else {
            $wp_customize->add_setting(
                $control['slug'],
                array(
                    'default'           => $control['default'],
                    'sanitize_callback' => $control['sanitize'],
                )
            );
            $wp_customize->add_control(
                $control['slug'],
                array(
                    'type'        => $control['type'],
                    'label'       => $control['label'],
                    'section'     => $control['section'],
                    'description' => $control['description'],
                    'input_attrs' => array(
                        'min'   => 0,
                        'max'   => 200,
                        'step'  => 1,
                        'style' => '',
                    ),  
                    'priority'    => $control['priority'],                     
                )
            );            
        }
    }

    //Mobile header image
    $wp_customize->add_setting(
        'mobile_header',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mobile_header',
            array(
               'label'          => __( 'Small screens header image', 'tora' ),
               'type'           => 'image',
               'section'        => 'header_image',
               'settings'       => 'mobile_header',
               'description'    => __( 'Add a header image for screen widths smaller than 1024px', 'tora' ),
               'priority'       => 10,
            )
        )
    );

}
add_action( 'customize_register', 'tora_customize_register' );

/**
* Sanitize
*/
//Header type
function tora_sanitize_header( $input ) {
    if ( in_array( $input, array( 'image', 'nothing' ), true ) ) {
        return $input;
    }
}
//Text
function tora_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function tora_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
//Menu
function tora_sanitize_menu_style( $input ) {
    if ( in_array( $input, array( 'inline', 'centered' ), true ) ) {
        return $input;
    }
}
function tora_sanitize_sticky( $input ) {
    if ( in_array( $input, array( 'sticky', 'static' ), true ) ) {
        return $input;
    }
}
function tora_sanitize_menu_position( $input ) {
    if ( in_array( $input, array( 'inside', 'outside' ), true ) ) {
        return $input;
    }
}
//Footer widget areas
function tora_sanitize_fwidgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}
//Blog layout
function tora_sanitize_blog( $input ) {
    if ( in_array( $input, array( 'list', 'fullwidth', 'masonry-layout' ), true ) ) {
        return $input;
    }
}
//Sidebar position
function tora_sanitize_sidebar( $input ) {
    if ( in_array( $input, array( 'left', 'right'), true ) ) {
        return $input;
    }
}
//Footer widget areas
function tora_sanitize_widgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tora_customize_preview_js() {
	wp_enqueue_script( 'tora_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tora_customize_preview_js' );