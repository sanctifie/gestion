<?php
    /*session_start();*/
	require 'includes/functions.php';
include ('bdd/init.php');
	logged_only();

?>
<?php require 'includes/header2.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Séance de question / reponses</h1>
			</div>
		</div>
	</div>
	<div class="row">
		
			<form class="" action="save_test.php" method="POST">
				<?php 
				$id=$_GET['id_formation'];
					$questions=getquestionbyidtest($id);
					if (!empty($questions)) {
						
						foreach ($questions as $key => $value) {
							
							$question=$value;
							?>
								<div class="col-md-5">
									<div class="row">
										<div class="col-md-12">
											<h3><?php echo $question['libelle'] ?></h3><hr>
										</div>
									</div>
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-10">
											<input type="hidden" name="question" value="<?php echo $question['id'] ?>" >
											<ul>
												<?php 
													$reponses=getreponsebyidquestion($question['id']);

													if (!empty($reponses)) {
														foreach ($reponses as $key => $value) {
															$reponse=$value;
															?>
				<input type="checkbox" value="<?php echo $reponse['id'].'^'.$question['id']; ?>" name="reponse[]"> <?php echo $reponse['libelle_rep'] ?>
																<hr>
															<?php
														}
													}
												 ?>
												
											</ul>
										</div>
									</div>
								</div>
							<?php
						}
					}
				 ?>
				

				 <button type="submit" class="btn btn-primary">Valider</button>
			</form>
		
	</div>
</body>
</html>