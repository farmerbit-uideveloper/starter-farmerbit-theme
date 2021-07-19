import $ from 'jquery';

/*--------------------------------------------
Page Transition
--------------------------------------------*/
$(window).on( 'load', function() {
    $( 'body' ).removeClass( 'no-js' ).addClass( 'js' );
});

$(window).on( 'load', function() {
	$('.mainContent').animate({
	    "opacity": 1
	}, 600 ); 
	
	$( 'a:not(a[href^="mailto:"]):not(a[href^="tel:"]):not(a[target^="_blank"]):not([href="#"]):not(.bp-xs .menu-link):not(.bp-sm .menu-link):not(.gallery__link):not(.hamburger):not(.switch-wpml__active):not(#search-toggle)' ).on( 'click', function(event){
		event.preventDefault();
		if( $( '.pageTransition' ).length && $( '.pageTransition' ).is( ':visible' ) ) {
			$( '.pageTransition' ).addClass( 'circle-expand' );
			
			var url = $(this).attr('href');
			setTimeout(() => {
				window.location.assign(url);                    
			}, 600);
		}
	});
});

$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
        if( $( '.hamburger' ).length && $( '.hamburger' ).is(':visible') ) {
            $( '.hamburger' ).trigger('click');
        }

        if( $( '.pageTransition' ).length && $( '.pageTransition' ).is( ':visible' ) ) {
            $( '.pageTransition' ).removeClass( 'circle-expand' );
        }
    }
});