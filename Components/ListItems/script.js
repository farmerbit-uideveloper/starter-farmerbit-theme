import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';

if( $( '.list-items' ).length ) {
	let $carousel = $( '.list-items' ),
    options = {
        infinite: true,
  		speed: 300,
		slidesToShow: 4,
		variableWidth: true,
		nextArrow: '<i class="gg-chevron-right slick-next"></i>',
    };

	$carousel.slick(options);

	let activeItem  = $( '.list-items__item--active' ).parents( '.slick-active' );
	$carousel.slick( 'slickGoTo', activeItem.data( 'slick-index' ) );
}

/**
 * Ajax test
 */
// $( '.list-items__link' ).on( 'click', (e) => {

// 	e.preventDefault();

// 	let data = {
// 		'action'    : 'test',
// 		'curr_lang' : FlyntData.currlang,
// 	};

// 	$.ajax({
// 		'type'		: 'post',
// 		'url'		: FlyntData.ajaxurl,
// 		'dataType'	: 'html',
// 		data
// 	})

// 	.done( function (response) {
// 		console.log(response);
// 	})

// 	.fail( function (code, status) {
// 		if( status === 'error' ) {
// 			console.log('ko');
// 		}
// 	})

// 	.always( function (xhr, status) {
// 		if( $( '.loading' ).length ) {
// 			$( '.loading' ).remove();
// 		}
// 	});

// } );