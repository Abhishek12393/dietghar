(function ($) {
    "use strict";
    jQuery(document).ready(function($){
        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        $('[data-toggle="tooltip"]').tooltip();
        // our-programs-slider
        $("#our-programs-slider").owlCarousel({
            autoPlay: true,
            items: 3,
            touchDrag: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            itemsMobile: [767,1],
            paginationSpeed: 1000,
            slideSpeed: 1000,
            pagination: false,
            navigation: true,
            navigationText: ["<img src='images/prev.png'>", "<img src='images/next.png'>"]
        });
        // our-programs-slider
        // our-clients-slider
        $("#our-clients-slider").owlCarousel({
            autoPlay: true,
            items: 2,
            touchDrag: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            itemsMobile: [767,1],
            paginationSpeed: 1000,
            slideSpeed: 1000,
            pagination: true,
            navigation: false
        });
        // pricing-carousel
        $("#pricing-carousel").owlCarousel({
            autoPlay: true,
            items: 3,
            touchDrag: true,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            itemsMobile: [479, 1],
            paginationSpeed: 1000,
            slideSpeed: 1000,
            pagination: true,
            navigation: false
        });
        // pricing-carousel
        // aos initialize
        AOS.init();
        // aos initialize
    });
    // loader
    $(window).on('load', function (e) {
        $("#loading").delay(300).fadeOut("slow");
    })
    // loader
	
//login-signup 	
	jQuery('.next').click(function(){
	   $(this).parent().hide().next().show();//hide parent and show next
	});

	jQuery('.back').click(function(){
	   $(this).parent().hide().prev().show();//hide parent and show previous
	});	
}(jQuery));