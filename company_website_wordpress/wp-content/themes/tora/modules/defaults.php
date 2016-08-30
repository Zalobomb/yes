<?php

/**
 * @package tora
 */


/**
 * Module defaults for Live Composer
 */
function tora_live_composer_defaults( $options, $id ) {

    $new_defaults = array();

    if ( $id == 'DSLC_Accordion' ) { 
        $new_defaults = array(
            'accordion_content' => 'Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. (dslc_sep) ',
            'accordion_nav' => __('CLICK TO EDIT  (dslc_sep)  CLICK TO EDIT', 'tora'),
            'css_border_color' => 'transparent',
            'css_spacing' => '5',
            'css_header_border_color' => 'rgb(243, 242, 242)',
            'css_title_color' => 'rgb(62, 76, 83)',
            'css_title_font_size' => '14',
            'css_title_font_weight' => '400',
            'css_title_font_family' => 'Raleway',
            'css_content_border_color' => 'rgb(243, 242, 242)',
            'css_content_color' => 'rgb(148, 150, 162)',
            'css_content_font_size' => '14',
            'css_content_font_family' => 'Lato',
            'css_content_line_height' => '25',
        );
    }
    
    if ( $id == 'DSLC_Blog' ) { 
        $new_defaults = array(
            'amount' => '3',
            'columns' => '4',
            'post_elements' => 'thumbnail title excerpt button',
            'css_wrapper_border_color' => 'transparent',
            'css_main_border_color' => 'rgb(243, 242, 242)',
            'css_main_border_radius_bottom' => '0',
            'css_main_padding_vertical' => '30',
            'css_main_padding_horizontal' => '30',
            'title_color' => 'rgb(62, 76, 83)',
            'title_font_size' => '19',
            'css_title_font_weight' => '400',
            'css_title_font_family' => 'Raleway',
            'title_line_height' => '28',
            'title_margin' => '20',
            'css_excerpt_color' => 'rgb(148, 150, 162)',
            'css_excerpt_font_size' => '14',
            'css_excerpt_font_weight' => '400',
            'css_excerpt_font_family' => 'Lato',
            'css_excerpt_line_height' => '26',
            'button_text' => 'Read more',
            'css_button_bg_color' => 'rgb(237, 90, 90)',
            'css_button_bg_color_hover' => 'rgba(237, 90, 90, 0.9)',
            'css_button_font_size' => '14',
            'css_button_font_weight' => '600',
            'css_button_padding_vertical' => '20',
            'css_button_padding_horizontal' => '35',
            'css_social_bg_color' => 'transparent',
            'css_social_border_color' => 'rgb(243, 242, 242)',
            'css_social_border_width' => '1',
            'css_social_border_trbl' => 'right bottom left ',
            'css_social_padding_vertical' => '15',
            'css_social_color' => 'rgb(148, 150, 162)',
            'css_social_count_border_color' => 'rgb(148, 150, 162)',
            'css_social_count_color' => 'rgb(148, 150, 162)',
            'css_social_count_font_size' => '12',
            'css_social_count_padding_vertical' => '5',
            'css_social_count_padding_horizontal' => '15',
            'css_res_t' => 'enabled',
            'css_res_t_thumb_margin_right' => '0',
            'css_res_t_main_padding_horizontal' => '10',
            'css_res_p' => 'enabled',            
        );
    }

    if ( $id == 'DSLC_Social' ) { 
        $new_defaults = array(
            'css_text_align' => 'center',
            'css_border_color' => 'rgb(237, 90, 90)',
            'css_border_color_hover' => 'rgb(237, 90, 90)',
            'css_border_width' => '2',
            'css_bg_color' => 'rgb(237, 90, 90)',
            'css_bg_color_hover' => 'rgb(255, 255, 255)',
            'css_size' => '52',
            'css_spacing' => '15',
            'css_icon_color_hover' => 'rgb(237, 90, 90)',
            'css_icon_font_size' => '18',
            'css_label_line_height' => '52',
            'css_label_text_transform' => 'uppercase',
        );
    }    

    if ( $id == 'DSLC_Tabs' ) { 
        $new_defaults = array(
            'tabs_content' => __('This is just placeholder text.  (dslc_sep)  This is just placeholder text.  (dslc_sep)  This is just placeholder text.', 'tora'),
            'tabs_nav' => __('Click to edit  (dslc_sep)  Click to edit title  (dslc_sep)  Click to edit title', 'tora'),
            'css_nav_bg_color' => 'rgb(255, 255, 255)',
            'css_nav_border_color' => 'rgb(243, 242, 242)',
            'css_nav_color' => 'rgb(148, 150, 162)',
            'css_nav_font_family' => 'Lato',
            'css_nav_padding_vertical' => '15',
            'css_nav_padding_horizontal' => '15',
            'css_nav_item_margin_right' => '-2',
            'css_nav_active_bg_color' => 'rgb(255, 255, 255)',
            'css_content_border_color' => 'rgb(243, 242, 242)',
            'css_content_padding_vertical' => '30',
            'css_content_padding_horizontal' => '30',
            'css_content_color' => 'rgb(148, 150, 162)',
            'css_content_font_size' => '14',
            'css_content_font_family' => 'Lato',
            'css_content_line_height' => '24',
            'css_content_margin_bottom' => '22',
            'css_h1_font_family' => 'Raleway',
            'css_h2_font_family' => 'Raleway',
            'css_h3_font_family' => 'Raleway',
            'css_h4_font_family' => 'Raleway',
            'css_h5_font_family' => 'Raleway',
            'css_h6_font_family' => 'Raleway',
        );
    }

    if ( $id == 'DSLC_Testimonials' ) { 
        $new_defaults = array(
            'type' => 'carousel',
            'amount' => '4',
            'columns' => '12',
            'carousel_elements' => 'circles ',
            'css_main_bg_color' => 'transparent',
            'css_main_border_color' => 'rgb(243, 243, 243)',
            'css_main_border_width' => '0',
            'css_main_border_trbl' => 'top right bottom left ',
            'css_main_padding_vertical' => '30',
            'css_quote_border_color' => 'rgba(212, 212, 212, 0.2)',
            'css_quote_border_trbl' => 'bottom ',
            'css_quote_color' => 'rgb(148, 150, 162)',
            'css_quote_font_size' => '16',
            'css_quote_font_weight' => '400',
            'css_quote_font_family' => 'Lato',
            'css_quote_line_height' => '28',
            'css_name_color' => 'rgb(148, 150, 162)',
            'css_name_font_weight' => '500',
            'css_name_font_family' => 'Lato',
            'css_name_margin_bottom' => '15',
            'css_position_color' => 'rgb(148, 150, 162)',
            'css_position_font_family' => 'Lato',
            'css_circles_color' => 'rgb(235, 237, 246)',
            'css_circles_color_active' => 'rgb(237, 90, 90)',
            'css_circles_size' => '12',
            'css_circles_spacing' => '5',
        );
    } 

    if ( $id == 'DSLC_Partners' ) { 
        $new_defaults = array(
            'post_elements' => 'thumbnail ',
            'css_thumb_align' => 'center',
            'css_thumbnail_bg_color' => 'transparent',
            'css_thumbnail_border_color' => 'transparent',
            'css_thumbnail_margin_bottom' => '15',
            'css_thumbnail_padding_vertical' => '0',
            'thumb_width' => '80',
        );
    }

    if ( $id == 'DSLC_Progress_Bars' ) { 
        $new_defaults = array(
            'label' => __('STRATEGY', 'tora'),
            'amount' => '75',
            'css_wrapper_padding_vertical' => '15',
            'css_label_color' => 'rgb(148, 150, 162)',
            'css_label_font_size' => '14',
            'css_label_font_weight' => '300',
            'css_label_font_family' => 'Roboto',
            'css_label_margin' => '10',
            'css_loader_border_radius' => '0',
            'css_loader_color' => 'rgb(34, 57, 76)',
            'css_loader_bg_color' => 'rgb(236, 236, 236)',
        );
    }   

    if ( $id == 'DSLC_Projects' ) { 
        $new_defaults = array(
            'type' => 'grid',
            'amount' => '4',
            'carousel_elements' => 'circles ',
            'css_sep_border_color' => 'rgb(255, 255, 255)',
            'css_sep_height' => '15',
            'css_sep_thickness' => '0',
            'css_sep_style' => 'none',
            'css_thumb_align' => 'center',
            'css_thumbnail_border_radius_top' => '0',
            'css_thumbnail_padding_horizontal' => '5',
            'thumb_resize_width_manual' => '300',
            'main_location' => 'inside',
            'css_main_bg_color' => 'rgba(255, 255, 255, 0.8)',
            'css_main_border_color' => 'transparent',
            'css_main_border_trbl' => 'top right bottom left ',
            'css_main_padding_vertical' => '10',
            'css_main_padding_horizontal' => '10',
            'css_title_color' => 'rgb(62, 76, 83)',
            'css_title_font_size' => '14',
            'css_title_font_weight' => '300',
            'css_title_font_family' => 'Raleway',
            'css_title_line_height' => '14',
            'css_cats_font_size' => '12',
            'css_cats_font_family' => 'Lato',
            'css_cats_line_height' => '14',
            'carousel_autoplay' => '4000',
            'css_arrows_bg_color' => 'transparent',
            'css_arrows_bg_color_hover' => 'rgb(237, 90, 90)',
            'css_arrows_border_color' => 'rgb(237, 90, 90)',
            'css_arrows_border_width' => '1',
            'css_arrows_color' => 'rgb(237, 90, 90)',
            'css_arrows_color_hover' => 'rgb(255, 255, 255)',
            'css_arrows_margin_top' => '0',
            'css_arrows_size' => '30',
            'css_arrows_arrow_size' => '14',
            'css_arrows_margin_bottom' => '30',
            'css_circles_color' => 'rgb(235, 237, 246)',
            'css_circles_color_active' => 'rgb(237, 90, 90)',
            'css_circles_size' => '12',
            'css_circles_spacing' => '5',
            'css_anim_hover' => 'dslcFadeIn',
            'css_anim_speed' => '350',
        );
    }  

    if ( $id == 'DSLC_Staff' ) { 
        $new_defaults = array(
            'post_elements' => 'thumbnail social title position ',
            'css_margin_bottom' => '60',
            'css_sep_height' => '30',
            'css_sep_style' => 'none',
            'css_thumbnail_margin_bottom' => '15',
            'css_thumbnail_padding_horizontal' => '40',
            'thumb_resize_width_manual' => '300',
            'css_social_bg_color' => 'rgb(34, 57, 76)',
            'css_social_border_color' => 'rgb(243, 243, 243)',
            'css_social_border_trbl' => 'right bottom left ',
            'css_social_color' => 'rgb(116, 150, 171)',
            'css_social_font_size' => '14',
            'main_location' => 'inside',
            'css_main_bg_color' => 'rgba(255, 255, 255, 0.8)',
            'css_main_border_width' => '0',
            'css_main_border_radius_bottom' => '0',
            'css_main_padding_vertical' => '0',
            'css_main_padding_horizontal' => '10',
            'css_title_color' => 'rgb(62, 76, 83)',
            'css_title_font_size' => '16',
            'css_title_font_weight' => '400',
            'css_title_font_family' => 'Raleway',
            'css_title_line_height' => '27',
            'css_title_margin_bottom' => '0',
            'css_position_border_color' => 'transparent',
            'css_position_border_width' => '0',
            'css_position_border_trbl' => '',
            'css_position_color' => 'rgb(148, 150, 162)',
            'css_position_font_size' => '14',
            'css_position_font_weight' => '300',
            'css_position_font_family' => 'Lato',
            'css_position_margin_bottom' => '0',
            'css_position_padding_vertical' => '15',
            'css_anim_hover' => 'dslcSlideRightFadeIn',
            'css_anim_speed' => '400',
        );
    }  
    
    if ( $id == 'DSLC_Text_Simple' ) { 
        $new_defaults = array(
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
            'css_main_color' => 'rgb(148, 150, 162)',
            'css_main_font_size' => '14',
            'css_main_font_family' => 'Lato',
            'css_main_letter_spacing' => '2',
            'css_main_line_height' => '25',
            'css_h4_color' => 'rgb(62, 76, 83)',
            'css_h4_letter_spacing' => '5',
            'css_h4_margin_bottom' => '20',
            'css_h4_text_align' => 'center',
        );
    }

    if ( $id == 'DSLC_Info_Box' ) { 
        $new_defaults = array(
            'elements' => 'icon title content ',
            'css_bg_color' => 'rgba(0, 0, 0, 0.05)',
            'css_border_color' => 'rgba(255, 255, 255, 0.05)',
            'css_border_width' => '1',
            'css_margin_bottom' => '30',
            'css_padding_vertical' => '30',
            'css_padding_horizontal' => '30',
            'css_box_shadow_hover' => '0px 0px 5px 2px rgb(20,36,49)',
            'css_icon_text_align' => 'left',
            'css_icon_bg_color' => 'transparent',
            'css_icon_border_color' => 'transparent',
            'css_icon_border_trbl' => 'top right bottom left ',
            'css_icon_border_radius' => '0',
            'css_icon_color' => 'rgb(237, 90, 90)',
            'icon_id' => 'ei-icon_house_alt',
            'css_icon_margin_top' => '-15',
            'css_icon_margin_right' => '24',
            'icon_position' => 'aside',
            'css_icon_wrapper_width' => '64',
            'css_icon_width' => '40',
            'css_icon_box_shadow' => '0px 0px 0px 0px transparent',
            'css_title_text_align' => 'left',
            'css_title_color' => 'rgb(62, 76, 83)',
            'css_title_font_size' => '18',
            'css_title_font_weight' => '400',
            'css_title_font_family' => 'Raleway',
            'css_title_line_height' => '23',
            'css_title_margin' => '20',
            'css_content_text_align' => 'left',
            'css_content_color' => 'rgb(116, 150, 171)',
            'css_content_line_height' => '25',
            'css_content_margin' => '0',
            'css_button_bg_color' => 'rgb(148, 94, 222)',
            'css_button_bg_color_hover' => 'rgba(255, 255, 255, 0)',
            'css_button_border_width' => '2',
            'css_button_border_color' => 'rgb(148, 94, 222)',
            'css_button_border_color_hover' => 'rgb(148, 94, 222)',
            'css_button_color_hover' => 'rgb(151, 90, 236)',
            'css_button_font_size' => '13',
            'css_button_font_family' => 'Lato',
            'title' => __('Service title', 'tora'),
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a mollis quam.</p>',
            'css_res_t' => 'enabled',
            'css_res_t_padding_vertical' => '10',
            'css_res_t_padding_horizontal' => '10',
            'css_res_t_icon_margin_top' => '-15',
            'css_res_t_icon_wrapper_width' => '60',
            'css_res_t_icon_width' => '24',
            'css_res_t_title_margin' => '15',
            'css_res_t_content_margin' => '10',
            'css_res_p' => 'enabled',
            'css_res_p_padding_vertical' => '16',
            'css_res_p_padding_horizontal' => '10',
            'css_res_p_icon_margin_top' => '-14',
            'css_res_p_icon_wrapper_width' => '60',
            'css_res_p_icon_width' => '24',
            'css_res_p_content_margin' => '10',            
        );
    }   

    if ( $id == 'DSLC_TP_Staff_Social' ) { 
        $new_defaults = array(
            'css_bg_color' => 'rgb(237, 90, 90)',
            'css_bg_color_hover' => 'rgb(237, 90, 90)',
            'css_margin_bottom' => '15',
            'css_size' => '34',
            'css_spacing' => '15',
            'css_icon_font_size' => '16',
        );
    } 
    
    if ( $id == 'DSLC_TP_Project_Slider' ) { 
        $new_defaults = array(
            'animation' => 'false',
            'lightbox_state' => 'enabled',
            'css_slider_item_border_radius_top' => '0',
            'css_circles_color' => 'rgb(223, 223, 223)',
            'css_circles_color_active' => 'rgb(237, 90, 90)',
            'css_circles_size' => '10',
            'css_circles_spacing' => '5',
        );
    }                    

    return dslc_set_defaults( $new_defaults, $options );
 
} 
add_filter( 'dslc_module_options', 'tora_live_composer_defaults', 10, 2 );