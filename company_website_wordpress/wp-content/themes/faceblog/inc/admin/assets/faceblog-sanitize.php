<?php
/**
 * Sanitization and definitions 
 * 
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */
 
//Text
function faceblog_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Email
function faceblog_sanitize_email( $input ) {
    return sanitize_email( $input );
}

//Checkboxes
function faceblog_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}

//Footer widget areas
function faceblog_sanitize_footer_widget( $input ) {        
    $valid = array(
        'column1'     => __( 'Column One', 'faceblog' ),
        'column2'     => __( 'Column Two', 'faceblog' ),
        'column3'     => __( 'Column Three', 'faceblog' ),
        'column4'     => __( 'Column Four', 'faceblog' )
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Header banner type
function faceblog_header_layout_sanitize( $input ) {
    $valid = array(
        'banner_layout1'   => __( 'Category Posts', 'faceblog' ),
        'banner_layout2'   => __( 'Single Banner', 'faceblog' ),
    );
    if( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Design layout for post/page/archvie
function faceblog_page_layout_sanitize( $input ) {
$valid_keys = array(
    'right_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/right-sidebar.png',
    'left_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/left-sidebar.png',
    'no_sidebar' => get_template_directory_uri() . '/inc/admin/assets/images/no-sidebar.png',
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

//retrun fasle value
function __return_false_value($value) {
    return $value;
}    
add_filter('__return_false', '__return_false_value');

/*======================================================================*/
/**
 * Call back function
 */

function banner_layout_category_cb( $control ) {
    if ( $control->manager->get_setting( 'faceblog_header_layout' )->value() == 'banner_layout1' ) {
        return true;
    } else {
        return false;
    }
}

function banner_layout_image_cb( $control ) {
    if ( $control->manager->get_setting( 'faceblog_header_layout' )->value() == 'banner_layout2' ) {
        return true;
    } else {
        return false;
    }
}