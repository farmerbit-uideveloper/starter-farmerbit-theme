import $ from 'jquery';

/**
 *  Remove title if next item is empty QueryPosts components
 */
$( '[is=title]' ).each( function(e) {
	$( this ).next( '[data-results="false"]' ).length && $( this ).remove();
} );