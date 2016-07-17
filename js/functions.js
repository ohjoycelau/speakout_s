( function() {
	$( document ).ready( function(){
		
		// Set up Services accordian

		$( ".slider blockquote" ).each( function(){
			$( this ).wrap( "<div class='accordian'></div>" );
			$( this ).wrapInner("<div class='inner'></div>");
			$( this ).find( "h3" ).insertBefore( $(this) );
			$( this ).hide();
		});
		$( ".slider h3" ).on( "click", function() {
			$( this ).parent().toggleClass( "active" );
			$( this ).next().slideToggle();
		} );


		// Set up Testimonials iosSlider

		console.log( "iosslider ready" );

		$( ".iosslider" ).iosSlider( {
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