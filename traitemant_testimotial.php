<?php
session_start();

require("includes/db.php");

	$q =$db->prepare('INSERT INTO testi(id_formation,email,temoignage)
										VALUES(:id_formation,:email,:temoignage)');
	$q->execute([
		'id_formation' => $_GET['id_formation'],
		'email' => $_GET['email'],
		'temoignage' => $_POST['temoignage']
	]);






	$q =$db->prepare('UPDATE formation SET formation_count = formation_count + 1 WHERE id = id');
	$q->execute([
		'id' => $_GET['id']
	]);





header('location:'.$_SERVER['HTTP_REFERER']);
