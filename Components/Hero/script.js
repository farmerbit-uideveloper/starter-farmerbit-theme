import $ from 'jquery';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import matchHeight from "jquery-match-height";

$(document).ready(function() {
    if($( '[is=hero] .hero__carousel' ).length){
        $( '[is=hero] .hero__carousel' ).slick({
            fade: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            pauseOnHover: false,
            speed: 400,
            arrows: true,
            dots: false,
        });
    }    

    paddingCarousel();

    $(window).resize(function() {
        paddingCarousel();
    });

    $( '.hero__item-title' ).matchHeight();

    $('.hero__carousel').css('top',$('.hero__item-title').outerHeight());
    
});

function paddingCarousel() {
    if( $('.hero__carousel').length ){
        if($(window).width() >= 576) {
            $('.hero__carousel').css('marginRight', $('.carousel-width').offset().left * -1 );
        }
    }    
}