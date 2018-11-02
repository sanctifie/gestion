<?php
    session_start();
  include('admin/includes/config.php');
include('admin/includes/connect.php');

?>
<!-- banner -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>
<!-- //banner -->
<!-- banner-bottom -->
<!-- services -->
	<div class="services two" style="background-color:#edeeef;">
		<div class="container">
				<section class="section extra-margins text-center pb-3">
					<?php
					//Query for Listing count
					$sql = "SELECT id from formation WHERE status='0'";
					$query = $dbh -> prepare($sql);
					$query->bindParam(':id',$id, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=$query->rowCount();
					?>


		<!--Section heading-->
		<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Les formations à la une</h2>
		</div>
		<p><span><?php echo htmlentities($cnt);?> FORMATIONS</span></p><br><br>
		<!--Section description-->

		<!--Grid row-->
		<div class="row">
		<div class="col-md-12" col-sm-12>
			<?php
			$sql = "SELECT * from formation f join salle s on f.id_salle=s.id join pack p on f.id_pack=p.id join session a on f.id_session=a.id join user u on f.id_users=u.id JOIN image i ON f.id=i.id_formation  WHERE f.status = '0' GROUP BY i.id_formation ORDER BY f.RegDate DESC LIMIT 0,3 ";
			$query = $dbh -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
			foreach($results as $result)
			{				?>

				<!--Grid column-->
				<div class="col-md-4 col-sm-4">
						<!--Featured image-->
										<!--Grid column-->
							<div class="course-block big-course center-block">
								<a href="formation-details.php?id_formation=<?php echo $result->id_formation;?>">
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
											Débute le

											<?php echo htmlentities($result->formationdeb);?>

											</div>
													<div class="register col-xs-14 ">
															En savoir plus
													</div>
									</div>
							</div>

								</a>
							</div>

						</div>
				<?php }} ?>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-36 text-center">
				<a href="seminaire.php" class="btn btn-default btn-spaced"><span style="color:black;">Tous les formations</span></a>
		</div>
</div>
		<!--Grid row-->

</section>

			<section class="section extra-margins text-center pb-3">
					<?php
					//Query for Listing count
					$sql = "SELECT id from seminaire";
					$query = $dbh -> prepare($sql);
					$query->bindParam(':id',$id, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=$query->rowCount();
					?>


		<!--Section heading-->
		<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Les Séminaires à la une</h2>
		</div>
		<p><span><?php echo htmlentities($cnt);?> FORMATIONS</span></p><br><br>
		<!--Section description-->

		<!--Grid row-->
		<div class="row">
		<div class="col-md-12 col-sm-12">

			<?php
			$sql = "SELECT * from seminaire f join imagess i on f.id=i.id_seminaire join salle s on f.id_salle=s.id join user u on f.id_users=u.id WHERE f.status = '0' GROUP BY i.id_seminaire ORDER BY f.RegDate DESC LIMIT 0,3 ";
			$query = $dbh -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query->rowCount() > 0)
			{
			foreach($results as $result)
			{				?>

				<!--Grid column-->
				<div class="col-md-4 col-sm-3">
						<!--Featured image-->

										<!--Grid column-->
							<div class="course-block big-course center-block">
								<a href="seminaire-details.php?id_formation=<?php echo $result->id_seminaire;?>">
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
													Débute le

											<?php echo htmlentities($result->seminairedeb);?>

											</div>
													<div class="register col-xs-14 ">
															En savoir plus
													</div>
									</div>
							</div>
								</a>
							</div>
					</div>
				<?php }} ?>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-36 text-center">
				<a href="formation.php" class="btn btn-default btn-spaced"><span style="color:black;">Tous les séminaires</span></a>
		</div>
</div>
		<!--Grid row-->

</section>
			<section class="section extra-margins text-center pb-3" style="">
					<?php
					//Query for Listing count
					$sql = "SELECT id from conference";
					$query = $dbh -> prepare($sql);
					$query->bindParam(':id',$id, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=$query->rowCount();
					?>
		<!--Section heading-->
		<div class="col-lg-36 text-center">
				<h2 class="big-title small-margin">Les Conférences à la une</h2>
		</div>
		<p><span><?php echo htmlentities($cnt);?> CONFERENCES</span></p><br><br>
		<!--Section description-->
		<!--Grid row-->
		<div class="row">
		<div class="col-md-12">
	<?php
	$sql = "SELECT * from conference f join images i on f.id=i.id_conference join salle s on f.id_salle=s.id join user u on f.id_users=u.id WHERE f.status = '0' GROUP BY i.id_conference  ORDER BY f.RegDate DESC LIMIT 0,3  ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
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
								<a href="seminaire-details.php?id_formation=<?php echo $result->id_conference;?>">
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
											Débute le

											<?php echo htmlentities($result->conferencedeb);?>

											</div>
													<div class="register col-xs-14 ">
															En savoir plus
													</div>
									</div>
							</div>

								</a>
							</div>

					</div>
		<?php }} ?>
	</div>
	</div>

	<div class="row">
		<div class="col-lg-36 text-center">
				<a href="conference.php" class="btn btn-default btn-spaced"><span style="color:black;">Toute les conférences</span></a>
		</div>
