<?php
session_start();

require("includes/db.php");

	$q =$db->prepare('INSERT INTO contact(nom,email,sujet,message)
										VALUES(:nom,:email,:sujet,:message)');
	$q->execute([
		'nom' => $_POST['nom'],
		'email' => $_POST['email'],
		'sujet' => $_POST['sujet'],
		'message' => $_POST['message']
	]);
	$subject = $_POST['sujet'];
	    $message = $_POST['message'];

	    $header = "MIME-Version: 1.0\r\n";
	    $header .= "Content-type: text/html; charset=UTF-8\r\n";
	    $header .= $_POST['email']. "\r\n" . 'Reply-To: contact@nicwalle.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	    mail($_POST['email'],$subject,$message,$header);






header("Location: info.php?msg=contact_reussie");
