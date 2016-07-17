( function() {
	$( document ).ready( function(){
		
		console.log( "iosslider ready" );

		$( '.iosslider' ).iosSlider( {
			snapToChildren: true,
			desktopClickDrag: true,
			infiniteSlider: true,
			navSlideSelector: $('.iosslider-navigation .dot'),
			onSliderLoaded: slideNavigation,
			onSliderResize: sliderResize,
			onSlideChange: slideNavigation
		} );

		sliderResize();

		function slideNavigation( args ) {
			var currentSlide = args.currentSlideNumber;
			$( ".iosslider-navigation .dot" ).removeClass( "active" );
			$( ".iosslider-navigation .dot:nth-child(" + currentSlide +  ")" ).addClass( "active" );
			sliderResize();
		}

		function sliderResize( args ) {
			var curr = $('.iosslider').data('args').currentSlideNumber - 1;
			console.log( curr );
			var setHeight = $('.iosslider .testimonial:eq(' + curr + ')').outerHeight(true);
			$('.iosslider').css({
		        height: setHeight
		    });
		}

	});
})();