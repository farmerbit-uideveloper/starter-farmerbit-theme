import $ from 'jquery';

import 'slick-carousel';
import 'slick-carousel/slick/slick.css';

let $carousel = $( 'div[is=carousel] .carousel' ),
	options = {
		slide: 'div[is=carousel] .carousel-slide',
		slidesToShow: 1,
		arrows: true,
		infinite: true,
		touchThreshold: 20,
	    mobileFirst: true,
	    rows: 0,
		centerMode: true,
		centerPadding: '160px',
		prevArrow: '<i class="gg-chevron-left slick-prev"></i>',
		nextArrow: '<i class="gg-chevron-right slick-next"></i>',
	};

if( $carousel.data( 'cols' ) ) {

	let $cols = $carousel.data( 'cols' ).split('-');

	options.responsive = [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: parseInt($cols[3]),
				slidesToScroll: 1,
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
} else {
	options.responsive = [
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerMode: true,
				centerPadding: '160px',
			}
		},
		{
			breakpoint: 570,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '60px',
			}
		}, 
		{
			breakpoint: 0,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '30px',
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

$carousel.slick(options); 