<?php
    session_start();
	require 'includes/functions.php';
  include('admin/includes/config.php');
include('admin/includes/connect.php');
	logged_only();

?>
<!-- banner -->
	<!-- banner -->
	<?php include('includes/header2.php'); ?>
<!-- //banner -->
<!-- registration -->
<div class="main-1">
		<div class="container">
			<div class="content-wrapper" id="content">
<div class="dashboard-notifications" tabindex="-1">

</div>
<section class="container dashboard" id="dashboard-main">
  <section class="my-courses" id="my-courses" role="main" aria-label="Content">
    <header class="wrapper-header-courses">
      <h2 class="header-courses">Mes formations</h2>
    </header>
      <ul class="listing-courses">
        <?php
$useremail=$_SESSION['auth']->id;
  $sql = "SELECT * from  users m join users_formation k on m.id=k.user_id join formation f on k.id_formation=f.id join salle s on f.id_salle=s.id join pack p on f.id_pack=p.id join session a on f.id_session=a.id join user u on f.id_users=u.id JOIN image i ON f.id=i.id_formation WHERE m.id='$useremail' GROUP BY i.id_formation";
$query = $dbh -> prepare($sql);
$query -> bindParam(':id',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

<li class="course-item">

<div class="course-container">
<article class="course">

  <section class="details">
    <div class="wrapper-course-image" aria-hidden="true">
            <a href="formation-details.php?id_formation=<?php echo $result->id_formation;?>" data-course-key="course-v1:ParisSaclay+71002+session01" class="cover">
              <img src="admin/images/formation/<?php echo htmlentities($result->nom_image);?>" class="course-image" alt="71002 Voyage au cœur du vivant avec les rayons X : la cristallographie Accueil">
            </a>
    </div>
      <div class="wrapper-course-details">
        <h3 class="course-title">
              <a data-course-key="course-v1:ParisSaclay+71002+session01"href="formation-details.php?id_formation=<?php echo $result->id_formation;?>"><?php echo htmlentities($result->formationTitle);?></a>
        </h3>
        <div class="course-info">
          <span class="info-university">SALLE - </span>
          <span class="info-course-id"><?php echo htmlentities($result->salleName);?></span>
          <span class="info-date-block" data-tooltip="Hi">
            Débute-<?php echo htmlentities($result->formationdeb);?>
          </span>
        </div>
        <div class="wrapper-course-actions">
          <div class="course-actions">
				  <a href="test.php?id_formation=<?php echo $result->id_formation;?>" class="enter-course" data-course-key="course-v1:ParisSaclay+71002+session01">Passer le test</a>
				  <a href="formation-details.php?id_formation=<?php echo $result->id_formation;?>" class="enter-course" data-course-key="course-v1:ParisSaclay+71002+session01">Voir le cours<span class="sr">&nbsp;<?php echo htmlentities($result->formationTitle);?></span></a>
				 
          </div>
        </div>
      </div>
  </section>
  <footer class="wrapper-messages-primary">
    <ul class="messages-list">
    </ul>
  </footer>
</article>
</div>
</li>
<?php }} ?>
      </ul>
      <hr>
      <header class="wrapper-header-courses">
        <h2 class="header-courses">Mes Séminaires</h2>
      </header>
        <ul class="listing-courses">
        <?php
		  $useremail=$_SESSION['auth']->id;
		  $sql = "SELECT * from  users m join users_seminaire k on m.id=k.user_id join seminaire f on k.id_formation=f.id join salle s on f.id_salle=s.id  join user u on f.id_users=u.id JOIN imagess i ON f.id=i.id_seminaire  WHERE m.id='$useremail' GROUP BY i.id_seminaire";
		  $query = $dbh -> prepare($sql);
		  $query -> bindParam(':id',$useremail, PDO::PARAM_STR);
		  $query->execute();
		  $results=$query->fetchAll(PDO::FETCH_OBJ);
		  $cnt=1;
		  if($query->rowCount() > 0)
		  {
		  foreach($results as $result)
		  { ?>

  <li class="course-item">

  <div class="course-container">
  <article class="course">

    <section class="details">
      <div class="wrapper-course-image" aria-hidden="true">
              <a href="seminaire-details.php?id_formation=<?php echo $result->id_seminaire;?>" data-course-key="course-v1:ParisSaclay+71002+session01" class="cover">
                <img src="admin/images/seminaire/<?php echo htmlentities($result->image_sem);?>" class="course-image" alt="71002 Voyage au cœur du vivant avec les rayons X : la cristallographie Accueil">
              </a>
      </div>
        <div class="wrapper-course-details">
          <h3 class="course-title">
                <a data-course-key="course-v1:ParisSaclay+71002+session01" href="seminaire-details.php?id_formation=<?php echo $result->id_seminaire;?>"><?php echo htmlentities($result->seminaireTitle);?></a>
          </h3>
          <div class="course-info">
            <span class="info-university">SALLE - </span>
            <span class="info-course-id"><?php echo htmlentities($result->salleName);?></span>
            <span class="info-date-block" data-tooltip="Hi">
              Débute-<?php echo htmlentities($result->seminairedeb);?>
            </span>
          </div>
        </div>
    </section>
    <footer class="wrapper-messages-primary">
      <ul class="messages-list">
      </ul>
    </footer>
  </article>
  </div>
  </li>
  <?php }} ?>
        </ul>
        <hr>
        <header class="wrapper-header-courses">
          <h2 class="header-courses">Mes Conférences</h2>
        </header>
          <ul class="listing-courses">
            <?php
			$useremail=$_SESSION['auth']->id;
			$sql = "SELECT * from  users m join users_conference k on m.id=k.user_id join conference f on k.id_formation=f.id join salle s on f.id_salle=s.id  join user u on f.id_users=u.id JOIN images i ON f.id=i.id_conference WHERE m.id='$useremail' GROUP BY i.id_conference";
			$query = $dbh -> prepare($sql);
			$query -> bindParam(':id',$useremail, PDO::PARAM_STR);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
			foreach($results as $result)
			{ ?>

    <li class="course-item">

    <div class="course-container">
    <article class="course">

      <section class="details">
        <div class="wrapper-course-image" aria-hidden="true">
                <a href="conference-details.php?id_formation=<?php echo $result->id_conference;?>" data-course-key="course-v1:ParisSaclay+71002+session01" class="cover">
                  <img src="admin/images/conference/<?php echo htmlentities($result->image_conf);?>" class="course-image" alt="71002 Voyage au cœur du vivant avec les rayons X : la cristallographie Accueil">
                </a>
        </div>
          <div class="wrapper-course-details">
            <h3 class="course-title">
                  <a data-course-key="course-v1:ParisSaclay+71002+session01" href="conference-details.php?id_formation=<?php echo $result->id_conference;?>"><?php echo htmlentities($result->conferenceTitle);?></a>
            </h3>
            <div class="course-info">
              <span class="info-university">SALLE - </span>
              <span class="info-course-id"><?php echo htmlentities($result->salleName);?></span>
              <span class="info-date-block" data-tooltip="Hi">
                Débute-<?php echo htmlentities($result->conferencedeb);?>
              </span>
            </div>
            <div class="wrapper-course-actions">
              <div class="course-actions">
                      <a href="conference-details.php?id_formation=<?php echo $result->id_conference;?>" class="enter-course" data-course-key="course-v1:ParisSaclay+71002+session01">Voir le cours<span class="sr">&nbsp;<?php echo htmlentities($result->conferenceTitle);?></span></a> 
              </div>
            </div>
          </div>
      </section>
    </article>
    </div>
    </li>
    <?php }} ?>
          </ul>

  </section>

    <!--div id="dashboard-search-bar" class="search-bar dashboard-search-bar" role="search" aria-label="Dashboard">
      <form>
        <label for="dashboard-search-input">Rechercher vos cours</label>
        <div class="search-field-wrapper">
          <input id="dashboard-search-input" class="search-field" type="text">
          <button type="submit" class="search-button" aria-label="Recherche">
            <i class="icon fa fa-search" aria-hidden="true"></i>
          </button>
          <button type="button" class="cancel-button" aria-label="Effacer la recherche">
            <i class="icon fa fa-remove" aria-hidden="true"></i>
          </button>
        </div>
      </form>
    </div-->

    <section id="dashboard-search-results" class="search-results dashboard-search-results"></section>


  <section class="profile-sidebar" id="profile-sidebar" role="region" aria-label="Account Status Info">

    <section class="user-info">
      <ul>


      <span class="title">
        <a href="https://www.fun-mooc.fr/payment/receipt/" class="edit-name">
            Historique des formations seminaires et conferences
        </a>
      </span>
      </ul>
    </section>
    <section id="dashboard-revisions" class="dashboard-revisions" aria-live="polite" aria-atomic="true">
    <span class="title edit-name">

</span>
<ul class="revision-list"></ul>
</section>
  </section>
</section>
    </div>
		 </div>
	</div>
<!-- registration -->
<!-- stats -->
</body>
</html>
