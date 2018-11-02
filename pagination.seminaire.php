<?php
require('includes/db.php');
require('includes/connect.php');
require('includes/functions.php');

$req = $db->query('SELECT id FROM formation');

$nbre_total_formation = $req->rowCount();

$nbre_formation_par_page = 12;

$nbre_pages_max_gauche_et_droite = 4;

$last_page = ceil($nbre_total_formation / $nbre_formation_par_page);

if(isset($_GET['page']) && is_numeric($_GET['page'])){
  $page_num = $_GET['page'];
} else {
  $page_num = 1;
}

if($page_num < 1){
  $page_num = 1;
} else if($page_num > $last_page) {
  $page_num = $last_page;
}

$limit = 'LIMIT '.($page_num - 1) * $nbre_formation_par_page. ',' . $nbre_formation_par_page;

//Cette requête sera utilisée plus tard
$q = $db->query("SELECT * FROM formation ORDER BY id $limit");
$userq = $q->fetchAll(PDO::FETCH_OBJ);

$pagination = '';

if($last_page != 1){
  if($page_num > 1){
    $previous = $page_num - 1;
    $pagination .= '<a href="index.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

    for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
      if($i > 0){
        $pagination .= '<a href="index.php?page='.$i.'">'.$i.'</a> &nbsp;';
      }
    }
  }

  $pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

  for($i = $page_num+1; $i <= $last_page; $i++){
    $pagination .= '<a href="index.php?page='.$i.'">'.$i.'</a> ';

    if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
      break;
    }
  }

  if($page_num != $last_page){
    $next = $page_num + 1;
    $pagination .= '<a href="index.php?page='.$next.'">Suivant</a> ';
  }
}
?>
