import './scripts/publicPath'
import './admin.scss'

function importAll (r) {
  r.keys().forEach(r)
}

/**
 *  FC - Collapse all acf flexible layout
 */
 if( jQuery( '.acf-flexible-content .layout' ).length ) {
	jQuery( '.acf-flexible-content .layout' ).each( function() {
		! jQuery( this ).hasClass( '-collapsed' ) && jQuery( this ).addClass( '-collapsed' );
	});
}

importAll(require.context('../Components/', true, /\/admin\.js$/))
