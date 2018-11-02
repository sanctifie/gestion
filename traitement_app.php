<?php
session_start();

require("includes/db.php");
$q =$db->prepare('SELECT id FROM users_formation
									WHERE user_id=:user_id AND :id_formation=:id_formation AND maill=:maill');
$q->execute([
	'user_id' => $_GET['id_apprenant'],
	'id_formation' => $_GET['id_formation'],
		'maill' => $_GET['email']
]);

	$q =$db->prepare('INSERT INTO users_formation(user_id,id_formation,maill)
										VALUES(:user_id,:id_formation,:maill)');
	$q->execute([
		'user_id' => $_GET['id_apprenant'],
		'id_formation' => $_GET['id_formation'],
		'maill' => $_GET['email']
	]);
	$subject = "La F.A.I - confirmation de la préinscription";
	    $message = '
	        <html lang="en" style="font-family: sans-serif;">
	            <head>
	                <meta charset="UTF-8">
	            </head>
	            <body>
	                Votre préinscription s"est effectué avec succes veuillez vous rapprochez de nos locaux pour finaliser votre inscription.
	                <br/>Cette étape est indispensable pour suivre la formation.
	            </body>
	        </html>
	    ';

	    $header = "MIME-Version: 1.0\r\n";
	    $header .= "Content-type: text/html; charset=UTF-8\r\n";
	    $header .= 'From: no-reply@nicwalle.com' . "\r\n" . 'Reply-To: contact@nicwalle.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	    mail($_GET['email'],$subject,$message,$header);





	$q =$db->prepare('UPDATE formation SET formation_count = formation_count + 1 WHERE id = id');
	$q->execute([
		'id' => $_GET['id']
	]);





header('location:'.$_SERVER['HTTP_REFERER']);
