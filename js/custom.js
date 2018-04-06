
jQuery(document).ready(function($) {

	// Animate the CIAO logo on hover
	$('.logo img').on({
	    mouseenter: function(){
	        $(this).animate({width: '+=10px', height: '+=10px'}, 500);
	    },
	    mouseleave: function(){
	        $(this).animate({width: '-=10px', height: '-=10px'}, 500);
	    }
	});

	// Add slideDown animation to Bootstrap dropdown when expanding.
	$('.dropdown').on('show.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});

	// Add slideUp animation to Bootstrap dropdown when collapsing.
	$('.dropdown').on('hide.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});


	// Add responsive to all img
	$('.alignleft').addClass('img-fluid');
	$('.aligncenter').addClass('img-fluid');
	$('.alignright').addClass('img-fluid');


	// Check if prec / next article btn is empty
	if ( !($('button.btn-prev-art a').length) ) {
	 $('.btn-prev-art').css({
	 	'background-color' : 'transparent',
	 	'border-color' : 'transparent'
	 });
	}

	if ( !($('button.btn-next-art a').length) ) {
	 $('.btn-next-art').css({
	 	'background-color' : 'transparent',
	 	'border-color' : 'transparent'
	 });
	}

	// Change the text of the pagination on mobile
	if ($(window).width() < 780) {

	 	$('.prev.page-numbers').text('«');
	 	$('.next.page-numbers').text('»');
	 	$('.pagination-wrapper').css('width', '100%').addClass('d-flex').addClass('justify-content-around');
	 }
	  
	// Give bootstrap class to input form - Commande page, Contact & devenir membre
	if (document.getElementById("commandeCiao") || document.getElementById("contact") || document.getElementById("devenir-membre")) {
		$("input, textarea, select").each(function(index) {
			
			if (!($(this).hasClass("form-control")) ) {
				$(this).addClass('form-control');
			}
		});

		$("input[type=checkbox]").each(function(index) {
			console.log(index);
			
			if (!($(this).hasClass("form-check-inputl")) ) {
				$(this).addClass('form-check-input');
				$(this).removeClass('form-control');
			}
		});

	} // fin page commande & contact

	// Make the cards the same height - Commande Page
	if (document.getElementById("commandeCiao")) {

		// Get an array of all element heights
		var elementHeights = $('.card').map(function() {
			return $(this).height();
		}).get();

		// Math.max takes a variable number of arguments
		// `apply` is equivalent to passing each height as an argument
		var maxHeight = Math.max.apply(null, elementHeights);

		// Set each height to the max height
		$('.card').height(maxHeight);

	} // fin page commande



	 // Carousel
	if (document.getElementById("slider-01")) {

		var $myCarousel = $('.carousel');

		// starts the carousel
		$myCarousel.carousel({
			interval: 5000
		});


		$myCarousel.on('slide.bs.carousel', function (e) {

			var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
			doAnimations($animatingElems);
		});

		var $firstAnimatedElement = $myCarousel.find(".carousel-item:first").find("[data-animation ^= 'animated']");
		doAnimations($firstAnimatedElement); // animation au 1er chargement de la page

		function doAnimations(elems) {
			var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

			elems.each(function () {
				var $this = $(this);
				$animationType = $this.data('animation');
				$this.addClass($animationType).one(animEndEv, function () {
					$this.removeClass($animationType);
				});


			}); // fin du each

		} // doAnimations


	} // fin document.getElementById


}); // fin du ready
