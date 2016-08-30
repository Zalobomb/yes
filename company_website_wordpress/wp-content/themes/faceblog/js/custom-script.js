jQuery(document).ready(function() {
	jQuery('.slide-toggle').click(function() {
		jQuery('.side-menu-wrapper').toggleClass('activate');
		jQuery('.menu-overlay').toggleClass('overlay-active');
	});
	jQuery('.menu-overlay,.close-menu').click(function() {
		jQuery('.side-menu-wrapper').removeClass('activate');
		jQuery('.menu-overlay').removeClass('overlay-active');
	});
	jQuery(window).on('load', function() {
		var width = Math.max(window.innerWidth, document.documentElement.clientWidth);
		if (width && width >= 768) {
			jQuery('.header-banner-wrapper,.header-inner-banner-wrapper').each(function() {
				jQuery(this).parallax('center', 0.2, true);
			});
		}
	});
    
    jQuery('#site-navigation .menu-item-has-children').append('<span class="sub-menu-toggle"> <i class="fa fa-angle-right"></i> </span>');

   	jQuery('#site-navigation .sub-menu-toggle').click(function() {
    	jQuery(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
    	jQuery(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
   	});

   	/**
   	 * Sidebar sticky
   	 */
   	jQuery('#primary, #secondary').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });


});