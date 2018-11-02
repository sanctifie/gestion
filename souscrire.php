<?php
session_start();

require("includes/db.php");

	$q =$db->prepare('INSERT INTO souscrire(email)
										VALUES(:email)');
	$q->execute([
		'email' => $_POST['email']
	]);
	$subject = "souscription à la FAI";
	    $message = 'Vous serez prochainement avertit en cas de nouvelle formation, séminaire ou conférence ';

	    $header = "MIME-Version: 1.0\r\n";
	    $header .= "Content-type: text/html; charset=UTF-8\r\n";
	    $header .= 'auto-responder@crescens@gmail.com'. "\r\n" . 'Reply-To: contact@nicwalle.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	    mail($_POST['email'],$subject,$message,$header);






header('location:'.$_SERVER['HTTP_REFERER']);
