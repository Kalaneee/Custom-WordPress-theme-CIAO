
jQuery(document).ready(function($) {



	  // Add slideDown animation to Bootstrap dropdown when expanding.
	  $('.dropdown').on('show.bs.dropdown', function() {
    	$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

	  // Add slideUp animation to Bootstrap dropdown when collapsing.
	  $('.dropdown').on('hide.bs.dropdown', function() {
	    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	  });

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
