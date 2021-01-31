import $ from 'jquery';

import matchHeight from "jquery-match-height";



$(window).on( 'load', function () {

    if( $( '.same-height' ).length ) {
        let matchHeightOptions = {
            byRow: true,
            property: 'height',
            target: null,
            remove: false,
        };
    
        $( '.same-height' ).matchHeight(matchHeightOptions);
    }

    if($('.single-block').length){        
        $('.single-block').each(function() {

            var elemenetSidebySide = $(this);
            if(elemenetSidebySide.find('.image').hasClass('right') && elemenetSidebySide.find('.single-block__figure').hasClass('strech-lg-right')){
                var position = elemenetSidebySide.find('.image').offset();
                elemenetSidebySide.find('.single-block__figure').css('left',position.left);
            }
        });

        $(window).resize(function() {
            $('.single-block').each(function() {
                var elemenetSidebySide = $(this);
                if(elemenetSidebySide.find('.image').hasClass('right') && elemenetSidebySide.find('.single-block__figure').hasClass('strech-lg-right')){
                    var position = elemenetSidebySide.find('.image').offset();
                    elemenetSidebySide.find('.single-block__figure').css('left',position.left);
                }
            });
        });
    }
    
});