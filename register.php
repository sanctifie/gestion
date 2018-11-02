<?php
//verification du pseudo
if (!empty($_POST['pseudo_check'])) {
  $pseudo = $_POST['pseudo_check'];
  $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo);
  if (strlen($pseudo)<3 || strlen($pseudo)>16) {
    echo '<br/>3 à 16 caractères SVP.';
    exit();
  }
  if (is_numeric($pseudo[0])) {
    echo '<br/>Le pseudo doit commencer par une lettre.';
    exit();
  }
  //connexion à la base de donnée
  require"includes/db.php";

  $q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
  $q->execute(array($pseudo));
  $numRows = $q->rowCount();
  if($numRows > 0){
    echo '<br/>Pseudo déjà utilisé !';
    exit();
  }else {
    echo 'success';
    exit();

  }
}

//verification des mots de passe
if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
  if (strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass1_check']) <6 ) {
    echo '<br/>Trop court 6 caractères minimum.';
    exit();
  }elseif ($_POST['pass1_check'] == $_POST['pass2_check']) {
    echo 'success';
    exit();
  }else {
    echo '<br/>Les deux mots de passe sont différents.';
    exit();
  }
}
//verification des mots de l'email
//verification du pseudo
if (!empty($_POST['email_check'])) {
  $email = $_POST['email_check'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<br/>Adresse email invalide';
    exit();
  }
  require"includes/db.php";
  $q = $db->prepare('SELECT id FROM users WHERE email = ?');
  $q->execute(array($email));
  $numRows = $q->rowCount();
  if($numRows > 0){
    echo '<br/>Adresse email déjà utilisé !';
    exit();
  }else {
    echo 'success';
    exit();

  }
}

//traitement de l'inscription
if (isset($_POST['pseudo'])) {

  require "includes/db.php";
  require"includes/functions.php";
  extract($_POST);
  $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo);
  $q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
  $q->execute(array($pseudo));
  $pseudo_check = $q->rowCount();

  $q = $db->prepare('SELECT id FROM users WHERE email = ?');
  $q->execute(array($email));
  $email_check = $q->rowCount();

  if (empty($nom) || empty($prenom) || empty($date) || empty($ville) || empty($pseudo)|| empty($pass1) || empty($pass2) || empty($email)){
    echo "Tous les champs n'ont pas été remplis";
  }else if ($pseudo_check > 0) {
    echo "Pseudo déjà utilisé";
  }else if ($email_check) {
    echo "Cette adresse email est déjà utilisé";
  }else if (strlen($pseudo) < 3 || strlen($pseudo) > 16) {
    echo "Pseudo éronné !";
  }else if (is_numeric($pseudo[0])) {
    echo "Le pseudo doit commencer par une lettre";
  }else if ($pass1 != $pass2) {
    echo "Les mots de passe ne correspondent pas.";
  }else {
    $hash_pass = password_hash($pass1, PASSWORD_BCRYPT);
    /*$hash_pass = bcrypt_hash_password($pass1);*/
    $q = $db->prepare('INSERT INTO users(nom,prenom,date,ville,pseudo, email, password, ip, created)
                       VALUES(:nom, :prenom, :date, :ville, :pseudo, :email, :password, :ip, now())');
    $q->execute(array(
      'nom' => $nom,
      'prenom' => $prenom,
      'date' => $date,
      'ville' => $ville,
      'pseudo' => $pseudo,
      'email' => $email,
      'password' => $hash_pass,
      'ip' => $_SERVER['REMOTE_ADDR']
    ));
    $user_id = $db->lastInsertId();
    if (!file_exists("members/$user_id")) {
      mkdir("members/$user_id", 0755);
    }
    $to = $email;
    $from = "auto-responder@crescens@gmail.com";
    $subject = "La F.A.I - Activation de votre compte";
    $message = "<!DOCTYPE html>
					<html>
						<head>
							<meta charset=\"UTF-8\" />
						</head>
						<body>
							Hi $pseudo,<br/><br/>

						   <h2>Complétez cette dernière étape pour activer votre compte <strong>La F.A.I</strong>!</h2>
						   <p>Pour ce faire, il suffit de cliquez sur le lien suivant:<br/>
               
						   http://localhost/Template/activation.php?id=$user_id&amp;u=$pseudo&amp;e=$email&amp;ssl=$hash_pass<br/>
						   Si l'URL n'apparait pas comme un lien actif, veuillez SVP copier/coller ce
						   dernier dans la barre d'adresse de votre navigateur internet.</p>

						   <h2>Indentifiants de connexion:</h2>
						   <p>
								Adresse e-mail: $email<br/>
								Mot de passe:       $pass1<br/>
						   </p>
						   <p>Rendez-vous sur le site <a href=\"http://crescens.com\">La F.A.I</a></p>
						</body>
					</html>";

    $header = "FROM: $from\n";
    $header .= "MINE-Version: 1.0\n";
    $header .= "Content-type: text/html; charset=ISO-8859-1\n";
    if (mail($to,$subject,$message,$header)) {
      echo 'register_success';
    }else {
      //on supprime le compte de la bdd vu qu'il ne sert plus à RecursiveCachingIterator
      $q = $db->prepare("DELETE FROM users WHERE id = ?");
      $q->execute(array($user_id));
      echo "Erreur lors de l'envoi de l'email";
    }
    exit();

  }
  exit();
}

?>
