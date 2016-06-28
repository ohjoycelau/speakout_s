( function() {
	$( document ).ready( function(){
		console.log( "ready" );
		$( '.iosslider' ).iosSlider( {
			snapToChildren: true,
			desktopClickDrag: true,
			infiniteSlider: true,
			navSlideSelector: $('.iosslider-navigation .dot'),
			onSliderLoaded: slideNavigation,
			onSlideChange: slideNavigation
		} );

		function slideNavigation( args ) {
			var currentSlide = args.currentSlideNumber;
			$( ".iosslider-navigation .dot" ).removeClass( "active" );
			$( ".iosslider-navigation .dot:nth-child(" + currentSlide +  ")" ).addClass( "active" );
		}

	});
})();