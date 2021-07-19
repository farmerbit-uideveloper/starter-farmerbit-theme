<?php

function handle_newsletter_send() {

	// Campi del form
	$nome = isset( $_POST['fname'] ) ? trim( $_POST['fname'] ) : false;
	$cognome = isset( $_POST['lname'] ) ? trim( $_POST['lname'] ) : false;
	$mail = isset( $_POST['email'] ) ? trim( $_POST['email'] ) : false;
	$privacy = isset( $_POST['privacy'] ) ? trim( $_POST['privacy'] ) : false;
	$_fc_token = isset( $_POST['_fc_token'] ) ? $_POST['_fc_token'] : false;


	$errors = array(); // Array di messaggi di errore
	$output = ''; // Stringa HTML di output

	// // Validazione
	if( empty( $_fc_token ) || wp_verify_nonce( $_fc_token, 'fc-form-request' ) === false ) {
		$errors[] = __( 'Unfortunately we found some technical issue... We\'re truly sorry. Please try again later.', 'uideveloper' );
	}

	if( ! $nome ) {
		$errors[] = __( 'Name is a required field', 'uideveloper' );
	}

	if( ! $cognome ) {
		$errors[] = __( 'Lastname is a required field', 'uideveloper' );
	}

	if( ! $mail ) {
		$errors[] = __( 'The email field can\'t be empty', 'uideveloper' );
	}

	if( ! filter_var( $mail, FILTER_VALIDATE_EMAIL ) ) {
		$errors[] = __( 'Email not valid', 'uideveloper' );
	}

	if( ! $privacy ) {
		$errors[] = __( 'Devi Spuntare la casella privacy per acconsentire la richiesta', 'uideveloper' );
	}

	if( count( $errors ) > 0 ) { // Ci sono errori

		$output = '<div class="clear"></div><div id="validation-output">';
		foreach( $errors as $error ) {
			$output .= '<div class="alert alert-danger">' . $error . '</div>';
		}
		$output .= '</div>';

	} else { // Invio e-mail

		$output  = '<div class="clear"></div><div id="validation-output">';
		$output .= '<div class="alert alert-success"><p>' . __( 'Richiesta inviata con successo', 'uideveloper' ) . '</p></div>';
		$output .= '</div>';

	}

	echo $output; // Restituisco la stringa HTML

	exit(); // Obbligatorio!

}

add_action( 'wp_ajax_handle_newsletter_send', __NAMESPACE__ . '\\handle_newsletter_send' ); // Utenti loggati
add_action( 'wp_ajax_nopriv_handle_newsletter_send', __NAMESPACE__ . '\\handle_newsletter_send' ); // Tutti i visitatori