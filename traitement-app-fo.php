<?php
include('includes/config.php');

	$id_apprenant=$_GET['id_apprenant'];
	$id_formation=$_GET['id_formation'];
	var_dump($id_apprenant);
	var_dump($id_formation);
	$sql="INSERT INTO  apprenant_formation(id_apprenant,id_formation) VALUES(:id_apprenant,:id_formation)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':id_apprenant',$id_apprenant,PDO::PARAM_STR);
	$query->bindParam(':id_formation',$id_formation,PDO::PARAM_STR);
	$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
header('location:'.$_SERVER['HTTP_REFERER']);

/*header('location: formation-details.php?id_formation=<?php echo $result->id_formation;?>');*/
?>
