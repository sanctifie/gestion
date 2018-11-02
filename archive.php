<?php
/*session_start();*/
include('admin/includes/config.php');
include('admin/includes/connect.php');
session_start();
require 'includes/functions.php';
if(isset($_SESSION['auth'])){
	logged_only();
}else {
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
}

/*error_reporting(0);*/


?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include('includes/header2.php');?>

<!-- //banner -->




<!-- services -->







  <!-- main-width -->



			<section class="section extra-margins text-center pb-3" style="background-color:#edeeef;">


		<div class="col-sm-12">

                    <ul class="breadcrumb">

                        <li><a href="index.php">Accueil</a>
                        </li>
                        <li><a href="Archive.php">Voir les archives</a>
                        </li>
                        <li>Archives </li>
                    </ul>
                </div>
		<!--Section heading-->
		<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Archives des séminaires</h2>
		</div>
		<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

		<div class="navigation-block total-count">

			<?php
			//Query for Listing count
			$sql = "SELECT id from seminaire WHERE status='1'";
			$query = $dbh -> prepare($sql);
			$query->bindParam(':id',$id, PDO::PARAM_STR);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=$query->rowCount();
			?>
				<span>
						<strong><?php echo htmlentities($cnt);?></strong>
						résultats
				</span>
		</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">


							<div class="color-iron pages">





					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>
		<!--Section description-->

		<!--Grid row-->
		<div class="row">
		<div class="col-md-12">

			<?php
										$req = $dbh->query('SELECT id FROM seminaire');

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
									$sql = "SELECT * from seminaire f join imagess i on f.id=i.id_seminaire join salle s on f.id_salle=s.id join user u on f.id_users=u.id WHERE f.status = '1' GROUP BY i.id_seminaire ORDER BY f.RegDate DESC $limit";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$pagination = '';

									if($last_page != 1){
									  if($page_num > 1){
										$previous = $page_num - 1;
										$pagination .= '<a href="formation.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

										for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
										  if($i > 0){
											$pagination .= '<a href="formation.php?page='.$i.'">'.$i.'</a> &nbsp;';
										  }
										}
									  }

									  $pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

									  for($i = $page_num+1; $i <= $last_page; $i++){
										$pagination .= '<a href="formation.php?page='.$i.'">'.$i.'</a> ';

										if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
										  break;
										}
									  }

									  if($page_num != $last_page){
										$next = $page_num + 1;
										$pagination .= '<a href="seminaire.php?page='.$next.'">Suivant</a> ';
									  }
										}
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>

				<!--Grid column-->
				<div class="col-md-3">
						<!--Featured image-->

										<!--Grid column-->
							<div class="course-block big-course center-block">
								<a href="#">
									<div class="top">
											<div class="type">
												<?php echo htmlentities($result->montant);?>
											</div>
												<img src="admin/images/seminaire/<?php echo htmlentities($result->image_sem);?>" class="img-fluid" alt="First sample image">

											</div>
									<div class="middle">
										<div class="title">
											<?php echo htmlentities($result->seminaireTitle);?>
										</div>
										<div class="universities">
											<span>
												<?php echo htmlentities($result->salleName);?>
											</span>
										</div>
									</div>
							<div class="bottom">
									<div class="footer row">
											<div class="date col-xs-22">
													cloturée

											</div>

									</div>
							</div>
								</a>
							</div>
					</div>
				<?php }} ?>

	</div>
	</div>
										<div class="navigation-block labels-search hidden-xs">

					</div>

									<div class="result-navigation result-navigation-bottom">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

					<div class="navigation-block total-count">
						<?php
						//Query for Listing count
						//Query for Listing count
						$sql = "SELECT id from seminaire WHERE status='1'";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':id',$id, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=$query->rowCount();
						?>
							<span>
									<strong><?php echo htmlentities($cnt);?></strong>
									résultats
							</span>
					</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">



								<div class="color-iron pages" id="pagination"><?= $pagination ?> </div>



									<span class="result-page clickable glyphicon glyphicon-menu-right page-forward" data-page="2"></span>


					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>

		<!--Grid row-->

				<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Archives des formations</h2>
		</div>
		<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

		<div class="navigation-block total-count">

			<?php
			//Query for Listing count
			$sql = "SELECT id from formation WHERE status='1'";
			$query = $dbh -> prepare($sql);
			$query->bindParam(':id',$id, PDO::PARAM_STR);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=$query->rowCount();
			?>
				<span>
						<strong><?php echo htmlentities($cnt);?></strong>
						résultats
				</span>
		</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">


							<div class="color-iron pages">





					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>
		<!--Section description-->

		<!--Grid row-->
		<div class="row">
		<div class="col-md-12">

			<?php
										$req = $dbh->query('SELECT id FROM formation');

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
									$sql = "SELECT * from formation f join image i on f.id=i.id_formation join salle s on f.id_salle=s.id join pack p on f.id_pack=p.id join session a on f.id_session=a.id join user u on f.id_users=u.id  WHERE f.status = '1' GROUP BY i.id_formation $limit";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$pagination = '';

									if($last_page != 1){
									  if($page_num > 1){
										$previous = $page_num - 1;
										$pagination .= '<a href="seminaire.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

										for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
										  if($i > 0){
											$pagination .= '<a href="seminaire.php?page='.$i.'">'.$i.'</a> &nbsp;';
										  }
										}
									  }

									  $pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

									  for($i = $page_num+1; $i <= $last_page; $i++){
										$pagination .= '<a href="seminaire.php?page='.$i.'">'.$i.'</a> ';

										if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
										  break;
										}
									  }

									  if($page_num != $last_page){
										$next = $page_num + 1;
										$pagination .= '<a href="seminaire.php?page='.$next.'">Suivant</a> ';
									  }
										}
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>

				<!--Grid column-->
				<div class="col-md-4">
						<!--Featured image-->
										<!--Grid column-->
							<div class="course-block big-course center-block">
								<a href="#">
									<div class="top">
											<div class="type">
												<?php echo htmlentities($result->sessionName);?>
											</div>
											<img src="admin/images/formation/<?php echo htmlentities($result->nom_image);?>" class="img-fluid" alt="First sample image">
									</div>
									<div class="middle">
										<div class="title">
											<?php echo htmlentities($result->formationTitle);?>
										</div>
										<div class="universities">
											<span>
												<?php echo htmlentities($result->salleName);?>
											</span>
										</div>
									</div>
							<div class="bottom">
									<div class="footer row">
											<div class="date col-xs-22">
											Cloturée

											</div>

									</div>
							</div>

								</a>
							</div>

						</div>
				<?php }} ?>
	</div>
	</div>
										<div class="navigation-block labels-search hidden-xs">

					</div>

									<div class="result-navigation result-navigation-bottom">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

					<div class="navigation-block total-count">
						<?php
						//Query for Listing count
						$sql = "SELECT id from formation where statut='1'";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':id',$id, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=$query->rowCount();
						?>
							<span>
									<strong><?php echo htmlentities($cnt);?></strong>
									résultats
							</span>
					</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">



								<div class="color-iron pages" id="pagination"><?= $pagination ?> </div>



									<span class="result-page clickable glyphicon glyphicon-menu-right page-forward" data-page="2"></span>


					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>

