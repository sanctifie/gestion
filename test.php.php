<?php
    /*session_start();*/
	require 'includes/functions.php';
include ('bdd/init.php');
	logged_only();

?>
<?php require 'includes/header3.php'; ?>
	<div id="container">

<header>
      <h1>CERTIFICATION</h1>   	
      <p> Test  <strong>D'Evaluation </strong></p>
     </header>
    <section>

     <form name="testing" action="save_test.php" method="POST">
	 <?php 
				$id=$_GET['id_formation'];
					$questions=getquestionbyidtest($id);
					if (!empty($questions)) {
						
						foreach ($questions as $key => $value) {
							
							$question=$value;
							?>
      <h3><?php echo $question['libelle'] ?></h3>
	  <input type="hidden" name="question" value="<?php echo $question['id'] ?>" >
	  <ul>
	  <?php 
													$reponses=getreponsebyidquestion($question['id']);

													if (!empty($reponses)) {
														foreach ($reponses as $key => $value) {
															$reponse=$value;
															?>
      <input type="radio" value="<?php echo $reponse['id'].'^'.$question['id']; ?>" name="reponse[]"> <?php echo $reponse['libelle_rep'] ?>
															<?php
														}
													}
												 ?>
												
											</ul>
											<?php
						}
					}
				 ?>
											<br>
      
       <!--This is the end of the Question -->
     
             <br><br>

       <button type="submit">Valider</button> 


</form>
</section>

 <!-- End of the footer -->
   </div>
   </body>
</html>