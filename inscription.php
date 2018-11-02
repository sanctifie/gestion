<?php $title = "La fedération Africaine d'informatique"; ?>
<!-- banner -->
	<!-- banner -->
	<?php include('includes/header1.php'); ?>
	
<!-- //banner -->
<!-- registration -->
<div class="main-1" style="background-color:#d1cdd9;"> <br>
		<div class="container"  style="background-color:white; padding-left:30px;padding-right:30px;">
			<div class="register" id="inscription"><br/><br/>
			<h3 class="bars" style="text-align:center; color: #0c3d72; margin-bottom: 10px;
    margin-top: 20px;">Inscription à la F.A.I</h3>
			<form id="register_form" onsubmit="return false;">


<div class="col-md-30 col-md-offset-3  col-lg-18 col-lg-offset-9" style="margin-left: 8.33333%; width: 83.3333% font-size: 10px;">
<div class="row">
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Nom :</label><br><br>
		<input type="text" class="form-control"  placeholder="Entrez votre nom" id="nom" name="nom" aria-describedby="basic-addon2" required/>
	</div>
	
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Prénom :</label><br><br>
		<input type="text" class="form-control"   placeholder="Entrez votre prénom" id="prenom" name="prenom" aria-describedby="basic-addon2" required/>
	</div>
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Date de naissance :</label><br><br>
		<input type="text" class="form-control"   placeholder="Entrez votre date de naissance" id="date" name="date" aria-describedby="basic-addon2" required/>
	</div>
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Ville de naissance :</label><br><br>
		<input type="text" class="form-control"   placeholder="Entrez votre ville de naissance" id="ville" name="ville" aria-describedby="basic-addon2" required/>
	</div>

	
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Pseudo :</label><br><br>
		<input type="text" class="form-control" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" aria-describedby="basic-addon2" required/>
		<small id="output_checkuser"></small>
	</div>
	<div class="col-lg-5 in-gp-tl"  style="padding-left:15px;">
		<label for="">Mot de passe :</label><br><br>
		<input type="password" class="form-control" id="pass1" name="pass1" aria-describedby="basic-addon2" required/>
		<small id="output_pass1"></small>
	</div><br><br>
	<div class="col-lg-5 in-gp-tb" style="padding-right:15px;">
		<label for="">Confirmer votre Mot de passe :</label><br><br>
		<input type="password" class="form-control" id="pass2" name="pass2" aria-describedby="basic-addon2" required/>
		<small id="output_pass2"></small>
	</div>
	<div class="col-lg-5 in-gp-tl"  style="padding-left:15px;">
		<label for="email">Adresse électronique:</label><br><br>
		<input type="email" class="form-control" placeholder="crescens@exemple.com" id="email" name="email" aria-describedby="basic-addon2" required/>
		<small id="output_email"></small>
	</div><br><br>
	<div  class="col-sm-12">

	</div><br><br>
	<div  class="col-sm-12">

	</div><br><br>
	<div  class="col-sm-12">

	</div><br><br>
	<div id="status" class="col-sm-12">
							Remplir tous les champs
	</div><br><br>

	<div class="col-sm-12">
		<input type="submit" id="bRegister" class="btn btn-primary col-md-12" value="Inscription" />
	</div>




