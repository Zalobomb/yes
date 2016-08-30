//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Menu bar
jQuery(function($) {
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 100 ) {
			$('.site-header').addClass('header-scrolled');
		} else {
			$('.site-header').removeClass('header-scrolled');
		}
	});
});


//Menu clone
jQuery(function($) {
    var headerHeight = $('.site-header').outerHeight();
    $('.header-clone').css('height',headerHeight);

	$(window).resize(function(){	
		var headerHeight = $('.site-header').outerHeight();
		$('.header-clone').css('height',headerHeight);
	});
});

//FitVids
jQuery(function($) {
    $("body").fitVids();  
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="tora-icon dslc-icon-ei-icon_menu"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Header search
jQuery(function($) {
    $('.main-navigation .search-item .tora-icon, .mobile-nav .search-item .tora-icon').click(function() {
        $('.header-search').fadeIn(200);
    });
    $('.search-close .tora-icon').click(function() {
        $('.header-search').fadeOut(200);
    });    
});

//Open social links in a new tab
jQuery(function($) {
     $( '.contact-area .contact-social a, .widget-area .tora_social_widget li a' ).attr( 'target','_blank' );
});

//Contact toggle
jQuery(function($) {
    $('.contact-mobile').on('click', function() {
    	var $this = $(this);
    	$this.toggleClass('contact-mobile-active');
    	$this.find('i').toggleClass('dslc-icon-ei-arrow_triangle-up_alt2 dslc-icon-ei-arrow_triangle-down_alt2');
        $('.contact-area .container').slideToggle('slow');          
    });
});

//Go to top
jQuery(function($) {
	var goTop = $('.go-top');
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 800 ) {
			goTop.addClass('show');
		} else {
			goTop.removeClass('show');
		}
	}); 

	goTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});
});

//Smooth scrolling
jQuery(function($) {
	$('a[href*="#"]:not([href="#"],.wc-tabs a,.activity-content a)').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top - 70
		        }, 1000);
		        return false;
		    }
		}
	});
});

//Preloader
jQuery(function($) {
	$('.preloader').css('opacity', 0);
	setTimeout(function(){$('.preloader').hide();}, 600);	
});