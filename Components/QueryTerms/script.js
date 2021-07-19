import $ from 'jquery';

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';

let $carousel = $( 'div[is=carousel-terms] .carousel' ),
	options = {
		slide: 'div[is=carousel-terms] .carousel-slide',
		arrows: false,
		infinite: false,
		touchThreshold: 20,
	    mobileFirst: true,
	    rows: 0,
	};

if( $carousel.data( 'cols' ) ) {

	let $cols = $carousel.data( 'cols' ).split('-');

	options.responsive = [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: parseInt($cols[3]),
				slidesToScroll: 1
			}
		}, 
		{
			breakpoint: 768,
			settings: {
				slidesToShow: parseInt($cols[2]),
				slidesToScroll: 1
			}
		}, 
		{
			breakpoint: 570,
			settings: {
				slidesToShow: parseInt($cols[1]),
				slidesToScroll: 1
			}
		}, 
		{
			breakpoint: 320,
			settings: {
				slidesToShow: parseInt($cols[0]),
				slidesToScroll: 1
			}
		}
	];
}

if( $carousel.data( 'autoplay' ) ) {
    options.autoplay = $carousel.data( 'autoplay' );
}

if( $carousel.data( 'autoplayspeed' ) ) {
    options.autoplaySpeed = $carousel.data( 'autoplayspeed' );
}

$carousel.on('init', function (event, slick) {
    slick.$slides.css('height', slick.$slideTrack.height() + 'px');
});

$carousel.slick(options);



/**
 *  Carousel Nav
 */
if( $( 'div[is=carousel-terms] .carousel__nav' ).length ) {

	// PREV
	$( 'div[is=carousel-terms] .carousel__prev' ).on( 'click', function(e) {
		e.preventDefault();

	    $carousel.slick( 'slickPrev' );
	});

	// NEXT
	$( 'div[is=carousel-terms] .carousel__next' ).on( 'click', function(e) {
		e.preventDefault();

		$carousel.slick( 'slickNext' );
	});

}

if( $( 'div[is=carousel-terms]' ).length ) {
	const urlParams = new URLSearchParams(window.location.search);

	if( ! urlParams.has('term') ) {
		console.log($( '.carousel-slide' ).first().find( '.carousel-slide__link' ));
		$( '.carousel-slide' ).first().find( '.carousel-slide__link' )[0].click();
	}
}