jQuery(document).ready(function ($) {
    
    // Mobile nav
    $('.menu-trigger').bigSlide({
        menu : '#karma-mobile-wrapper',
        push : '#page',
        easyClose : false,
        speed : 400,
        side : 'right'
    });
    //
    
    $('.menu-trigger').on( 'click touchstart', function() {
        
        $('#menu-panel-close').fadeToggle(400);
        
    });
    
    var link_width = 0;
    var list_width = 0;
    var diff_width = 0;
    $( 'ul#primary-menu > li.menu-item').mouseenter( function() {
        
        link_width = $( '> a', this).width();
        list_width = $( '> ul', this ).width();
        
        diff_width = Math.abs ( link_width - list_width ) * -1;
       
        
        $( this ).find( '> ul' ).css( 'left',diff_width/2 ).addClass('show-sub');
        
    }).mouseleave( function() {

        $( this ).find( '> ul' ).removeClass('show-sub').stop();
    
    });


    if( $('#karma-jumbo-js').length ) {
        particlesJS.load('karma-jumbo-js', karmaObj.particlesLocation, function() {
            console.log('callback - particles.js config loaded');
        });        
    }
    
    if( $( '.edd-sidebar').length ) {
        
        var topOfDiv = $('#colophon').offset().top;
        var bottomOfVisibleWindow = $(document).height();
        
        var total = ( bottomOfVisibleWindow - topOfDiv  ) + ( 55 );
        
        $('.edd-sidebar #secondary').sticky({
            topSpacing: 40,
            bottomSpacing: total
        });
    }

//    $(window).scroll(function() {
//      if ($(document).scrollTop() > 50) {
//        $('#karma-header').addClass('shrink');
//      } else {
//        $('#karma-header').removeClass('shrink');
//      }
//    });

//    var overlay_open = false;
//    $('#menu-toggle-trigger').click(function () {
//        
//        if( overlay_open ) {
//            $(this).removeClass('open');
//            $('.karma-mobile-nav' ).removeClass('fadeInDown').addClass( 'fadeOutUp' );
//            overlay_open = false;
//        }else {
//            $(this).addClass('open');
//            $('.karma-mobile-nav' ).removeClass('fadeOutUp').addClass( 'fadeInDown' );
//            overlay_open = true
//        }
//        
//        $('#karma-fs-overlay').fadeToggle(449);
//
//    });

    // scroll to top trigger
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    // scroll down trigger
    $('.scroll-down').click(function () {

        $("html, body").animate({
            scrollTop: ($('#karma-featured-post').height() + 85 )
        }, 1000);

        return false;

    });


    // ------------
    var karmaWow = new WOW({
        boxClass: 'reveal',
        animateClass: 'animated',
        offset: 100

    });

    karmaWow.init();
    

});
