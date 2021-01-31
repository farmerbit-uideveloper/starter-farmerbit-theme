import $ from 'jquery';

import matchHeight from "jquery-match-height";

if( $( '.same-height' ).length ) {
    let matchHeightOptions = {
        byRow: true,
        property: 'height',
        target: null,
        remove: false,
    };

    $( '.same-height' ).matchHeight(matchHeightOptions);
}