</div><br><br>
</div><!-- /.row -->

			</form>
				<div class="clearfix"> </div>

		   </div>
		 </div>
	</div><br>
	<script>
		$(document).ready(function(){
			$("#register_form input").focus(function(){
					$("#status").fadeOut(800);
			});
			$("#pseudo").keyup(function(){
				// on verifiee si le pseudo est ok ou n'a pas été déjà pris
				check_pseudo();
			});
			$("#pass1").keyup(function(){
				//on verifie si le mot de passe est ok
				if ($(this).val().length < 6) {
					$("#output_pass1").css("color", "red").html("<br/>Trop court (6 caractères minimum)");
				}else if ($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()) {
						$("#output_pass1").html("<br/>Les deux mots de passe sont différents");
						$("#output_pass2").html("<br/>Les deux mots de passe sont différents");
				}else {
					$("#output_pass1").html('<imp src="img/check.png" class="small_image" alt="" />');
					if ($("#pass2").val() != "") {
						$("#output_pass2").html('<imp src="img/check.png" class="small_image" alt="" />');
					}
				}
			});
			$("#pass2").keyup(function(){
					// on verifie si les mots de passe coincident
					check_password();
			});
			$("#email").keyup(function(){
					// on verifie l'email
					check_email();
			});
			function check_pseudo(){
				$.ajax({
					type: "post",
					url: "register.php",
					data: {
						'pseudo_check' : $("#pseudo").val()
					},
					success: function(data){
						if(data == "success"){
							$("#output_checkuser").html('<imp src="img/check.png" class="small_image" alt="" />');
							return true;
						}else {
							$("#output_checkuser").css("color", "red").html(data);
						}
					}
				});
			}
			function check_password(){
				$.ajax({
					type: "post",
					url: "register.php",
					data: {
						'pass1_check' : $("#pass1").val(),
						'pass2_check' : $("#pass2").val()
					},
					success: function(data){
						if(data == "success"){
							$("#output_pass1").html('<imp src="img/check.png" class="small_image" alt="" />');
							$("#output_pass2").html('<imp src="img/check.png" class="small_image" alt="" />');
							return true;
						}else {
							$("#output_pass2").css("color", "red").html(data);
						}
					}
				});
			}
			function check_email(){
				$.ajax({
					type: "post",
					url: "register.php",
					data: {
						'email_check' : $("#email").val()
					},
					success: function(data){
						if(data == "success"){
							$("#output_email").html('<imp src="img/check.png" class="small_image" alt="" />');
							return true;
						}else {
							$("#output_email").css("color", "red").html(data);
						}
					}
				});
			}
			//traitement du formulaire d'inscription
			$("#register_form").submit(function(){
				var status = $("#status");
				var nom = $("#nom").val();
				var prenom = $("#prenom").val();
				var date = $("#date").val();
				var ville = $("#ville").val();
				var pseudo = $("#pseudo").val();
				var pass1 = $("#pass1").val();
				var pass2 = $("#pass2").val();
				var email = $("#email").val();

				if (nom == "" || prenom == "" || date == "" || ville == "" || pseudo == "" || pass1 == "" || pass2 == "" || email == "") {
					staus.html("Veuillez remplir tous les champs").fadeIn(400);
				}else if (pass1 != pass2) {
					staus.html("Les deux mot de passe sont différents").fadeIn(400);
				}else {
					$.ajax({
						type: "post",
						url: "register.php",
						data:{
							'nom' : nom,
							'prenom' : prenom,
							'date' : date,
							'ville' : ville,
							'pseudo' : pseudo,
							'pass1' : pass1,
							'pass2' : pass2,
							'email' : email,
						},
						beforeSend: function(){
							$("#bRegister").attr("value", "Traitement en cours...");
						},
						success: function(data){
							if(data != "register_success"){
								status.html(data).fadeIn(400);
								$("#bRegister").attr("value", "Inscription");
								$("#bRegister").addClass("btn-primary").css("color", "white");
							}else {
									$("#inscription").html("<strong>Juste une dernière étape " + prenom + " " + nom + " !</strong><br/>Un lien d'activation de votre compte vient de vous être envoyé à l'adresse électronique indiquée lors de l'inscription.<br/>Veuillez tout simplement cliquer ce lien et vous serez définitivement membre de la <strong>F.A.I</strong>.<br/><em>(Pensez à vérifier vos spams ou courriers indésirables, si vous ne voyez pas ce mail dans votre boîte de réception)</em><br/><br/>Une fois que ceci est fait, vous n'aurez plus qu'à vous connecter!<br/>Alors, on se dit à très bientôt ;) !").css("width", "inherit").fadeIn(400);
							}
						}
					})
				}
			})
		});
	</script>
<!-- registration -->
<!-- stats -->

<!-- //stats -->

<?php include('includes/footer.php'); ?>
