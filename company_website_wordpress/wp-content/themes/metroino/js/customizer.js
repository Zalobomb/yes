/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
	'use strict';
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	function hex2rgba(hex) {
		var bigint, r, g, b, a;
		//Remove # character
		var re = /^#?/;
		var aRgb = hex.replace(re, '');
		bigint = parseInt(aRgb, 16);

		//If in #FFF format
		if (aRgb.length == 3) {
			r = (bigint >> 4) & 255;
			g = (bigint >> 2) & 255;
			b = bigint & 255;
			return "rgba(" + r + "," + g + "," + b + ",1)";
		}

		//If in #RRGGBB format
		if (aRgb.length >= 6) {
			r = (bigint >> 16) & 255;
			g = (bigint >> 8) & 255;
			b = bigint & 255;
			var rgb = r + "," + g + "," + b;

			//If in #AARRBBGG format
			if (aRgb.length == 8) {
				a = ((bigint >> 24) & 255) / 255;
				return "rgba(" + rgb + "," + a.toFixed(1) + ")";
			}
		}
		return "rgba(" + rgb + ",.6)";
	}
	
	function rgb2hex(color) {
		if (color.substr(0, 1) === "#") {
			return color;
		}
		var nums = /(.*?)rgb\((\d+),\s*(\d+),\s*(\d+)\)/i.exec(color),
			r = parseInt(nums[2], 10).toString(16),
			g = parseInt(nums[3], 10).toString(16),
			b = parseInt(nums[4], 10).toString(16);
		return "#"+ (
			(r.length == 1 ? "0"+ r : r) +
			(g.length == 1 ? "0"+ g : g) +
			(b.length == 1 ? "0"+ b : b)
		);
	}
	

	// ---------------------- Tile Options 1 -------------------
	
	wp.customize( 'metroino_enable_1', function( value ) {
		value.bind( function( to ) {
			if ( to < 1 ) {
				$( '.tileicon-1' ).css('display','none');
			} else {
				$( '.tileicon-1' ).css('display','block');
			}
		} );
	} );
	
	wp.customize( 'metroino_name_1', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-1 .tile-title' ).html(to);
		} );
	} );
	
	wp.customize( 'metroino_icon_1', function( value ) {
		value.bind( function( to ) {
			$('.tileicon-1 .tilenav img').attr('src',to);
		} );
	} );
	
	wp.customize( 'metroino_color_1', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-1' ).css('background', to);
		} );
	} );
	
	wp.customize( 'metroino_css_1', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-1' ).attr('style', to);
		} );
	} );
	
	wp.customize( 'metroino_transition_1', function( value ) {
		value.bind( function( to ) {
			var io = to.split('$');
			$( '.section-1' ).attr('data-outclass', io[0]);
			$( '.section-1' ).attr('data-inclass', io[1]);
		} );
	} );
	
	wp.customize( 'metroino_pagebgimage_1', function( value ) {
		value.bind( function( to ) {
			$('.section-1').css('background-image','url(' + to + ')');
		} );
	} );
	
	wp.customize( 'metroino_pagebgcolor_1', function( value ) {
		value.bind( function( to ) {
			$( '.section-wrapper-1' ).css('background-color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	// ---------------------- Tile Options 2 -------------------
	
	wp.customize( 'metroino_enable_2', function( value ) {
		value.bind( function( to ) {
			if ( to < 1 ) {
				$( '.tileicon-2' ).css('display','none');
			} else {
				$( '.tileicon-2' ).css('display','block');
			}
		} );
	} );
	
	wp.customize( 'metroino_name_2', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-2 .tile-title' ).html(to);
		} );
	} );
	
	wp.customize( 'metroino_icon_2', function( value ) {
		value.bind( function( to ) {
			$('.tileicon-2 .tilenav img').attr('src',to);
		} );
	} );
	
	wp.customize( 'metroino_color_2', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-2' ).css('background', to);
		} );
	} );
	
	wp.customize( 'metroino_css_2', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-2' ).attr('style', to);
		} );
	} );
	
	wp.customize( 'metroino_transition_2', function( value ) {
		value.bind( function( to ) {
			var io = to.split('$');
			$( '.section-2' ).attr('data-outclass', io[0]);
			$( '.section-2' ).attr('data-inclass', io[1]);
		} );
	} );
	
	wp.customize( 'metroino_pagebgimage_2', function( value ) {
		value.bind( function( to ) {
			$('.section-2').css('background-image','url(' + to + ')');
		} );
	} );
	
	wp.customize( 'metroino_pagebgcolor_2', function( value ) {
		value.bind( function( to ) {
			$( '.section-wrapper-2' ).css('background-color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	// ---------------------- Tile Options 3 -------------------
	
	wp.customize( 'metroino_enable_3', function( value ) {
		value.bind( function( to ) {
			if ( to < 1 ) {
				$( '.tileicon-3' ).css('display','none');
			} else {
				$( '.tileicon-3' ).css('display','block');
			}
		} );
	} );
	
	wp.customize( 'metroino_name_3', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-3 .tile-title' ).html(to);
		} );
	} );
	
	wp.customize( 'metroino_icon_3', function( value ) {
		value.bind( function( to ) {
			$('.tileicon-3 .tilenav img').attr('src',to);
		} );
	} );
	
	wp.customize( 'metroino_color_3', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-3' ).css('background', to);
		} );
	} );
	
	wp.customize( 'metroino_css_3', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-3' ).attr('style', to);
		} );
	} );
	
	wp.customize( 'metroino_transition_3', function( value ) {
		value.bind( function( to ) {
			var io = to.split('$');
			$( '.section-3' ).attr('data-outclass', io[0]);
			$( '.section-3' ).attr('data-inclass', io[1]);
		} );
	} );
	
	wp.customize( 'metroino_pagebgimage_3', function( value ) {
		value.bind( function( to ) {
			$('.section-3').css('background-image','url(' + to + ')');
		} );
	} );
	
	wp.customize( 'metroino_pagebgcolor_3', function( value ) {
		value.bind( function( to ) {
			$( '.section-wrapper-3' ).css('background-color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	// ---------------------- Tile Options 4 -------------------
	
	wp.customize( 'metroino_enable_4', function( value ) {
		value.bind( function( to ) {
			if ( to < 1 ) {
				$( '.tileicon-4' ).css('display','none');
			} else {
				$( '.tileicon-4' ).css('display','block');
			}
		} );
	} );
	
	wp.customize( 'metroino_name_4', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-4 .tile-title' ).html(to);
		} );
	} );
	
	wp.customize( 'metroino_icon_4', function( value ) {
		value.bind( function( to ) {
			$('.tileicon-4 .tilenav img').attr('src',to);
		} );
	} );
	
	wp.customize( 'metroino_color_4', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-4' ).css('background', to);
		} );
	} );
	
	wp.customize( 'metroino_css_4', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon-4' ).attr('style', to);
		} );
	} );
	
	wp.customize( 'metroino_transition_4', function( value ) {
		value.bind( function( to ) {
			var io = to.split('$');
			$( '.section-4' ).attr('data-outclass', io[0]);
			$( '.section-4' ).attr('data-inclass', io[1]);
		} );
	} );
	
	wp.customize( 'metroino_pagebgimage_4', function( value ) {
		value.bind( function( to ) {
			$('.section-4').css('background-image','url(' + to + ')');
		} );
	} );
	
	wp.customize( 'metroino_pagebgcolor_4', function( value ) {
		value.bind( function( to ) {
			$( '.section-wrapper-4' ).css('background-color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	
	// ---------------------- General Options -------------------
	
	wp.customize( 'metroino_tile_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.tileicon .tile-title, .section-title' ).css('color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	wp.customize( 'metroino_menu_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar-default .navbar-nav li a, .navbar-default .navbar-brand' ).css('color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	wp.customize( 'metroino_menu_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.navbar' ).css('background', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	wp.customize( 'metroino_homebgimage', function( value ) {
		value.bind( function( to ) {
			$('#homepage').css('background-image','url(' + to + ')');
		} );
	} );
	
	wp.customize( 'metroino_homebgcolor', function( value ) {
		value.bind( function( to ) {
			$('#homepage-wrapper').css('background-color', hex2rgba(rgb2hex(to)));
		} );
	} );
	
	// ---------------------- Blog Options -------------------
	
	wp.customize( 'metroino_blog_sidebar', function( value ) {
		value.bind( function( to ) {
			if ( to === 'rightsidebar' ) {
				$( '.content' ).removeClass('col-sm-12 col-md-8 col-lg-9 col-sm-push-4 col-md-push-4 col-lg-push-3').addClass('col-sm-12 col-md-8 col-lg-9');
				$( '.sidebar' ).removeClass('col-sm-12 col-md-4 col-lg-3 col-sm-pull-8 col-md-pull-8 col-lg-pull-9').addClass('col-sm-12 col-md-4 col-lg-3');
			} else {
				$( '.content' ).removeClass('col-sm-12 col-md-8 col-lg-9').addClass('col-sm-12 col-md-8 col-lg-9 col-sm-push-4 col-md-push-4 col-lg-push-3');
				$( '.sidebar' ).removeClass('col-sm-12 col-md-4 col-lg-3').addClass('col-sm-12 col-md-4 col-lg-3 col-sm-pull-8 col-md-pull-8 col-lg-pull-9');
			}
		} );
	} );
	
	
	
} )( jQuery );
