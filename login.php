<?php

  // si le formulaire est soumis
  if(!empty($_POST['login']) && !empty($_POST['pseudo']) && !empty($_POST['pass1'])){

  		require_once 'includes/db.php';
  		require_once 'includes/functions.php';

      $q = $db->prepare("SELECT id, pseudo,password AS hashed_password,email FROM users
                         WHERE (pseudo = :pseudo OR email = :pseudo)
                         AND activated = '1'");
  		$q->execute(['pseudo' => $_POST['pseudo']]);
  		$user = $q->fetch();
  		if(password_verify($_POST['pass1'], $user->hashed_password)){
  			session_start();
  			$_SESSION['auth'] = $user;

  			header('location: account.php');
  			exit();
      }else {
        header("Location: info.php?msg=erreurlogin");
      }

  }/*else {
    clear_input_data(;)
    if(isset($_POST['login'])){
      if(!empty(['pseudo', 'pass1'])){
        extract($_POST);
        $q = $db->prepare("SELECT id, pseudo,password AS hashed_password,email FROM users
                           WHERE (pseudo = :pseudo OR email = :pseudo)
                           AND activated = '1'");
        $q->execute([
            'pseudo' => $pseudo
                    ]);
        $user = $q->fetch(PDO::FETCH_OBJ);

        if($user && bcrypt_verify_password($pass1, $user->hashed_password)) {
          $user = $q->fetch(PDO::FETCH_OBJ);
          $_SESSION['auth'] = $user;



          header("Location: account.php?id=".$_SESSION['auth']->id);
  }*/


?>


<!-- banner -->
<?php include'includes/header1.php'; ?>
<!-- //banner -->

<!-- login -->
<div class="main-1" style="background-color:#d1cdd9;"> <br>
		<div class="container"  style="background-color:white; padding-left:30px;padding-right:30px;">
	<div class="login-page" >
		<div class="container" style="padding-left:30px;padding-right:30px;">
			<div class="account_grid">
        <h3 class="bars" style="text-align:center; color: #0c3d72; margin-bottom: 10px;
      margin-top: 20px;">Se Connecter à la F.A.I</h3>
  			<form method="post" action="">


  <div class="col-md-30 col-md-offset-3  col-lg-18 col-lg-offset-9" style="margin-left: 8.33333%; width: 83.3333% font-size: 10px;">
  <div class="row">
  	<div class="col-sm-9">
  		<label for="">Pseudo ou Adresse email :</label><br><br>
      <input type="text" class="form-control" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" aria-describedby="basic-addon2" required/>

  	 </div>
  	<br><br>
  	<div class="col-md-9">
  		<label for="">Mot de passe :</label><br><br>
      <input type="password" class="form-control" id="pass1" name="pass1" aria-describedby="basic-addon2" required/>
  	</div>
  	<br><br>
    <div  class="col-sm-9">

  	</div><br><br>
  	<div  class="col-sm-9">

  	</div><br><br>


  	<div class="col-sm-9">
  		<input type="submit" id="bRegister" class="btn btn-primary col-md-12" name="login" value="login" />
  	</div>




  </div><br><br>
  </div><!-- /.row -->

  			</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div></div></div><br>
<!-- login -->
<!-- stats -->
<!-- //stats -->

<?php include'includes/footer.php'; ?>
</body>
</html>
