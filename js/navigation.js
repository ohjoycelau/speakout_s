/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var overlay, mblMenu;

	overlay = $( '.mbl-navigation' );
	if ( ! overlay ) {
		return;
	}

	mblMenu = $( '.mbl-menu' );
	if ( ! mblMenu ) {
		return;
	}

	mblMenu.click( function(){
		$( "body" ).toggleClass( 'no-scroll' );
		overlay.toggleClass( 'active' );
	} );

} )();
