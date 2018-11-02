<?php 
if(!empty($_GET['msg'])){
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	
	if($msg == "activation_error"){
		$message = "<h2>Erreur lors de l'activation</h2>
					<p>Une erreur est survenue lors de l'activation de votre compte.<br/>
					Veuillez réessayer plus tard.</p><br><br>";
					
	} else if($msg == "activation_success") {
		$message = '<h2>Activation réussie</h2>
					<p>Votre compte est maintenant activé.<br/>
					Félicitations vous êtes dorénavant un <strong>apprenant de la F.A.I.</strong><br/> 
					prenez part nos formations, conférences et conférences et surtout profiter des 
					offre exceptionnlle en tant  qu\'apprenant  avec Zéro stress :) ...<br/><br/>
					Vous pouvez cliquer sur ce <a style="color:yellow" href="login.php">lien</a> pour vous connecter.</p><br><br>';
					} 
					else if($msg == "contact_reussie") {
		$message = '<h2>Contact reussit</h2>
					<p>Votre méssage a bien été envoyé nous vous repondrons dans les plus bref delai l\'URL sont érronés<br/>
					';
	}else if($msg == "devis_reussie") {
		$message = '<h2>Dévis soumis avec succes</h2>
					<p>Votre Devis  a bien été envoyé nous vous repondrons dans les plus bref delai l\'URL sont érronés<br/>
					';
	}
	else if($msg == "erreurlogin") {
		$message = '<h2>Activation réussie</h2>
					<p>Vérifiez votre login et votre mot de passe.<br/>
					Vous pouvez cliquer sur ce <a style="color:yellow" href="login.php">lien</a> pour réessayer.</p><br><br>';
	} else if($msg == "fake_parameters") {
		$message = '<h2>Paramètres érronés</h2>
					<p>Les paramètres fournis dans l\'URL sont érronés<br/>
					Vérifiez que vous avez copier/coller le bon lien d\'activation</p><br><br>';
	} else {
		$message = $msg;
	}
	
} else {
	$message = "Aucun message";
}
?>
<?php $title = "La fedération Africaine d'informatique"; ?>
<!-- banner -->
	<!-- banner -->
	<?php include('includes/header1.php'); ?>
	<br><br>
<!-- //banner -->
<!-- registration -->
<div class="main-1">
		<div class="container"  style="background-color:white; padding-left:30px;padding-right:30px;">
		<div class="info"><?php echo $message; ?></div>
	</div>
</div>
<?php require "includes/footer.php"; ?>
		