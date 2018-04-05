
jQuery(document).ready(function($) {

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
