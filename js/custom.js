
jQuery(document).ready(function($) {

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

		var $firstAnimatedElement = $myCarousel.find(".item:first").find("[data-animation ^= 'animated']");
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
