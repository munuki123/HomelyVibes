jQuery(function($){
 	"use strict";
   	jQuery('.gb_navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
  	});
});

function beauty_salon_spa_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function beauty_salon_spa_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
	$('.gb_toggle').click(function () {
        beauty_salon_spa_Keyboard_loop($('.side_gb_nav'));
    });

  jQuery(window).load(function() {
  jQuery(".preloader").delay(2000).fadeOut("slow");
});
});

jQuery('document').ready(function(){
  var owl = jQuery('#home-services .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 2
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

jQuery(window).scroll(function(){
  if (jQuery(this).scrollTop() > 100) {
    jQuery('.scrollup').addClass('is-active');
  } else {
      jQuery('.scrollup').removeClass('is-active');
  }
});

jQuery( document ).ready(function() {
  jQuery('#beauty-salon-spa-scroll-to-top').click(function (argument) {
    jQuery("html, body").animate({
           scrollTop: 0
       }, 600);
  })
})
// sticky header
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 120) {
        jQuery('.fixed_header').addClass('fixed');
    } else {
            jQuery('.fixed_header').removeClass('fixed');
    }
});