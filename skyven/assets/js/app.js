 jQuery(window).scroll(function(){
    var scroll = jQuery(window).scrollTop();
    if (scroll > 120) {
        jQuery("header.top-header").addClass("fixed-header");
        $('#collapsibleNavbar li a').addClass('top-header-fix-color');
		//$('.header-pc .site-logo').css("display","block");
		$('.header-pc .site-logo:last-child').addClass('d-none');
		$('.header-mb .site-logo img:last-child').addClass('d-none');
    }
    else{
        jQuery("header.top-header").removeClass("fixed-header");
        $('#collapsibleNavbar li a').removeClass('top-header-fix-color');
		//$('.header-row .site-logo').css("display","inline-flex");
		$('.header-pc .site-logo:last-child').removeClass('d-none');
		$('.header-mb .site-logo img:last-child').removeClass('d-none');
    }
});

AOS.init({
    duration: 800,
})

jQuery(document).ready(function(){
    $('.logo-slider').slick({
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        ariableWidth: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 4
                }
            },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });

    jQuery('.info-icon').click(function(){
      //alert();
      jQuery('.info-icon').not(this).parentsUntil(".slide").children('.overlay').removeClass('show-info');
      jQuery(this).parentsUntil(".slide").children('.overlay').toggleClass('show-info');
    });
});

 jQuery(document).ready(function () {
     $('#slider-0').hide();
     $('#slider-1').hide();
     $('#slider-2').hide();
     $('#slider-0').show();
     var num = 1;
     var continue_interval = true;
     setInterval(function () {
         if (!continue_interval) return;
         // $('.video-num-' + num).click();
         $('#slider-0').hide();
         $('#slider-1').hide();
         $('#slider-2').hide();
         switch (num) {
             case 0:
                 $('.banner-text h1').text('Banner Text 1');
                 $('#slider-0').show();
                 break;
             case 1:
                 $('.banner-text h1').text('Banner Text 2');
                 $('#slider-1').show();
                 break;
             case 2:
                 $('.banner-text h1').text('Banner Text 3');
                 $('#slider-2').show();
                 break;
         }
         if (num == 2) num = 0;
         else num += 1;
     }, 5000);

     var my_video = $('.my-video');
     for (var i = 0; i < my_video.length; i++){
         my_video[i].onpause = function (e) {
             if($('.close-video-btn').is(':visible') && $(e.target).is(':visible')) {
                 console.log('show');
                 $('.video-list').show();
             }
         }

         my_video[i].ontimeupdate = function (e) {
             if($('.close-video-btn').is(':visible') && $(e.target).is(':visible')) {
                 console.log('hide');
                 $('.video-list').hide();
             }
         }

     }

     $('.close-video-btn').on('click', function () {
         $('.my-video').prop('controls',false);
         var header_rows = $('.header-row');
         for (let item = 0; item < header_rows.length; item++) {
             if ($(header_rows[item]).hasClass('hide-item')) {
                 $(header_rows[item]).removeClass('hide-item');
             }
         }

         $('.banner-text').show();
         $('.close-video-btn').addClass('hide-item');
         // $('body').removeClass('hide-scroll-bar');
         $('.video-list').hide();
         for(var i = 0; i < my_video.length; i++) {
             my_video[i].play();
         }
         continue_interval = true;
     })
     // show full screen
     $('.btn-show-fullscreen').on('click', function () {
         $('.my-video').prop('controls',true);
         // scroll top
         $("html, body").animate({scrollTop: 0}, "slow");
         // show close btn
         $('.close-video-btn').removeClass('hide-item');
         // $('.close-video-btn').show('slow');
         var header_rows = $('.header-row');
         for (let item = 0; item < header_rows.length; item++) {
             if ($(header_rows[item]).is(':visible')) {
                 $(header_rows[item]).addClass('hide-item');
             }
         }
         $('.banner-text').hide();
         // $('body').addClass('hide-scroll-bar');
         $('.my-video').addClass('fit-screen');
         continue_interval = false;
     })

     // exit fullscreen
     document.addEventListener('fullscreenchange', exitHandler, false);
     document.addEventListener('mozfullscreenchange', exitHandler, false);
     document.addEventListener('MSFullscreenChange', exitHandler, false);
     document.addEventListener('webkitfullscreenchange', exitHandler, false);

     function exitHandler() {
         if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement) {
         } else {
             continue_interval = true;
         }
     }
 });