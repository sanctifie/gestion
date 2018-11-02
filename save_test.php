<?php 
session_start();
require("includes/db.php");
include ('bdd/init.php');
$tableaux_reponse=isset($_POST['reponse'])?$_POST['reponse']:'';

if ($tableaux_reponse=='') {
	echo "veuillez cocher au moin une reponse";
}
else
{
	foreach ($tableaux_reponse as $key => $value) {
		
		$reponse=$value; /*  a^b */


		$separate_question_reponse=explode('^', $reponse);

		if (!empty($separate_question_reponse)) {
			
			$reponse1=$separate_question_reponse[0];
			$question=$separate_question_reponse[1];

			$verifications=verification_success($reponse1,$question);
			if (!empty($verifications)) {
				?>
					<h2 style="color: green">Bonne reponse</h2>
				<?php

			}
			else
			{
				?>
					<h2 style="color: #ff0000">Mauvaise reponse</h2>
				<?php
			}



			// insere les reponse de l'utilisateur 
			
			$q =$db->prepare('SELECT id FROM evaluation
												WHERE user_id=:user_id AND :id_question=:id_question AND :id_reponse=:id_reponse');
			$q->execute([
				'user_id' => $_SESSION['auth']->id,
				'id_question' => $question,
				'id_reponse' => $reponse1,
				
			]);

				$q =$db->prepare('INSERT INTO evaluation(user_id,id_question,id_reponse)
													VALUES(:user_id,:id_question,:id_reponse)');
				$q->execute([
					'user_id' => $_SESSION['auth']->id,
					'id_question' => $question,
					'id_reponse' => $reponse1,
				]);
						
			// insere les reponse de l'utilisateur 
			
			




			
		}


	}
}

 ?>