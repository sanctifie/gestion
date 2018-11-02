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







</div>  <!-- main-width -->



<div class="courses-page" style="background-color:#edeeef;">
	<div class="row-fluid">
			<div class="col-lg-36 text-center">
					<h1 class="big-title">Les Séminaires</h1>
			</div>
	</div>


	<div class="row-fluid">

			<div id="course-search" class="course-list clearfix">

					<div class="course-list-table">

							<div class="left hidden-xs">
									<div class="filters criteria-block">
											<div class="title">Affiner les résultats</div>
											<div class="criterions"><div><h2>Disponibilité</h2><ul class="criteria"><li class="criterion">


	Fin d'inscription imminente
<span class="badge pull-right">44</span>


</li><li class="criterion">


	Démarre bientôt
<span class="badge pull-right">14</span>


</li><li class="criterion">


	Nouveautés
<span class="badge pull-right">36</span>


</li><li class="criterion">


	Ouvert aux inscriptions
<span class="badge pull-right">105</span>


</li></ul>





</ul></div></div>
									</div>
							</div>

							<div class="right row">
									

									<div class="result-navigation result-navigation-top">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

		<div class="navigation-block total-count">
			<?php
			//Query for Listing count
			$sql = "SELECT id from conference WHERE status='0'";
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

						<div class="row">
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
									$sql = "SELECT * from conference f join images i on f.id=i.id_conference join salle s on f.id_salle=s.id join user u on f.id_users=u.id WHERE f.status = '0' GROUP BY i.id_conference  ORDER BY f.RegDate DESC $limit";
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


											<ul id="course-filtering-results">

												<div class="col-lg-4 col-md-9 mb-r">
	<div class=" course-block small-course center-block">
	<a href="conference-details.php?id_formation=<?php echo $result->id_conference;?>">

			<div class="top">

							<div class="type">
									<?php echo htmlentities($result->montant);?>

							</div>
							<img src="admin/images/conference/<?php echo htmlentities($result->image_conf);?>" class="main img-responsive" alt="First sample image">
			</div>
			<div class="middle">
					<div class="title">
						<?php echo htmlentities($result->conferenceTitle);?>
					</div>
					<div class="universities">
									<?php echo htmlentities($result->salleName);?>
					</div>
			</div>
			<div class="bottom">
					<div class="footer row">
							<div class="date col-xs-20">

													Débute
													<br>
													<?php echo htmlentities($result->conferencedeb);?>

							</div>
							<div class="register col-xs-16">
											En savoir plus
							</div>
					</div>
			</div>
	</a>
</div>
</div>
<?php }} ?>





									</div>
									<div class="navigation-block labels-search hidden-xs">

					</div>

									<div class="result-navigation result-navigation-bottom">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

					<div class="navigation-block total-count">
						<?php
						//Query for Listing count
						$sql = "SELECT id from conference";
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

									
											
									

									
							


					
			</div>
	</div>
</div><br><br>

<!-- //services -->

<!-- stats -->
	<div class="stats" id="stats">
	    <div class="container">
			<div class="inner_w3l_agile_grids">
		<div class="col-md-3 w3layouts_stats_left w3_counter_grid">
		   <i class="fa fa-laptop" aria-hidden="true"></i>
			<p class="counter">45</p>
			<h3>Courses</h3>
		</div>
		<div class="col-md-3 w3layouts_stats_left w3_counter_grid1">
		    <i class="fa fa-smile-o" aria-hidden="true"></i>
			<p class="counter">165</p>
			<h3>Members</h3>
		</div>
		<div class="col-md-3 w3layouts_stats_left w3_counter_grid2">
		<i class="fa fa-trophy" aria-hidden="true"></i>
			<p class="counter">563</p>
			<h3>Awards</h3>
		</div>
		<div class="col-md-3 w3layouts_stats_left w3_counter_grid3">
		<i class="fa fa-user" aria-hidden="true"></i>
			<p class="counter">245</p>
			<h3>Instructors</h3>
		</div>
		<div class="clearfix"> </div>
	</div>
   </div>
</div>
<!-- //stats -->

<!-- stats-bottom -->
	<div class="stats-bottom contact">
		<div class="container">
			<h3 class="w3l_header w3_agileits_header">Featured <span>Services</span></h3>
			<div class="agileinfo_services_grids">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Best Lab</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Best Teachers</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Low Cost Services</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3agile_services_grids">
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Best Class rooms</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Online training</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileinfo_services_grid">
					<div class="agileinfo_services_grid1">
						<h4>Drawing lessons</h4>
						<p>Phasellus a porttitor metus, vitae ultrices nibh. Sed eu fermentum nunc.</p>
						<div class="agileinfo_services_grid1_pos">
							<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //stats-bottom -->
<!-- footer -->
	<div class="zoe">
	<div class="f-bg-w3l">
		<div class="container">
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Follow <span>Us</span></h2>
				<ul class="social_agileinfo">
					<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
			<div class="col-md-8 w3layouts_footer_grid">
				<form action="#" method="post">
					<input type="email" name="Email" placeholder="Email..." required="">
					<input type="submit" value="">
				</form>
				<ul class="w3l_footer_nav">
					<li><a href="index.html">Home</a></li>
					<li><a class="active" href="services.html">Services</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="icons.html">Web Icons</a></li>
					<li><a href="mail.html">Mail Us</a></li>
				</ul>
				<p>© 2017 Mastering. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
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
