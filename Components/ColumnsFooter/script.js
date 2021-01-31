import $ from 'jquery';


$(document).ready(function() {
    if ($('.fixedCta').length) {
        $('footer').css('paddingBottom', $('.fixedCta').outerHeight());
    }
});

$(window).resize(function() {
    if ($('.fixedCta').length) {
        $('footer').css('paddingBottom', $('.fixedCta').outerHeight());
    }
});