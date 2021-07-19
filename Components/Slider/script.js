import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';


let $slider = $( '.slider' ),
    options = {
        slide: '.slide',
		arrows: false,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        speed: 1200,
        touchThreshold: 20,
        mobileFirst: true,
        rows: 0,
    };


if( $slider.data( 'autoplay' ) ) {
    options.autoplay = $slider.data( 'autoplay' );
}

if( $slider.data( 'autospeed' ) ) {
    options.autoplaySpeed = $slider.data( 'autospeed' );
}

$slider.slick(options);