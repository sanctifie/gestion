<?php
session_start();

require("includes/db.php");
$q =$db->prepare('SELECT id FROM users_conference
									WHERE user_id=:user_id AND id_formation=:id_formation');
$q->execute([
	'user_id' => $_GET['id_apprenant'],
	'id_formation' => $_GET['id_formation']
]);

$count = $q->rowCount();
if ($count > 0) {
	$q =$db->prepare('DELETE FROM users_conference
                    WHERE user_id=:user_id AND id_formation=:id_formation');
	$q->execute([
		'user_id' => $_GET['id_apprenant'],
		'id_formation' => $_GET['id_formation']
	]);

	/*$q =$db->prepare('UPDATE formation SET formation_count = formation_count - 1 WHERE id = id');
	$q->execute([
		'id' => $_GET['id']
	]);*/
}




header('location:'.$_SERVER['HTTP_REFERER']);
