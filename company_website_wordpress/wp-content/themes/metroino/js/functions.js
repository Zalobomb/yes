/* ==============================================
jQuery
=============================================== */
jQuery(document).ready(function () {

    "use strict";

    jQuery("[href='#']").click(function(e){
        e.preventDefault();
    });

    // show, hide navbar
    jQuery(".tile-link").click(function(){
		jQuery(".navbar").css('display','block');
        jQuery(".navbar").animate({top:0},"slow");
    });

    // back to top
    jQuery('#back_to_top').click(function (e) {
        e.preventDefault();
        jQuery('html,body').animate({
            scrollTop: 0
        }, 1);
        return false;
    });
	
	jQuery('.section-title').css('paddingTop', jQuery('.navbar').height()-50); 

    var currentsection = 'homepage';

    // homepage tile icon
    jQuery(".tile-link, .menu-item a").click(function () {
		
		if ( jQuery(this).attr('href').indexOf('#')  !== -1 ) {

			var section = jQuery(this).attr('href').replace('#','');

			if ( section != currentsection ) {

				var outclass = jQuery('#' + section).data('outclass');
				var inclass = jQuery('#' + section).data('inclass');
				var prevsection = jQuery('.pt-page-current');
				jQuery(prevsection).addClass(outclass);
				jQuery('#' + section).addClass("pt-page-current");
				jQuery('#' + section).addClass(inclass);

				jQuery(prevsection).delay(1000).queue(function() {
					jQuery(prevsection).removeClass(outclass).dequeue();
					jQuery(prevsection).removeClass("pt-page-current").dequeue();
				});
				jQuery('#' + section).delay(1000).queue(function() {
					jQuery('#' + section).removeClass(inclass).dequeue();
				});

				currentsection = section;

			}
		}
    });

    jQuery(".backtohome").click(function() {

        jQuery(".section").each(function() {

            if ( jQuery(this).is(".pt-page-current") ) {

                jQuery(this).addClass("pt-page-scaleDownCenter");
                jQuery("#homepage").addClass("pt-page-current pt-page-scaleUpCenter pt-page-delay400");

                jQuery(this).delay(1000).queue(function() {
                    jQuery(this).removeClass("pt-page-current pt-page-scaleDownCenter").dequeue();
                });
                jQuery("#homepage").delay(1000).queue(function() {
                    jQuery(this).removeClass("pt-page-scaleUpCenter pt-page-delay400").dequeue();
                });
				
                jQuery(".navbar").animate({top:-50},"slow");
				jQuery(".navbar").css('display','none');
                currentsection = 'homepage';

            }

        });

    });



});
