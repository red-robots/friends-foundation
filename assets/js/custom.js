"use strict";

(function () {
  tinymce.PluginManager.add('BUTTON1', function (editor, url) {
    //console.log(url);
    var parts = url.split('assets');
    var themeURL = parts[0]; // Add Button to Visual Editor Toolbar

    editor.addButton('edbutton1', {
      title: 'Button Green',
      cmd: 'edbutton1',
      image: themeURL + 'assets/img/button-green.png'
    }); // Add Command when Button Clicked

    editor.addCommand('edbutton1', function () {
      var selected_text = editor.selection.getContent();

      if (selected_text.length === 0) {
        alert('Please select some text.');
        return;
      }

      var open_column = '<span class="custom-button-element green"><a data-mce-href="#" href="#"  data-mce-selected="inline-boundary" class="button-element button">';
      var close_column = '</a></span>';
      var return_text = '';
      return_text = open_column + selected_text + close_column;
      editor.execCommand('mceReplaceContent', false, return_text);
      return;
    });
  });
  tinymce.PluginManager.add('BUTTON2', function (editor, url) {
    //console.log(url);
    var parts = url.split('assets');
    var themeURL = parts[0]; // Add Button to Visual Editor Toolbar

    editor.addButton('edbutton2', {
      title: 'Button White',
      cmd: 'edbutton2',
      image: themeURL + 'assets/img/button-white.png'
    }); // Add Command when Button Clicked

    editor.addCommand('edbutton2', function () {
      var selected_text = editor.selection.getContent();

      if (selected_text.length === 0) {
        alert('Please select some text.');
        return;
      }

      var open_column = '<span class="custom-button-element white"><a data-mce-href="#" href="#"  data-mce-selected="inline-boundary" class="button-element button">';
      var close_column = '</a></span>';
      var return_text = '';
      return_text = open_column + selected_text + close_column;
      editor.execCommand('mceReplaceContent', false, return_text);
      return;
    });
  });
})();
"use strict";

/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 04.18.2024
 */
jQuery(document).ready(function ($) {
  /* Slideshow */
  var swiper = new Swiper('#slideshow', {
    effect: 'fade',

    /* "slide", "fade", "cube", "coverflow" or "flip" */
    loop: true,
    noSwiping: true,
    simulateTouch: true,
    speed: 2000,
    autoplay: {
      delay: 4000
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    on: {
      slideChange: function slideChange() {//console.log("do something...");
      }
    }
  });
  $('.entries-container').infinitescroll({
    // selector for the paged navigation (it will be hidden)
    navSelector: "#pagination",
    // selector for the NEXT link (to page 2)
    nextSelector: "#pagination .next",
    // selector for all items you'll retrieve
    itemSelector: ".item-block",
    // finished message
    loading: {
      img: assetsUrl + 'img/loader.svg',
      msgText: 'Loading new sets...',
      finishedMsg: 'No more pages to load.'
    }
  });
  Fancybox.bind("[data-fancybox]", {// Custom options
  });
  $(document).on('click', '#menu-toggle', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('#site-navigation').toggleClass('active');
    $('.navOverlay').toggleClass('show');
    $('body').toggleClass('mobile-nav-active');
  });
  $(document).on('click', 'body.mobile-nav-active .navOverlay', function (e) {
    e.preventDefault();
    $('#menu-toggle').trigger('click');
  }); //About > Team section

  $(document).on('click', '.popupinfo', function (e) {
    e.preventDefault();
    var d = new Date();
    var pagelink = $(this).attr('data-link');
    $('body').addClass('modal-open');
    $('#loaderContainer').addClass('show');
    $('#popupContent').load(pagelink + '?t=' + d.getTime() + ' #main .team-info', function () {
      setTimeout(function () {
        $('.popupContainer').addClass('show');
        $('#loaderContainer').removeClass('show');
      }, 600);
    });
  });
  $(document).on('click', '.close-popup', function (e) {
    hidePopUp();
  });
  $(document).on('keydown', function (e) {
    //Escape key
    if (e.keyCode == 27) {
      if ($('.popupContainer.show').length) {
        hidePopUp();
      }
    }
  });

  function hidePopUp() {
    $('.popupContainer .popupInner').removeClass('fadeInDown').addClass('zoomOut');
    setTimeout(function () {
      $('body').removeClass('modal-open');
      $('.popupContainer').removeClass('show');
      $('.popupContainer .popupInner').removeClass('zoomOut').addClass('fadeInDown');
    }, 600);
  }
});