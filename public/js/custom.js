 (function ($) {
    'use strict';

    // :: 1.0 Owl Carousel Active Code
    if ($.fn.owlCarousel) {
        $(".welcome_slides").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='pe-7s-angle-left'</i>", "<i class='pe-7s-angle-right'</i>"]
        });
        $(".app_screenshots_slides").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 30,
            center: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 3
                },
                992: {
                    items: 5
                }
            }
        });
    }
     // :: 2.0 Slick Active Code
    if ($.fn.slick) {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 500,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            slide: 'div',
            autoplay: true,
            centerMode: true,
            centerPadding: '30px',
            mobileFirst: true,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>'
        });
    }


    // Smooth scrolling using jQuery easing
	  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').on('click', function() {
	    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: (target.offset().top - 54)
	        }, 1000, "easeInOutExpo");
	        return false;
	      }
	    }
	});

	// :: 7.0 Magnific-popup Video Active Code
    if ($.fn.magnificPopup) {
        $('.video_btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }



    var $window = $(window);
    // if ($window.width() > 767) {
    //     new WOW().init();
    // }
 	// :: 8.0 Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 20) {
            $('.main-header').addClass('sticky slideInDown');
            // change logo on scroll
        } else {
            $('.main-header').removeClass('sticky slideInDown');
        }
    });

    // :: 9.0 Preloader Active code
    $window.on('load', function () {
        $('.main-wrapper').fadeIn('slow');
        $('.ozient-folding-cube').fadeOut(500, function () {
            $('#preloader').remove();
        });
    });

})(jQuery);

function monthly() {
  
    //Background for yearly button back to blue 
    document.getElementById("yearly").style.background = "#ffffff";
    document.getElementById("yearly").style.color = "#000000";
    //Background for monthly button back to pink
    document.getElementById("monthly").style.background = "#501112d8";
    document.getElementById("monthly").style.color = "#fff";
    
    
    
    //Change to monthly prices
    document.getElementById("wordpress").innerHTML = "$20/mo.";
    document.getElementById("shared").innerHTML = "$20/mo.";
    document.getElementById("vps").innerHTML = "$30/mo.";
  }
  
  function yearly() {
    
    //Background for yearly button back to blue
    document.getElementById("monthly").style.background = "#ffffff";
    document.getElementById("monthly").style.color = "#000000";
    //Background for monthly button back to pink
    document.getElementById("yearly").style.background = "#501112d8";
    document.getElementById("yearly").style.color = "#fff";
    
    
    //Change to monthly prices
    document.getElementById("wordpress").innerHTML = "$216/yr.";
    document.getElementById("shared").innerHTML = "$216/yr.";
    document.getElementById("vps").innerHTML = "$324/yr.";
  }