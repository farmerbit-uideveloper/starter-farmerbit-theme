import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import '@fancyapps/fancybox';
import '@fancyapps/fancybox/dist/jquery.fancybox.min.css';

let $slider = $( 'div[is=hero-slider] .slider' ),
    options = {
        slide: '.slide',
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        speed: 1200,
        arrows: false,
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

$('[data-fancybox]').fancybox({
    youtube : {
        controls : 1,
        showinfo : 0,
        rel : 0,
    },
});

$('.slide-arrow-next').click(function() {
    $slider.slick('slickNext');
});