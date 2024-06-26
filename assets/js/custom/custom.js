/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 04.18.2024
 */

jQuery(document).ready(function ($) {
  
  $('.main-navigation #primary-menu-list li').each(function(){
    if( $(this).hasClass('menu-item-has-children') ) {
      if( $(this).find('ul.sub-menu').length ) {
        var subMenu = $(this).find('ul.sub-menu');
        $('<button class="dropdown-toggle" aria-label="Dropdown Items"><span></span></button>').insertBefore(subMenu);
      }
    }
  });

  $(document).on('click','.main-navigation .dropdown-toggle', function(){
    $(this).next().slideToggle();
    $(this).toggleClass('active');
  });

  /* Slideshow */
  var swiper = new Swiper('#slideshow', {
    effect: 'fade', /* "slide", "fade", "cube", "coverflow" or "flip" */
    loop: true,
    noSwiping: true,
    simulateTouch : true,
    speed: 2000,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      slideChange: function () {
        //console.log("do something...");
      }
    }
  });

  /* Slideshow */
  const swiperTestimonials = new Swiper('#swiperTestimonials', {
    effect: 'slide', /* "slide", "fade", "cube", "coverflow" or "flip" */
    loop: true,
    autoHeight: true,
    noSwiping: true,
    simulateTouch : true,
    speed: 2000,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      slideChange: function () {
        //console.log("do something...");
      }
    }
  });


  $('.entries-container').infinitescroll({
      // selector for the paged navigation (it will be hidden)
      navSelector  : "#pagination",
      // selector for the NEXT link (to page 2)
      nextSelector : "#pagination .next",
      // selector for all items you'll retrieve
      itemSelector : ".item-block",
      // finished message
      loading: {
              img: assetsUrl + 'img/loader.svg',
              msgText: 'Loading new sets...',
              finishedMsg: 'No more pages to load.'
          }
      }
    );

  Fancybox.bind("[data-fancybox]", {
    // Custom options
  });

  $(document).on('click','#menu-toggle', function(e){
    e.preventDefault();
    $(this).toggleClass('active');
    $('#site-navigation').toggleClass('active');
    $('.navOverlay').toggleClass('show');
    $('body').toggleClass('mobile-nav-active');
  });
  $(document).on('click','body.mobile-nav-active .navOverlay', function(e){
    e.preventDefault();
    $('#menu-toggle').trigger('click');
  });


  //About > Team section
  $(document).on('click','.popupinfo', function(e){
    e.preventDefault();
    var d = new Date();
    var pagelink = $(this).attr('data-link');
    $('body').addClass('modal-open');
    $('#loaderContainer').addClass('show');
    $('#popupContent').load(pagelink+'?t='+d.getTime()+' #main .team-info', function(){
      setTimeout(function(){
        $('.popupContainer').addClass('show');
        $('#loaderContainer').removeClass('show');
      },600);
    });
  });

  $(document).on('click','.close-popup', function(e){
    hidePopUp();
  });

  $(document).on('keydown', function(e){
    //Escape key
    if(e.keyCode==27) {
      if( $('.popupContainer.show').length ) {
        hidePopUp();
      }
    }
  });

  function hidePopUp() {
    $('.popupContainer .popupInner').removeClass('fadeInDown').addClass('zoomOut');
    setTimeout(function(){
      $('body').removeClass('modal-open');
      $('.popupContainer').removeClass('show');
      $('.popupContainer .popupInner').removeClass('zoomOut').addClass('fadeInDown');
    },600);
  }
  
  //ANNOUNCEMENT BAR
  $('.announcementClose').click(function(e){
    e.preventDefault();
    sessionStorage.setItem("friends-foundation-announcement", "hide");
    $('.announcementBar').hide();
  });

  if( typeof sessionStorage.getItem("friends-foundation-announcement")!="undefined" ) {
    var announcementBarStat = sessionStorage.getItem("friends-foundation-announcement");
    if(announcementBarStat=='hide') {
      $('.announcementBar').remove();
    } else {
      $('.announcementBar').show();
    }
  } else {
    $('.announcementBar').show();
  }


}); 



