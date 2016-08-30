/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	//header-callto text
	wp.customize( 'eightmedi_lite_callto_text', function( value ) {
		value.bind( function( to ) {
			$( '.header-callto .callto-left' ).html( to );
		} );
	} );

	//header-callto text
	wp.customize( 'eightmedi_lite_callto_text_right', function( value ) {
		value.bind( function( to ) {
			$( '.header-callto .callto-right .cta' ).html( to );
		} );
	} );

	// //header-search
	// wp.customize( 'eightmedi_lite_hide_header_search', function( value ) {
	// 	value.bind( function( to ) {
	// 		if(to=='1'){
	// 			$( '.header-search' ).hide();
	// 		}else{
	// 			$( '.header-search' ).show();
	// 		}
	// 	} );
	// } );
	
	//cta title
	wp.customize( 'eightmedi_lite_callto_title', function( value ) {
		value.bind( function( to ) {
			$( '.call-to-action .home-title' ).html( to );
		} );
	} );
	//cta desc
	wp.customize( 'eightmedi_lite_callto_desc', function( value ) {
		value.bind( function( to ) {
			$( '.call-to-action .home-description' ).html( to );
		} );
	} );

	//cta desc
	wp.customize( 'eightmedi_lite_callto_readmore', function( value ) {
		value.bind( function( to ) {
			$( '.call-to-action .cta-link' ).text( to );
		} );
	} );
	

} )( jQuery );