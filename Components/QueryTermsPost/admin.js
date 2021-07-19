import $ from 'jquery';

if( typenow.length && typenow == 'uideveloper_creation' ) {
	if( $( 'div[data-layout="QueryTermsPost"] .flyntComponentScreenshot-label' ).length ) {
		$( 'div[data-layout="QueryTermsPost"] .flyntComponentScreenshot-label' ).text('Elenco tags')
	}
}