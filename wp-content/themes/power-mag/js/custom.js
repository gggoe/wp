/**
PowerMag custom js
version 1.0.0
*/
//Stickybar
(function($) {
  
  "use strict";
  
//Submenu Dropdown Toggle
if($('li.menu-item-has-children ul').length){
    $('li.menu-item-has-children').append('<div class="cl_drop_menu"><i class="fa fa-angle-down"></i></div>');
    
    //Dropdown Button
    $('.cl_drop_menu').on('click', function() {
        $(this).prev('ul').slideToggle(500);
        if($(this).children('.fa').hasClass('fa-angle-up'))
        {
            $(this).children('.fa').removeClass('fa-angle-up');
            $(this).children('.fa').addClass('fa-angle-down');
        }
        else{
            $(this).children('.fa').removeClass('fa-angle-down');
            $(this).children('.fa').addClass('fa-angle-up');
        }
        
    }); 
    
    
}


/*$('.featured_fullwidth_layout_thumbnail_wrapper').hover(function(){
    $(this).find('.pm_featured_fullwidth_title').slideToggle('normal');
});*/
if($('.main-navigation').length){ 
 var stickyNavTop = $('.main-navigation').offset().top;
 var stickyNav = function(){
 var scrollTop = $(window).scrollTop();
  if (scrollTop > stickyNavTop) {
         $('.main-navigation').addClass('sticky');
          } else {
              $('.main-navigation').removeClass('sticky');
          }
      };
      stickyNav(); 
      $(window).scroll(function() {
          stickyNav();
      });
  }

// Search Toggle
$(function() {
	$(".pm_header_search i").hover(function() {
        $(".pm_header_search .search-form .search-field").fadeIn("fast"); 
        $(".pm_header_search").addClass('hover_active');
	}); 
}); 


 $(document).click(function(event) { 
    if(!$(event.target).closest('.pm_header_search').length && !$(event.target).is('.pm_header_search')) {
        if($('.pm_header_search').hasClass('hover_active')) {
            $(".pm_header_search .search-form .search-field").fadeIn("fast");
            $('.pm_header_search').removeClass('hover_active')
        }
    }        
}); 

$('.featured_fullwidth_layout_thumbnail_wrapper').hover(function() {
    //alert('test');
  //$(this).find('.pm_featured_fullwidth_title>h6>a').slideToggle(300);
});


// News Ticker   
   $('.newsticker').newsTicker({
      row_height: 28,
      max_rows: 1,
      speed: 1000,
      direction: 'down',
      duration: 4000,
      autostart: 1,
      pauseOnHover: 1
   }); 



 
$('.pm_footer_wrapper .pm_footer .power_mag_featured_fullwidth .widget_fullwidth_featured_layout_container .owl-carousel').owlCarousel({
    autoplay:true,
    items: 1,
    loop:false,
    margin:24,
    nav:false,
    dots:false,  
    smartSpeed: 1000
});
 
 
$('.pm_home_top_sidebar .power_mag_featured_fullwidth .widget_fullwidth_featured_layout_container .owl-carousel').owlCarousel({
    autoplay:true,
    items: 1,
    loop:false,
    margin:24,
    nav:false,
    dots:false,  
    smartSpeed: 1000
});
 
 
$('.pm_home_header_right_area .power_mag_featured_fullwidth .widget_fullwidth_featured_layout_container .owl-carousel').owlCarousel({
    autoplay:true,
    items: 1,
    loop:false,
    margin:24,
    nav:false,
    dots:false,  
    smartSpeed: 1000
});
 
 
$('.pm_home_both_column_wrapper .power_mag_featured_fullwidth .widget_fullwidth_featured_layout_container .owl-carousel').owlCarousel({
    autoplay:true,
    items: 1,
    loop:false,
    margin:24,
    nav:false,
    dots:false,  
    smartSpeed: 1000
});
$('#secondary .owl-carousel').owlCarousel({
    items:1,
    autoplay:true,
    smartSpeed: 1000
});

$('.pm_footer .owl-carousel').owlCarousel({
    items:1,
    autoplay:true,
    smartSpeed: 1000
});

 
$('.owl-carousel').owlCarousel({
    autoplay:true,
    items: 3,
    loop:false,
    margin:24,
    nav:false,
    dots:false,  
    smartSpeed: 1000, 
    responsive:{
        0:{
            items:1
        }, 
        300:{
            items:1
        }, 
        600:{
            items:1
        }, 
        1000:{
            items:3
        }
    }
});

//post tabs 

$('.cc-tabs li').click(function(event) {
        var tabClass = $(this).attr('data-tab'); 
        
        $(this).parents('.cc_recent_popular_post1').children('.tab-content').hide();
        $(this).parents('.cc_recent_popular_post1').children('.content-'+tabClass).slideDown(700);
        $(this).parents('.cc_recent_popular_post1').find('.cc-widget-title').children('li').removeClass('current');
        $(this).addClass('current');
    }); 



    //wow
    var wow = new WOW({
        animateClass: 'animated' 
    });
    wow.init();

})(jQuery);