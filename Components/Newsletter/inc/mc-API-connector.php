<?php

$action = 'subscribe'; /* $_POST["action"]; */
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$lang = $_POST["lang"]; /* FC */
// $interest = $_POST["interest"];
$debug = /* isset($_POST["debug"])?$_POST["debug"]:*/ 0;
$apikey = '90e33fcfb311a3e2d32b46ed07a14f45-us11';
$listid = 'e50c813a82'; /* $_POST["listid"]; */
// $listid = $_POST["listid"];
$server = 'us11.';

if ($debug) {
	echo "*Robot voice* : Bleep bleep. Debugging is on master. <br><br>";
}

if (!isset($email)) {
	echo "*Robot voice*: No email master, I don't know what to do now. <br><br>";
}

switch($action) {
	case "subscribe":
	if ($debug) {
		echo "*Robot voice* : Starting subscribe <br><br>";
	}
	mc_subscribe($email, $fname, $lname, $debug, $apikey, $listid, $server, $lang);
	if ($debug) {
		echo "*Robot voice* : Function didn't complete for some reason.<br><br>";
	}
	break;
	case "addinterest":
	if ($debug) {
		echo "*Robot voice* : Starting interest add <br><br>";
	}
	mc_addinterest($email, $interest, $debug, $apikey, $listid, $server);
	if ($debug) {
		echo "*Robot voice* : Function didn't complete for some reason.<br><br>";
	}
	break;
	case "reminterest":
	if ($debug) {
		echo "*Robot voice* : Starting interest removal <br><br>";
	}
	mc_reminterest($email, $interest, $debug, $apikey, $listid, $server);
	if ($debug) {
		echo "*Robot voice* : Function didn't complete for some reason.<br><br>";
	}
	break;
	case "changename":
	mc_changename($fname, $lname, $email, $debug, $apikey, $listid, $server);
	if ($debug) {
		echo "*Robot voice* : Function didn't complete for some reason.<br><br>";
	}
	break;
	case "checklist":
	mc_checklist($email, $debug, $apikey, $listid, $server);
	if ($debug) {
		echo "*Robot voice* : Function didn't complete for some reason.<br><br>";
	}
	break;
	default:
	echo "*JRobot voice* : Your action is not valid master.<br><br>";
	break;
}

function mc_subscribe($email, $fname, $lname, $debug, $apikey, $listid, $server, $lang) {
	$auth = base64_encode( 'user:'.$apikey );
	$data = array(
		'apikey'        => $apikey,
		'email_address' => $email,
		'status'        => 'subscribed',
		'merge_fields'  => array(
			'FNAME' => $fname,
			'LNAME' => $lname,
			)
		);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '.$auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	if ($debug) {
		var_dump($result);
		die('<br><br>*Creepy etheral voice* : Mailchimp executed subscribe');
	}

	$result = json_decode($result, true);

	if( $result['status'] == 'subscribed' ) :
		switch( $lang ) {
			case 'it':
				$response = '<div class="newsletter-request alert alert-success"><p>Grazie. Ora siete iscritti alla newsletter! 🙂</p></div>';
				break;
			case 'en':
				$response = '<div class="newsletter-request alert alert-success"><p>Thank you. You are now subscribed to our newsletter!</p></div>';
				break;
			case 'de':
				$response = '<div class="newsletter-request alert alert-success"><p>Vielen Dank. Sie sind jetzt abonniert!</div>';
				break;
		};
	elseif( $result['title'] == 'Member Exists' ) :
		switch( $lang ) {
			case 'it':
				$response = '<div class="newsletter-request alert alert-warning"><p>Questa mail è già iscritta alla nostra lista newsletter.</p></div>';
				break;
			case 'en':
				$response = '<div class="newsletter-request alert alert-warning"><p>This email is already subscribed to our newsletter list.</p></div>';
				break;
			case 'de':
				$response = '<div class="newsletter-request alert alert-warning"><p>Diese E-Mail ist bereits in unserer Newsletter-Liste abonniert.</p></div>';
				break;
		};
	else:
		switch( $lang ) {
			case 'it':
				$response = '<div class="newsletter-request alert alert-danger"><p>Si sono verificati dei problemi tecnici. Ci scusiamo e vi intiamo a riprovare più tardi.</p></div>';
				break;
			case 'en':
				$response = '<div class="newsletter-request alert alert-danger"><p>We found some technical issues. We are truly sorry. Please try again later.</p></div>';
				break;
			case 'de':
				$response = '<div class="newsletter-request alert alert-danger"><p>Wir haben einige technische Fragen gefunden. Es tut uns sehr leid. Bitte versuchen Sie es später noch einmal.</p></div>';
				break;
		};
	endif;

	echo $response;

	die();
};

function mc_changename($fname, $lname, $email, $debug, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );
	$data = array(
		'apikey'        => $apikey,
		'email_address' => $email,
		'merge_fields'  => array(
			'FNAME' => $fname,
			'LNAME' => $lname,
			)
		);
	$json_data = json_encode($data);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '. $auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	if ($debug) {
		var_dump($result);
		die('<br><br>*Creepy etheral voice* : Mailchimp executed interest add.');
	}

	die();
}


function mc_addinterest($email, $interest, $debug, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );
	$data = array(
		'apikey'        => $apikey,
		'email_address' => $email,
		'interests' => array(
			$interest => true
			)
		);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '. $auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	if ($debug) {
		var_dump($result);
		die('<br><br>*Creepy etheral voice* : Mailchimp executed interest add.');
	}

	die();
}

function mc_reminterest($email, $interest, $debug, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );

	$data = array(
		'apikey'        => $apikey,
		'email_address' => $email,
		'interests' => array(
			$interest => false
			)
		);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '. $auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	if ($debug) {
		var_dump($result);
		die('<br><br>*Creepy etheral voice* : Mailchimp executed interest removal');
	}

	die();
}

function mc_checklist($email, $debug, $apikey, $listid, $server) {
	$userid = md5($email);
	$auth = base64_encode( 'user:'. $apikey );

	$data = array(
		'apikey'        => $apikey,
		'email_address' => $email
		);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
		'Authorization: Basic '. $auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

	$result = curl_exec($ch);

	if ($debug) {
		var_dump($result);
	}

	$json = json_decode($result);

	echo $json->{'status'};

	die();
}

?>
