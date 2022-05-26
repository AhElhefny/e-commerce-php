/*global $, alert, console*/

$(document).ready(function () {

   
    "use strict";
    
    var myImgHeight, myFixedNavbar, myScroll, lg,  scrollButton, filter_wrapper;
    
    $('body').scrollspy({
        target: '#ourNavbar',
        offset: 50
    });
    
   
     // animate links
    $('.navbar .nav li a').click(function () {
        $('html, body').animate({
            // scrollTop: $('#' + $(this).data('value')).offset().top
            scrollTop: $($(this).attr('href')).offset().top

        }, 1000);

    });
    ///////////////////////////////////////////////


    // $('.navbar .nav li').click(function(){
    //     $('.navbar .nav li').removeClass('active');
    //     $(this).addClass('active');
    // });

    //////////////////////////////////////////////
    

    $(".header").height($(window).height() - 100);
    
    
    $(window).resize(function () {
        
        $(".header").height($(window).height() - 100);
        //$(".header").height($(window).height() - $(".navbar").height());

    });


//////////////////////////////// SAY ////////////////////////////////////////

    //backstretch
    $(".say,.contact-us").backstretch([
        "layout/images/img-33.jpg",
        "layout/images/img-30.jpg",
        "layout/images/img-31.jpg",
        "layout/images/img-32.jpg",
    ], {
        fade: 750,
        duration: 2000
    });
    

    
    $('#home').height($(window).height());
    
    $(".txt").css({paddingTop: ($(window).height() - $(".txt").height()) / 2 });
    
    $(window).resize(function () {
        
        $('#home').height($(window).height());
        
        $(".txt").css({paddingTop: ($(window).height() - $(".txt").height()) / 2 });
        
        // Can also be used with $(document).ready()
        $('.dishes .flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemMargin: 5,
            minItems: 2,
            maxItems: 4
        });
        
    });

    
    var scrollButton = $("#Scroll-top");

    $(window).scroll(function () {

        //console.log($(this).scrollTop());
        
        if ($(this).scrollTop() >= $(window).height()) {

            scrollButton.fadeIn(1000);
            
        } else {

            scrollButton.fadeOut(1000);
        }
        
        
        scrollButton.click(function () {
            
            $("html,body").animate({scrollTop: 0}, 2000);
        });

    });
    
    
    $("html").niceScroll();
    
    
});

    
// loading 
$(window).on("load", function () {
 
    "use strict";
    
    $('.loading-overlay .sk-cube-grid').fadeOut(3000, function () {

        $(".loading-overlay h1").fadeOut(1000);
        
        $(this).parent().fadeOut(2000, function () {

            // Show Scroll
            $("body").css("overflow", "auto");

            $(this).remove();
        });
        

    });

    $('#home .head-slider').flexslider({
        animation: "slide",
        direction: "vertical",
        directionNav: false,
        controlNav: false,
        slideshowSpeed: 2000,
        animationSpeed: 500
    });

       //flex slider
       $(window).on("load", function () {
        $('#home .head-slider').flexslider({
            animation: "slide",
            direction: "vertical",
            directionNav: false,
            controlNav: false,
            slideshowSpeed: 2000,
            animationSpeed: 500
        });
    });
    
    $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        left : true,
        dots: true,
        responsive: [{
            
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: true
            }
            
        }, {
            
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                infinite: true,
                arrows: false,
                dots: true
            }
            
        }, {
            
            breakpoint: 401,
            settings: {
                slidesToShow: 1,
                infinite: true,
                arrows: false,
                dots: true
            }
            
        }, {
            
            breakpoint: 251,
            settings: "unslick" // destroys slick
            
        }]
        
    });
    
    
    $('.carousel').carousel(
        {interval: 3000}
    );
    
{
    // $("#lightgallery").lightGallery();
        
    // $("#lightgallery a").click(function () {
        
    //     $(".navbar-default").css({display: "none"});
        
    // });



    
////////////////////////////////////////////
    // lg = $('#lightgallery');
    
    // // Perform any action just after closing the gallery
    // lg.on('onCloseAfter.lg', function (event) {

    //     $(".navbar-default").css({display: "block"});
    // });
////////////////////////////
}

});