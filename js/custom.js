
jQuery(document).ready(function ($) {

  // Animate the CIAO logo on hover
  $('.logo img').on({
    mouseenter: function () {
      $(this).animate({ width: '+=10px', height: '+=5px' }, 500);
    },
    mouseleave: function () {
      $(this).animate({ width: '-=10px', height: '-=5px' }, 500);
    }
  });


  // Color the dropdown if active
  var listDropdown = ['ciao.ch', 'Documents', 'Devenir membre'];
  var elemDropdownActive = $('.current-menu-item > a').attr('title');
  if (listDropdown.indexOf(elemDropdownActive) != -1) {
    $('.dropdown-toggle.nav-link').css('color', '#7CD0F5');
  }


  // Add slideDown animation to Bootstrap dropdown when expanding.
  $('.dropdown').on('show.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  });


  // Add slideUp animation to Bootstrap dropdown when collapsing.
  $('.dropdown').on('hide.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  });


  // Add responsive to all img
  $('.alignleft').addClass('img-fluid');
  $('.aligncenter').addClass('img-fluid');
  $('.alignright').addClass('img-fluid');


  // Check if prec / next article btn is empty
  if (!($('button.btn-prev-art a').length)) {
    $('.btn-prev-art').css({
      'background-color': 'transparent',
      'border-color': 'transparent'
    });
    $('.btn-prev-art').addClass('hide-after');
  }

  if (!($('button.btn-next-art a').length)) {
    $('.btn-next-art').css({
      'background-color': 'transparent',
      'border-color': 'transparent'
    });
    $('.btn-next-art').addClass('hide-after');
  }


  // Change the text of the pagination on mobile
  if ($(window).width() < 780) {
    $('.prev.page-numbers').text('«');
    $('.next.page-numbers').text('»');
    $('.pagination-wrapper').css('width', '100%').addClass('d-flex').addClass('justify-content-around');
  }


  // Give bootstrap class to input form - Commande page, Contact & devenir membre
  if (document.getElementById('commandeCiao') || document.getElementById('contact') || document.getElementById('devenir-membre')) {
    $('input, textarea, select').each(function (index) {

      if (!($(this).hasClass('form-control'))) {
        $(this).addClass('form-control');
      }
    });

    $('input[type=checkbox]').each(function (index) {

      if (!($(this).hasClass('form-check-input'))) {
        $(this).addClass('form-check-input');
        $(this).removeClass('form-control');
      }
    });

  } // End page commande & contact


  // Make the cards the same height - Commande Page
  if (document.getElementById('commandeCiao')) {

    // Get an array of all element heights
    var elementHeights = $('.card').map(function () {
      return $(this).height();
    }).get();

    // Math.max takes a variable number of arguments
    // `apply` is equivalent to passing each height as an argument
    var maxHeight = Math.max.apply(null, elementHeights);
    $('.card').height(maxHeight);


    // Give initial value 0 to all input
    $('.card-body input').val(0);


  } // End page commande


  // Add line before h1 in articles
  var blacklistPages = ['commander']; // Add here the names of the pages you want to blacklist from this line effect on h1
  var path = window.location.pathname;
  var page = path.split('/')[1]

  if (blacklistPages.indexOf(page) === -1) {
    if (!$('h1').parent().is('.col-12')) {
      $('h1').before('<hr class="divider"></hr');
    }
  }


  // Cancel click on Footer's categories
  $('.footer .menu-item-has-children > a').click(function(e) {
    e.preventDefault();
  })

}); // end of Ready
