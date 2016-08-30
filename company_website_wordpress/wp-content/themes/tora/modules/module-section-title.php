<?php
/**
 * @package tora
 */

// Check if Live Composer is active
if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {


    function tora_section_title_module_init() {
        dslc_register_module( 'Tora_Section_Title' );
    } 
    add_action( 'dslc_hook_register_modules', 'tora_section_title_module_init' );

    class Tora_Section_Title extends DSLC_Module {
            
            function __construct() {
                $this->module_id = 'Tora_Section_Title';
                $this->module_title = __( 'Section title', 'tora' );
                $this->module_icon = 'file';
                $this->module_category = 'elements';
            }
     
            function options() {

                $dslc_options = array(

                    array(
                        'label' => __( 'Title', 'tora' ),
                        'id' => 'section_title',
                        'std' => 'Section title',
                        'type' => 'text',
                        'refresh_on_change' => true,
                    ),
                    //Styling
                    array(
                        'label' => __( 'Title color', 'tora' ),
                        'id' => 'css_title_color',
                        'std' => '#3E4C53',
                        'type' => 'color',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'color',
                        'section' => 'styling',
                    ),                    
                    array(
                        'label' => __( 'Font Size', 'tora' ),
                        'id' => 'css__font_size',
                        'std' => '36',
                        'type' => 'slider',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'font-size',
                        'section' => 'styling',
                        'ext' => 'px'
                    ),
                    array(
                        'label' => __( 'Font Weight', 'tora' ),
                        'id' => 'css_font_weight',
                        'std' => '400',
                        'type' => 'slider',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'font-weight',
                        'section' => 'styling',
                        'ext' => '',
                        'min' => 100,
                        'max' => 900,
                        'increment' => 100
                    ),
                    array(
                        'label' => __( 'Font Family', 'tora' ),
                        'id' => 'css_font_family',
                        'std' => 'Raleway',
                        'type' => 'font',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'font-family',
                        'section' => 'styling',
                    ),
                    array(
                        'label' => __( 'Letter Spacing', 'tora' ),
                        'id' => 'css_main_letter_spacing',
                        'std' => '5',
                        'type' => 'slider',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'letter-spacing',
                        'section' => 'styling',
                        'ext' => 'px',
                        'min' => -50,
                        'max' => 50
                    ),
                    array(
                        'label' => __( 'Line Height', 'tora' ),
                        'id' => 'css_main_line_height',
                        'std' => '48',
                        'type' => 'slider',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-section-title',
                        'affect_on_change_rule' => 'line-height',
                        'section' => 'styling',
                        'ext' => 'px'
                    ),                  
                    array(
                        'label' => __( 'Margin Bottom', 'tora' ),
                        'id' => 'css_main_margin_bottom',
                        'std' => '75',
                        'type' => 'slider',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.tora-title-module',
                        'affect_on_change_rule' => 'margin-bottom',
                        'section' => 'styling',
                        'ext' => 'px',
                    ),                    
                    array(
                        'label' => __( 'Decoration color', 'tora' ),
                        'id' => 'css_deco_color',
                        'std' => '#D2D7DE',
                        'type' => 'color',
                        'refresh_on_change' => false,
                        'affect_on_change_el' => '.bottom-deco,.top-left-deco,.top-right-deco',
                        'affect_on_change_rule' => 'background-color',
                        'section' => 'styling',
                    ),                       
                );

                $dslc_options = array_merge( $dslc_options, $this->presets_options() );

                return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

            }
     
        // Module Output
            function output( $options ) {

                $this->module_start( $options );


                /* Module output stars here */

                ?>
                <div class="tora-title-module">
                    <h3 class="tora-section-title"><?php echo esc_html($options['section_title']); ?></h3>
                    <span class="top-left-deco"></span><span class="top-right-deco"></span>
                    <span class="bottom-deco"></span>
                </div>
                <?php

                /* Module output ends here */

                $this->module_end( $options );

            }
     
    }

}