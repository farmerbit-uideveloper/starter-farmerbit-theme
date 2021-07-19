import $ from 'jquery';
// import 'salvattore';
import 'simple-lightbox';
import 'simple-lightbox/dist/simpleLightbox.min.css';

$( window ).on( 'load', function() {
	$( '.gallery .gallery__link' ).simpleLightbox({
		prevBtnCaption : '',
		nextBtnCaption : '',
	});
})

