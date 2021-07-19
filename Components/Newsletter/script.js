import $ from 'jquery';

if( $( ".form--newsletter" ).length ) {

	let $loading = '<img class="loading" src="' + FlyntData.templateDirectoryUri + '/assets/images/loading.svg" />';
	let $newsletterForm = $( ".form--newsletter" );

	/*--------------------------------------------
	SUBMIT
	--------------------------------------------*/
	$newsletterForm.on( "submit", function( e ) {

		e.preventDefault();

		$newsletterForm.after( $loading );

		if( $( "#validation-output" ).length ) {
			$( "#validation-output" ).remove();
		}

		let url = FlyntData.ajaxurl;
		let data = "action=handle_newsletter_send&" + $newsletterForm.serialize();

		$.post( url, data, function( output ){
			$newsletterForm.after( output );
		}).done( function(){
			$( ".loading" ).remove();

			let $fname = $newsletterForm.find( '.form-field--fname' ).val();
			let $lname = $newsletterForm.find( '.form-field--lname' ).val();
			let $email = $newsletterForm.find( '.form-field--email' ).val();
			let $lang  = FlyntData.currlang;

			console.log($lname);

			$.ajax({
				url: FlyntData.templateDirectoryUri + '/Components/Newsletter/inc/mc-API-connector.php',
				type: 'POST',
				data: {
					fname: $fname,
					lname: $lname,
					email: $email,
					lang: $lang,
				},
				success: function (data) {
					$('#mc-result').html(data);
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
			
		}).always( function() {

			setTimeout(() => {
				$('#mc-result, #validation-output').hide('slow');
			}, 4500 );

		});

	});
}