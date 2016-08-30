<?php
/**
 * 8Medi Lite Theme Customizer Custom
 *
 * @package 8Medi Lite
 */

/**
 * Add new options the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eightmedi_lite_custom_customize_register( $wp_customize ) {
	//Adding the Default Setup Panel
	$wp_customize->add_panel('eightmedi_lite_default_setups',array(
		'priority' => '10',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Default Setups','eightmedi-lite'),
		));	

	//Add Default Sections to General Panel
	$wp_customize->get_section('title_tagline')->panel = 'eightmedi_lite_default_setups'; //priority 20
	$wp_customize->get_section('colors')->panel = 'eightmedi_lite_default_setups'; //priority 40
	$wp_customize->get_section('header_image')->panel = 'eightmedi_lite_default_setups'; //priority 60
	$wp_customize->get_section('background_image')->panel = 'eightmedi_lite_default_setups'; //priority 80
	$wp_customize->get_section('static_front_page')->panel = 'eightmedi_lite_default_setups'; //priority 120

	//Adding the General Setup Panel
	$wp_customize->add_panel('eightmedi_lite_general_setups',array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('General Setups','eightmedi-lite'),
		'description' => __('Manage General Setups for the site','eightmedi-lite')
		));

	//Webpage layout
	$wp_customize->add_section('eightmedi_lite_webpage_layout', array(
		'priority' => 10,
		'title' => __('Webpage Layout', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_general_setups'
		));
	$wp_customize->add_setting('eightmedi_lite_webpage_layout', array(
		'default' => 'fullwidth',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_webpagelayout',
		));

	$wp_customize->add_control('eightmedi_lite_webpage_layout', array(
		'type' => 'radio',
		'label' => __('Choose the layout that you want', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_webpage_layout',
		'setting' => 'eightmedi_lite_webpage_layout',
		'choices' => array(
			'fullwidth' => __('Full Width', 'eightmedi-lite'),
			'boxed' => __('Boxed', 'eightmedi-lite')
			)
		));

	$wp_customize->add_section('eightmedi_lite_top_header_callto',array(
		'title' => __('Top Header Call-To','eightmedi-lite'),
		'priority' => '20',
		'panel' => 'eightmedi_lite_general_setups'
		));

	$wp_customize->add_setting('eightmedi_lite_top_header_setting',array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_lite_top_header_setting',array(
		'type' => 'radio',
		'label' => __('Enable Top Header','eightmedi-lite'),
		'description' => __('Selecting No will Hide Top Header','eightmedi-lite'),
		'section' => 'eightmedi_lite_top_header_callto',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));

	$wp_customize->add_setting('eightmedi_lite_callto_text',array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));
	$wp_customize->add_control('eightmedi_lite_callto_text',array(
		'type' => 'textarea',
		'label' => __('Call To Content  - Left','eightmedi-lite'),
		'description' => __('Enter text or HTML for call to action','eightmedi-lite'),
		'section' => 'eightmedi_lite_top_header_callto'
		));

	$wp_customize->add_setting('eightmedi_lite_callto_text_right',array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));
	$wp_customize->add_control('eightmedi_lite_callto_text_right',array(
		'type' => 'textarea',
		'label' => __('Call To Content  - Right','eightmedi-lite'),
		'description' => __('Enter text or HTML for call to action','eightmedi-lite'),
		'section' => 'eightmedi_lite_top_header_callto'
		));

	$wp_customize->add_section('eightmedi_lite_header_search',array(
		'title' => __('Header Search Setting','eightmedi-lite'),
		'priority' => '30',
		'panel' => 'eightmedi_lite_general_setups'
		));
	$wp_customize->add_setting('eightmedi_lite_hide_header_search',array(
		'default' => '0',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_lite_hide_header_search',array(
		'type' => 'radio',
		'label' => __('Hide Search From Header','eightmedi-lite'),
		'description' => __('Selecting Yes will Hide Search Bar From Header','eightmedi-lite'),
		'section' => 'eightmedi_lite_header_search',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));

	$wp_customize->add_section('eightmedi_lite_logo_alignment',array(
		'title' => __('Header Logo Alignment Setting','eightmedi-lite'),
		'priority' => '40',
		'panel' => 'eightmedi_lite_general_setups'
		));

	$wp_customize->add_setting('eightmedi_lite_logo_alignment_setting',array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));
	$wp_customize->add_control('eightmedi_lite_logo_alignment_setting',array(
		'type' => 'radio',
		'label' => __('Logo Alignment','eightmedi-lite'),
		'section' => 'eightmedi_lite_logo_alignment',
		'choices' => array(
			'1' => __('Default (Left Align)','eightmedi-lite'),
			'0' => __('Center Align','eightmedi-lite')
			)
		));

	//Adding the Homepage Setup Panel
	$wp_customize->add_panel('eightmedi_lite_homepage_setups',array(
		'priority' => '30',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Homepage Setups','eightmedi-lite'),		
		));
	
	//Adding the Slider Setup Panel
	$wp_customize->add_section('eightmedi_lite_slider_setups',array(
		'priority' => '10',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __('Slider Setups','eightmedi-lite'),
		'description' => __('Manage Slides for the site','eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups'
		));

	$wp_customize->add_setting('eightmedi_lite_display_slider', array(
		'default' => '1',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer'
		));

	$wp_customize->add_control('eightmedi_lite_display_slider',array(
		'type' => 'radio',
		'label' => __('Display Slider', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));

   	//select category for slider
	$wp_customize->add_setting('eightmedi_lite_slider_category',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new Eightmedi_Lite_WP_Customize_Category_Control( $wp_customize,'eightmedi_lite_slider_category', array(
		'label' => __('Select a category to show in slider','eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		)));

	//slider pager
	$wp_customize->add_setting('eightmedi_lite_display_pager', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_display_pager',array(
		'type' => 'radio',
		'label' => __('Display Pager', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));
	//slider controls
	$wp_customize->add_setting('eightmedi_lite_display_controls', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_display_controls',array(
		'type' => 'radio',
		'label' => __('Display Controls', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));
	//slider auto transition
	$wp_customize->add_setting('eightmedi_lite_auto_transition', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_auto_transition',array(
		'type' => 'radio',
		'label' => __('Enable Auto Transition', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));
	//slider transitiontype
	$wp_customize->add_setting('eightmedi_lite_transition_type', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_transition_type',array(
		'type' => 'radio',
		'label' => __('Transition Type', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Slide','eightmedi-lite'),
			'0' => __('Fade','eightmedi-lite')
			)
		));
	//slider caption
	$wp_customize->add_setting('eightmedi_lite_slider_text', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_slider_text',array(
		'type' => 'radio',
		'label' => __('Display Text in Slider', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			)
		));

	//slider transition speed
	$wp_customize->add_setting('eightmedi_lite_transition_speed', array(
		'default' => '2000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		));

	$wp_customize->add_control('eightmedi_lite_transition_speed',array(
		'type' => 'number',
		'label' => __('Transition Speed', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		));
	//slider transition pause
	$wp_customize->add_setting('eightmedi_lite_transition_pause', array(
		'default' => '1000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
		));

	$wp_customize->add_control('eightmedi_lite_transition_pause',array(
		'type' => 'number',
		'label' => __('Slide Pause Time', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		));

	//slider bottom cta button
	$wp_customize->add_setting('eightmedi_lite_slider_cta_btntext', array(
		'default' => __('BOOK AN APPOINTMENT','eightmedi-lite'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_slider_cta_btntext',array(
		'type' => 'text',
		'label' => __('Slider CTA Button Text', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		));

	//slider bottom cta button link
	$wp_customize->add_setting('eightmedi_lite_slider_cta_btnlink', array(
		'default' => '#book-an-appointment',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_slider_cta_btnlink',array(
		'type' => 'text',
		'label' => __('Slider CTA Button Link', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_slider_setups',
		));


	//featured Section
	$wp_customize->add_section('eightmedi_lite_featured_section', array(
		'priority' => 60,
		'title' => __('Featured Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable featured section
	$wp_customize->add_setting('eightmedi_lite_featured_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_featured_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Featured Section', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_featured_section',
		'setting' => 'eightmedi_lite_featured_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));

   //featured Title
	$wp_customize->add_setting('eightmedi_lite_featured_title', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_featured_title',array(
		'type' => 'text',
		'label' => __('Latest featured Title','eightmedi-lite'),
		'section' => 'eightmedi_lite_featured_section',
		'setting' => 'eightmedi_lite_featured_title'
		));

     //select category for featured
	$wp_customize->add_setting('eightmedi_lite_featured_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new Eightmedi_Lite_WP_Customize_Category_Control( $wp_customize,'eightmedi_lite_featured_setting_category', array(
		'label' => __('Select a Category to show in featured Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_featured_section',
		'setting' => 'eightmedi_lite_featured_setting_category'
		)));

	//here goes book an appointment
	$wp_customize->add_section('eightmedi_lite_appointment_section', array(
		'priority' => 60,
		'title' => __('Book an Appointment Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable Book an Appointment section
	$wp_customize->add_setting('eightmedi_lite_appointment_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_appointment_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Book an Appointment', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_appointment_section',
		'setting' => 'eightmedi_lite_appointment_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //Book an Appointment Title
	$wp_customize->add_setting('eightmedi_lite_appointment_title', array(
		'default' => 'Book An Appointment',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_appointment_title',array(
		'type' => 'text',
		'label' => __('Book an Appointment Title','eightmedi-lite'),
		'section' => 'eightmedi_lite_appointment_section',
		'setting' => 'eightmedi_lite_appointment_title'
		));

    //Book an Appointment section description
	$wp_customize->add_setting('eightmedi_lite_appointment_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_appointment_desc',array(
		'type' => 'textarea',
		'label' => __('Book an Appointment Description','eightmedi-lite'),
		'section' => 'eightmedi_lite_appointment_section',
		'setting' => 'eightmedi_lite_appointment_desc'
		));

	if ( class_exists( 'UFBL_Class' ) ) {

    //Book an Appointment link
		$wp_customize->add_setting('eightmedi_lite_appointment_formid', array(
			'default' => '',
			'sanitize_callback' => 'eightmedi_lite_sanitize_text',
			));

		$wp_customize->add_control('eightmedi_lite_appointment_formid',array(
			'type' => 'text',
			'label' => __('Book an Appointment Custom Form Id','eightmedi-lite'),
			'description' => __('Enter shortcode for Custom Form Id','eightmedi-lite'),
			'section' => 'eightmedi_lite_appointment_section', 
			'setting' => 'eightmedi_lite_appointment_formid'
			));
	}

   //Book an Appointment background image
	$wp_customize->add_setting('eightmedi_lite_appointment_bkgimage', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_lite_appointment_bkgimage', array(
		'label' => __('Background Image for Book an Appointment', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_appointment_section',
		'setting' => 'eightmedi_lite_appointment_bkgimage'
		)));

	//homepage about us section
	$wp_customize->add_section('eightmedi_lite_about_section', array(
		'priority' => 60,
		'title' => __('About Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable about us section
	$wp_customize->add_setting('eightmedi_lite_about_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_about_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable About Us Section', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_about_section',
		'setting' => 'eightmedi_lite_about_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));

	$options_posts = array();
	$options_posts_obj = get_posts('posts_per_page=-1');
	$options_posts[''] = 'Select a Post:';
	foreach ($options_posts_obj as $post) {
		$options_posts[$post->ID] = $post->post_title;
	}
   //select post for about us
	$wp_customize->add_setting('eightmedi_lite_about_setting_post',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control('eightmedi_lite_about_setting_post', array(
		'type' => 'select',
		'label' => __('Select a Post to show in About Us Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_about_section',
		'setting' => 'eightmedi_lite_about_setting_option',
		'choices' => $options_posts
		));

   //about us view more text
	$wp_customize->add_setting('eightmedi_lite_aboutus_viewmore_text', array(
		'default' => 'Details',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_aboutus_viewmore_text',array(
		'type' => 'text',
		'label' => __('About View More Text','eightmedi-lite'),
		'section' => 'eightmedi_lite_about_section',
		'setting' => 'eightmedi_lite_aboutus_viewmore_text'
		));

	//Team Member Section
	$wp_customize->add_section('eightmedi_lite_teammember_section', array(
		'priority' => 70,
		'title' => __('Team Member Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable teammember section
	$wp_customize->add_setting('eightmedi_lite_teammember_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_teammember_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Team Member', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //Team member Title
	$wp_customize->add_setting('eightmedi_lite_teammember_title', array(
		'default' => 'Team Member',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_teammember_title',array(
		'type' => 'text',
		'label' => __('Team Memeber Title','eightmedi-lite'),
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_title'
		));

	//Team member Desc
	$wp_customize->add_setting('eightmedi_lite_teammember_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_teammember_desc',array(
		'type' => 'textarea',
		'label' => __('Team Memeber Description','eightmedi-lite'),
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_desc'
		));

     //select category for team member
	$wp_customize->add_setting('eightmedi_lite_teammember_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new Eightmedi_Lite_WP_Customize_Category_Control( $wp_customize,'eightmedi_lite_teammember_setting_category', array(
		'label' => 'Select a Category to show in Team Member Section',
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_setting_category'
		)));

   //Team Member button enable disable
	$wp_customize->add_setting('eightmedi_lite_teammember_button_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_teammember_button_option', array(
		'type' => 'radio',
		'label' => __('Display Button for Category Page', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_button_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));

   //Team Member Button View more text
	$wp_customize->add_setting('eightmedi_lite_teammember_button_text', array(
		'default' => __('View More','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_teammember_button_text',array(
		'type' => 'text',
		'label' => __('Button Text','eightmedi-lite'),
		'section' => 'eightmedi_lite_teammember_section',
		'setting' => 'eightmedi_lite_teammember_button_text'
		));


	//Call To Action Section

	$wp_customize->add_section('eightmedi_lite_callto_section', array(
		'priority' => 70,
		'title' => __('Call To Action Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable call to action section
	$wp_customize->add_setting('eightmedi_lite_callto_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_callto_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Call To Action', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //call to action Title
	$wp_customize->add_setting('eightmedi_lite_callto_title', array(
		'default' => '8medi lite',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_callto_title',array(
		'type' => 'text',
		'label' => __('Call To Action Title','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_title'
		));

    //call to section description
	$wp_customize->add_setting('eightmedi_lite_callto_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_callto_desc',array(
		'type' => 'textarea',
		'label' => __('Call To Description','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_desc'
		));

    //call to action read more
	$wp_customize->add_setting('eightmedi_lite_callto_readmore', array(
		'default' => __('Join','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_callto_readmore',array(
		'type' => 'text',
		'label' => __('Call To Action Read More Text','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_readmore'
		));

   //call to action link
	$wp_customize->add_setting('eightmedi_lite_callto_link', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		
		));

	$wp_customize->add_control('eightmedi_lite_callto_link',array(
		'type' => 'text',
		'label' => __('Call To Action Link','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_link'
		));
   //call to action background image
	$wp_customize->add_setting('eightmedi_lite_callto_bkgimage', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_lite_callto_bkgimage', array(
		'label' => __('Image for Call to Action', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_section',
		'setting' => 'eightmedi_lite_callto_bkgimage'
		)));

	//latest news Section
	$wp_customize->add_section('eightmedi_lite_news_section', array(
		'priority' => 70,
		'title' => __('Latest News Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable news section
	$wp_customize->add_setting('eightmedi_lite_news_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_news_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable News Section', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //News Title
	$wp_customize->add_setting('eightmedi_lite_news_title', array(
		'default' => __('Our Journal','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_news_title',array(
		'type' => 'text',
		'label' => __('News Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_title'
		));

	//News Desc
	$wp_customize->add_setting('eightmedi_lite_news_desc', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_news_desc',array(
		'type' => 'textarea',
		'label' => __('News Section Description','eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_desc'
		));

     //select category for news
	$wp_customize->add_setting('eightmedi_lite_news_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new Eightmedi_Lite_WP_Customize_Category_Control( $wp_customize,'eightmedi_lite_news_setting_category', array(
		'label' => __('Select a Category to show in latest news Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_setting_category'
		)));

   //news button enable disable
	$wp_customize->add_setting('eightmedi_lite_news_button_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_news_button_option', array(
		'type' => 'radio',
		'label' => __('Display Button for Category Page', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_button_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));

   //news Button View more text
	$wp_customize->add_setting('eightmedi_lite_news_button_text', array(
		'default' => __('View More','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_news_button_text',array(
		'type' => 'text',
		'label' => __('Button Text','eightmedi-lite'),
		'section' => 'eightmedi_lite_news_section',
		'setting' => 'eightmedi_lite_news_button_text'
		));

	//here goes sponsers section
	//sponsers Section
	$wp_customize->add_section('eightmedi_lite_sponsers_section', array(
		'priority' => 70,
		'title' => __('Our Sponsers Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable sponsers section
	$wp_customize->add_setting('eightmedi_lite_sponsers_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_sponsers_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Sponsers Section', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_sponsers_section',
		'setting' => 'eightmedi_lite_sponsers_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //sponsers Title
	$wp_customize->add_setting('eightmedi_lite_sponsers_title', array(
		'default' => __('Our Sponsors','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_sponsers_title',array(
		'type' => 'text',
		'label' => __('Sponsors Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_sponsers_section',
		'setting' => 'eightmedi_lite_sponsers_title'
		));

	//select category for sponsers
	$wp_customize->add_setting('eightmedi_lite_sponsers_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
		));

	$wp_customize->add_control( new Eightmedi_Lite_WP_Customize_Category_Control( $wp_customize,'eightmedi_lite_sponsers_setting_category', array(
		'label' => __('Select a Category to show in  sponsers Section','eightmedi-lite'),
		'section' => 'eightmedi_lite_sponsers_section',
		'setting' => 'eightmedi_lite_sponsers_setting_category'
		)));


	//Small Call To Action Section

	$wp_customize->add_section('eightmedi_lite_callto_small_section', array(
		'priority' => 140,
		'title' => __('Small Call To Action Section', 'eightmedi-lite'),
		'panel' => 'eightmedi_lite_homepage_setups',
		));

    //enable disable call to action section
	$wp_customize->add_setting('eightmedi_lite_callto_small_setting_option', array(
		'default' => 'disable',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_radio_sanitize_enabledisable',
		));

	$wp_customize->add_control('eightmedi_lite_callto_small_setting_option', array(
		'type' => 'radio',
		'label' => __('Enable Disable Small Call To Action', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_small_section',
		'setting' => 'eightmedi_lite_callto_small_setting_option',
		'choices' => array(
			'enable' => __('Enable', 'eightmedi-lite'),
			'disable' => __('Disable', 'eightmedi-lite'),
			)
		));


   //call to action Title
	$wp_customize->add_setting('eightmedi_lite_callto_small_title', array(
		'default' => __('Make Your Appointment Today','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		));

	$wp_customize->add_control('eightmedi_lite_callto_small_title',array(
		'type' => 'text',
		'label' => __('Small Call To Action Title','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_small_section',
		'setting' => 'eightmedi_lite_callto_small_title'
		));

    //call to action read more
	$wp_customize->add_setting('eightmedi_lite_callto_readmore_small', array(
		'default' => __('Book Now','eightmedi-lite'),
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		'transport' => 'postMessage'
		));

	$wp_customize->add_control('eightmedi_lite_callto_readmore_small',array(
		'type' => 'text',
		'label' => __('Small Call To Action Read More Text','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_small_section',
		'setting' => 'eightmedi_lite_callto_readmore_small'
		));

   //call to action link
	$wp_customize->add_setting('eightmedi_lite_callto_link_small', array(
		'default' => '',
		'sanitize_callback' => 'eightmedi_lite_sanitize_text',
		
		));

	$wp_customize->add_control('eightmedi_lite_callto_link_small',array(
		'type' => 'text',
		'label' => __('Call To Action Link','eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_small_section',
		'setting' => 'eightmedi_lite_callto_link_small'
		));
   //call to action background image
	$wp_customize->add_setting('eightmedi_lite_callto_bkgimage_small', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
		));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'eightmedi_lite_callto_bkgimage_small', array(
		'label' => __('Image for Small Call to Action', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_callto_small_section',
		'setting' => 'eightmedi_lite_callto_bkgimage_small'
		)));

	//Google Map Section
	$wp_customize->add_section('eightmedi_lite_google_map_section',array(
		'title' => __( 'Google Map', 'eightmedi-lite' ),
		'priority' => 140,
		'panel' => 'eightmedi_lite_homepage_setups',
		));

	$wp_customize->add_setting('eightmedi_lite_contact_address',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

	$wp_customize->add_control( 'eightmedi_lite_contact_address',array(
		'label' => __( 'Contact Address', 'eightmedi-lite' ),
		'section' => 'eightmedi_lite_google_map_section',
		'description' => __( "Enter the Contact Address Detail, add google map from widgets section", 'eightmedi-lite' ),
		'type' => 'textarea',
		));


	//end of Homepage section

	//Social Settings Section
	$wp_customize->add_section('eightmedi_lite_social_setting', array(
		'priority' => 70,
		'title' => __('Social Links Section', 'eightmedi-lite'),
		));

    //socail setting in header
	$wp_customize->add_setting('eightmedi_lite_social_icons_in_header', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_social_icons_in_header', array(
		'type' => 'radio',
		'label' => __('Display Social Icons in Header', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			),
		));

	$wp_customize->add_setting('eightmedi_lite_social_icons_in_footer', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eightmedi_lite_sanitize_radio_integer',
		));

	$wp_customize->add_control('eightmedi_lite_social_icons_in_footer', array(
		'type' => 'radio',
		'label' => __('Display Social Icons in Footer', 'eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		'choices' => array(
			'1' => __('Yes','eightmedi-lite'),
			'0' => __('No','eightmedi-lite')
			),
		));

   //social facebook link
	$wp_customize->add_setting('eightmedi_lite_social_facebook', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_facebook',array(
		'type' => 'text',
		'label' => __('Facebook','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social twitter link
	$wp_customize->add_setting('eightmedi_lite_social_twitter', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_twitter',array(
		'type' => 'text',
		'label' => __('Twitter','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social googleplus link
	$wp_customize->add_setting('eightmedi_lite_social_googleplus', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_googleplus',array(
		'type' => 'text',
		'label' => __('Google Plus','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

     //social youtube link
	$wp_customize->add_setting('eightmedi_lite_social_youtube', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_youtube',array(
		'type' => 'text',
		'label' => __('YouTube','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

     //social pinterest link
	$wp_customize->add_setting('eightmedi_lite_social_pinterest', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_pinterest',array(
		'type' => 'text',
		'label' => __('Pinterest','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social linkedin link
	$wp_customize->add_setting('eightmedi_lite_social_linkedin', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_linkedin',array(
		'type' => 'text',
		'label' => __('Linkedin','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social vimeo link
	$wp_customize->add_setting('eightmedi_lite_social_vimeo', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_vimeo',array(
		'type' => 'text',
		'label' => __('Vimeo','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social instagram link
	$wp_customize->add_setting('eightmedi_lite_social_instagram', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_instagram',array(
		'type' => 'text',
		'label' => __('Instagram','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

    //social skype link
	$wp_customize->add_setting('eightmedi_lite_social_skype', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('eightmedi_lite_social_skype',array(
		'type' => 'text',
		'label' => __('Skype','eightmedi-lite'),
		'section' => 'eightmedi_lite_social_setting',
		));

}
add_action( 'customize_register', 'eightmedi_lite_custom_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eightmedi_lite_custom_customize_preview_js() {
	wp_enqueue_script( 'eightmedi_lite_custom_customizer', get_template_directory_uri() . '/js/eightmedi-customizer.js', array( 'customize-preview' ), '20150715', true );
}
add_action( 'customize_preview_init', 'eightmedi_lite_custom_customize_preview_js' );
