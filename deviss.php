<?php
session_start();

require("includes/db.php");

	$q =$db->prepare('INSERT INTO devis(nom,prenom,email,tel,societe,poste,nombre,lieux,besoin)
										VALUES(:nom,:prenom,:email,:tel,:societe,:poste,:nombre,:lieux,:besoin)');
	$q->execute([
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'societe' => $_POST['societe'],
		'poste' => $_POST['poste'],
		'nombre' => $_POST['nombre'],
		'lieux' => $_POST['lieux'],
		'besoin' => $_POST['besoin']
	]);
	$subject = "demande de devis";
	    $message = $_POST['besoin'];

	    $header = "MIME-Version: 1.0\r\n";
	    $header .= "Content-type: text/html; charset=UTF-8\r\n";
	    $header .= $_POST['email']. "\r\n" . 'Reply-To: contact@nicwalle.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	    mail($_POST['email'],$subject,$message,$header);






header("Location: info.php?msg=devis_reussie");