</div>
		<!--Grid row-->
</section>
		<div class="row">
				<div class="universities">
		<div class="row ">
			<div class="col-lg-36 text-center">
				<h2 class="big-title big-margin">Partenaires</h2>
			</div>
		</div>
		<div class="row">

        <div class="col-md-36">
            <ul class="universities-list">
		<?php
		$sql = "SELECT * FROM partenaire p JOIN parte t on p.id=t.id_partenaire GROUP BY t.id_partenaire LIMIT 0,12 ";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{				?>
                <li>
                        <a href="https://www.fun-mooc.fr/universities/hesam/">
                        <div class="university-logo center-block">
                            <img src="admin/images/partenaire/<?php echo htmlentities($result->photo);?>" alt="crescens" title="<?php echo htmlentities($result->fileName);?>" class="img-responsive">
                        </div>
                        </a>
                </li>
				<?php }} ?>

            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-36 text-center">
            <a href="partenaire.php" class="btn btn-default btn-spaced">Tous les Partenaires</a>
        </div>
    </div>
	<div class="fun-news fun-news-background">
	<div class="container">
				<div class="row ">
        <div class="col-lg-36 text-center">
            <h2 class="big-title big-margin" style="color: white;">Actualités</h2>
        </div>
    </div>
			<div class="banner-bottom-grids">
			<?php
	$sql = "SELECT * FROM actualite p JOIN actual t on p.id=t.id_actualite GROUP BY t.id_actualite LIMIT 0,3 ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>

				<div class="col-md-4 banner-bottom-grid">
					<div class="banner-bottom-middle">
						<a href="products.html">
							<img src="admin/images/actualite/<?php echo htmlentities($result->photo);?>" alt="crescens" title="<?php echo htmlentities($result->actualiteTitle);?>">
							<div class="destinations-grid-info tours">
								<h5><?php echo htmlentities($result->actualiteTitle);?></h5>
								<p><?php echo substr(nl2br(htmlentities($result->actualiteOverview)),0,100);?></p>
								<h6 style="text-align:right;">Le <?= date("d/m/Y à H:i",strtotime($result->date)); ?></h6>
							</div>
						</a>
					</div>

				</div>
				<?php }} ?>




				<div class="clearfix"> </div>
			</div>
								<div class="row">
        <div class="col-lg-36 text-center" >
            <a href="actualite.php" class="btn btn-default btn-spaced" style="">Tous les actualités</a>
        </div>
    </div>
		</div>
		</div>
		<div class="container" style="background-color:#fff;">
		<div class="box_3">
       	  <div class="row ">
        <div class="col-lg-36 text-center">
            <h2 class="big-title big-margin">Témoignages</h2>
        </div>
    </div>
    <?php
$sql = "SELECT * FROM users p JOIN testi t on p.email=t.email join formation f on t.id_formation=f.id LIMIT 0,2 ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
       	  <div class="col-md-6 testimonial">
		    <blockquote>
				<p><?php echo htmlentities($result->temoignage);?></p>
			</blockquote>
			<div class="author">
				<h6 style="text-transform:lowercase;"><?php echo htmlentities($result->email);?></h6>
        <h6 style="text-align:left;text-transform:lowercase;">Le <?= date("d/m/Y à H:i",strtotime($result->date)); ?></h6>
			</div>
		  </div>
      <?php }} ?>
	  
		
		 <div class="clearfix"> </div>
       </div>
	   						<div class="row">
        <div class="col-lg-36 text-center" >
            <a href="temoignage.php" class="btn btn-default btn-spaced" style="">Tous les témoignages</a>
        </div>
	</div>
	</div>
</div>
	</div>







		</div>
	</div>



	<!-- //banner-bottom -->

<!-- //services -->
<!-- //banner-bottom -->



<!-- stats -->

<!-- //stats -->

<!-- testimonials -->

<!-- //testimonials -->

<!-- footer -->
<?php include'includes/footer.php' ?>
<!-- //footer -->
<!-- start-smoth-scrolling -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/JiSlider.js"></script>
<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- //footer -->
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
	<script src="js/mdb.min.js"></script>
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
