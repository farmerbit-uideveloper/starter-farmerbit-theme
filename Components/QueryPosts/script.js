import $ from 'jquery';
import 'salvattore';
import salvattore from 'salvattore';

/*--------------------------------------------
Infinite scroll
--------------------------------------------*/
if( $( '.load-more' ).length ) {

	let loading = '<div class="loading"><img src="' + FlyntData.templateDirectoryUri + '/assets/images/loading.svg" ></div>',
		container = $( '#grid' ),
		found = parseInt( container.data( 'found' ) ),
		loadMore = $( '.load-more' );

	loadMore.on( 'click', (e) => {

		e.preventDefault();

		let href = loadMore.attr( 'href' ),
			hrefSplit = href.split("/"),
			hrefIndex = parseInt(hrefSplit.length - 2),
			page = parseInt(hrefSplit[hrefIndex]),
			hrefNext = href.replace(/\d+/g, (page + 1));

			loadMore.attr( 'href', hrefNext );

			$.ajax({
				'url': href,
				'type': 'post',
				'dataType': 'html',
				'beforeSend': function () {
					loadMore.parent().prepend( loading );
				}
			})

			.done( function (response) {
				let items = $(response).find( '#grid' )[0].children;
				let itemsArray = Array.from(items);
				let grid = document.getElementById('grid');
				salvattore.appendElements(grid, itemsArray);
				if( items.length ) {
					// container.append(itemsArray);
					if( found == parseInt( container.find( '> div' ).length ) ) {
						loadMore.remove();
					}
				} else {
					loadMore.remove();
				}
			})

			.fail( function (code, status) {
				if( status === 'error' ) {
					loadMore.remove();
				}
			})

			.always( function (xhr, status) {
				if( $( '.loading' ).length ) {
					$( '.loading' ).remove();
				}
			});

	} );
}
