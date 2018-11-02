<?php 
include('includes/connect.php');
if ($_POST) 
{
	if (!empty($_POST['libelle']))
    extract($_POST);
    $libelle=htmlentities(trim($libelle));
    ajouterUser($libelle);
    echo "good";

} 
else
echo "bad";
  

 ?>