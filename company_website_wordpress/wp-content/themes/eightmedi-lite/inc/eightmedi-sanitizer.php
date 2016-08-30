<?php
/**
* Custom Sanitizer Function 
*/

function eightmedi_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function eightmedi_lite_sanitize_radio_integer( $input){
	$valid_keys = array(
		'1' => __('Yes','eightmedi-lite'),
		'0' => __('No','eightmedi-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_lite_sanitize_radio_webpagelayout($input) {
	$valid_keys = array(
		'boxed' => __('Boxed', 'eightmedi-lite'),
		'fullwidth' => __('Full Width', 'eightmedi-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_lite_sanitize_page_layouts($input) {
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	$valid_keys = array(
		'sidebar-left' => $imagepath.'sidebar-left.png',  
		'sidebar-right' => $imagepath.'sidebar-right.png', 
		'sidebar-both' => $imagepath.'sidebar-both.png',
		'sidebar-no' => $imagepath.'sidebar-no.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function eightmedi_lite_radio_sanitize_enabledisable($input) {
	$valid_keys = array(
		'enable'=>__('Enable', 'eightmedi-lite'),
		'disable'=>__('Disable', 'eightmedi-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_lite_radio_sanitize_yesno($input) {
	$valid_keys = array(
		'yes'=>__('Yes', 'eightmedi-lite'),
		'no'=>__('No', 'eightmedi-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function eightmedi_lite_radio_sanitize_webpagelayout($input) {
	$valid_keys = array(
		'fullwidth' => __('Full Width', 'eightmedi-lite'),
		'boxed' => __('Boxed', 'eightmedi-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}