<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Tous les Conférence</h2>
		</div>
		<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

		<div class="navigation-block total-count">

			<?php
			//Query for Listing count
			$sql = "SELECT id from conference WHERE status='1'";
			$query = $dbh -> prepare($sql);
			$query->bindParam(':id',$id, PDO::PARAM_STR);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=$query->rowCount();
			?>
				<span>
						<strong><?php echo htmlentities($cnt);?></strong>
						résultats
				</span>
		</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">


							<div class="color-iron pages">





					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>
		<!--Section description-->

		<!--Grid row-->
		<div class="row">
		<div class="col-md-12">

			<?php
										$req = $dbh->query('SELECT id FROM conference');

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
									$sql = "SELECT * from conference f join images i on f.id=i.id_conference join salle s on f.id_salle=s.id join user u on f.id_users=u.id WHERE f.status = '1' GROUP BY i.id_conference  ORDER BY f.RegDate DESC $limit";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$pagination = '';

									if($last_page != 1){
									  if($page_num > 1){
										$previous = $page_num - 1;
										$pagination .= '<a href="conference.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

										for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
										  if($i > 0){
											$pagination .= '<a href="conference.php?page='.$i.'">'.$i.'</a> &nbsp;';
										  }
										}
									  }

									  $pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

									  for($i = $page_num+1; $i <= $last_page; $i++){
										$pagination .= '<a href="conference.php?page='.$i.'">'.$i.'</a> ';

										if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
										  break;
										}
									  }

									  if($page_num != $last_page){
										$next = $page_num + 1;
										$pagination .= '<a href="conference.php?page='.$next.'">Suivant</a> ';
									  }
										}
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>

				<!--Grid column-->
				<div class="col-md-4">
						<!--Featured image-->
										<!--Grid column-->
							<div class="course-block big-course center-block">
								<a href="#">
									<div class="top">
											<div class="type">
												<?php echo htmlentities($result->montant);?>
											</div>
											<img src="admin/images/conference/<?php echo htmlentities($result->image_conf);?>" class="img-fluid" alt="First sample image">
							</div>
									<div class="middle">
										<div class="title">
											<?php echo htmlentities($result->conferenceTitle);?>
										</div>
										<div class="universities">
											<span>
												<?php echo htmlentities($result->salleName);?>
											</span>
										</div>
									</div>
							<div class="bottom">
									<div class="footer row">
											<div class="date col-xs-22">
											Cloturée

											</div>

									</div>
							</div>

								</a>
							</div>

					</div>
				<?php }} ?>
	</div>
	</div>
										<div class="navigation-block labels-search hidden-xs">

					</div>

									<div class="result-navigation result-navigation-bottom">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

					<div class="navigation-block total-count">
						<?php
						//Query for Listing count
						$sql = "SELECT id from conference where status='1'";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':id',$id, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=$query->rowCount();
						?>
							<span>
									<strong><?php echo htmlentities($cnt);?></strong>
									résultats
							</span>
					</div>
					<div class="navigation-block labels-search hidden-xs">

					</div>

	</div> <!-- navigation-left -->

	<div class="navigation-right">

					<div class="navigation-block page-list">



								<div class="color-iron pages" id="pagination"><?= $pagination ?> </div>
									<span class="result-page clickable glyphicon glyphicon-menu-right page-forward" data-page="2"></span>


					</div>






	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>

		<!--Grid row-->

</section>

<!-- //services -->

<?php include'includes/footer.php'; ?>
<!-- //footer -->
<!-- js -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>
