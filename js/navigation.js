/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {

	console.log( "site-header sticky ready" );

	$( ".site-header" ).sticky();

	var overlay, mblMenu;

	overlay = $( '.mbl-navigation' );
	if ( ! overlay ) {
		return;
	}

	mblMenu = $( '.mbl-menu' );
	if ( ! mblMenu ) {
		return;
	}

	mblMenu.click( function() {
		$( "body" ).toggleClass( 'no-scroll' );
		$( ".site-header" ).toggleClass( 'active' );
		overlay.toggleClass( 'active' );
		// $(".site-header").unstick();
	} );

	$( window ).resize( function() {
		var width = $( window ).innerWidth();
		if ( width > 768 && overlay.hasClass( 'active' ) ) {
			$( "body" ).removeClass( 'no-scroll' );
			$( ".site-header" ).removeClass( 'active' );
			overlay.removeClass( 'active' );
		}
	} );

} )();
