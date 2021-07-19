import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import '@fancyapps/fancybox';
import '@fancyapps/fancybox/dist/jquery.fancybox.min.css';
import {debounce, onResize} from '../../assets/main.js';


let $slider = $( 'div[is=hero-slider] .hero-slider' ),
    options = {
        slide: '.slide',
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

const heroSliderHeight = () => {
	return $slider.height( $( window ).height() - $( '.menu-navigation' ).outerHeight() );
}

const sliderHeightOnResize = debounce((ev) => {
	heroSliderHeight();
}, 250);
window.addEventListener('resize', sliderHeightOnResize);

onResize( heroSliderHeight );

// $('[data-fancybox]').fancybox({
//     youtube : {
//         controls : 1,
//         showinfo : 0,
//         rel : 0,
//     },
// });