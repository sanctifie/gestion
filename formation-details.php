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
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mastering an Education Category Flat Bootstrap Responsive Website Template | Services :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mastering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
 <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/mdb.min.css" rel="stylesheet" type="text/css" media="all" />

<!--link href="css/m.css" rel="stylesheet" type="text/css" media="all" /-->
<!--link href="css/zoe.css" rel="stylesheet" type="text/css" media="all" /-->

<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- banner -->
<?php include('includes/header1.php'); ?>

<!-- //banner -->
<!-- services -->
<div id="all">

        <div id="content">
			<div class="container">

                <div class="col-sm-12">

                    <ul class="breadcrumb">

                        <li><a href="account.php">Accueil</a>
                        </li>
                        <li><a href="blog.html">Formations</a>
                        </li>
                        <li>Détail</li>
                    </ul>
                </div>

                <div class="col-sm-9" id="blog-post">
									<?php
									$id_formation=intval($_GET['id_formation']);
									$sql = "SELECT * from formation f join image i on f.id=i.id_formation join salle s on f.id_salle=s.id join pack p on f.id_pack=p.id  join session a on f.id_session=a.id join user u on f.id_users=u.id where f.id='$id_formation' GROUP BY i.id_formation ";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>


                    <div class="box">





                        <div id="post-content">

                                <img src="admin/images/formation/<?php echo htmlentities($result->nom_image);?>" class="img-responsive"  alt="Example blog post alt">
                            </p><br><br>

                        </div>
                        <!-- /#post-content -->
								<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Encadreur</li>
							<li>Information</li>
							<li>MODULE</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6><span style="text-transform:lowercase;">formation <?php echo htmlentities($result->cible);?> sur </span> <span style="color:#232f68"><?php echo htmlentities($result->formationTitle);?> </span></h6>
							   <p class="w3ls_para"><?php echo htmlentities($result->formationOverview);?></p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="admin/images/admin/<?php echo htmlentities($result->image);?>" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#"><?php echo htmlentities($result->UserName );?></a></li> <li><a href="#"><?php echo htmlentities($result->profession);?></a></li>
												<li><a href="#"><?php echo htmlentities($result->prenom);?></a></li>
											</ul>
											<p><?php echo htmlentities($result->biographie);?>.</p>
										</div>
										<div class="clearfix"> </div>
						             </div>
									 <?php	if(isset($_SESSION['auth'])) : ?>
									 <div class="add-review">
										<h4>contact</h4>
										<p><?php echo htmlentities($result->tel);?> / <?php echo htmlentities($result->email);?> </p>
									</div>
									<?php else: ?>
									<?php endif; ?>
								 </div>

							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Fichiers téléchargeables</h6>
							   <p class="w3ls_para">
							   <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>plaquette de formation</th>
                                                        <th>Catalogue de formation</th>



                                                    </tr>
                                                </thead>
                                                <tbody>

                                          <tr>
                                                        <td><a href="admin/imprime_imprime.php?id_formation=<?php echo $result->id_formation;?>" target="_blank" class="btn btn-primary"><i class="fa fa-comment-o">Télécharger</i></a></td>
                                                         <td><a target="_blank" href="admin/imprime_formu.php"  class="btn btn-primary"><i class="fa fa-comment-o">Télécharger</i></a></td>


                                                    </tr>


                                                </tbody>
                                            </table></p>
							</div>
						</div>
									   <div class="tab4">

							<div class="single_page_agile_its_w3ls">
							  <h6>Les modules de la formation</h6>
							   <p class="w3ls_para">
									 <?php
 									$id_formation=intval($_GET['id_formation']);
 									$sql = "SELECT * from module m join pack p on m.packName=p.id";
 									$query = $dbh -> prepare($sql);
 									$query->execute();
 									$zoe=$query->fetchAll(PDO::FETCH_OBJ);
 									$cnt=1;
 									if($query->rowCount() > 0)
 									{
 									foreach($zoe as $crescens)
 									{				?>

							   <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
																										<th>module N°</th>
                                                    <th>intitulé du module</th>



                                                    </tr>
                                                </thead>
                                                <tbody>

                                          <tr>
																												<td><?php echo $cnt;?></td>
                                                        <td><?php echo $crescens->moduleName;?></td>


                                                </tr>


                                                </tbody>
                                            </table>
																						<?php }} ?>
																					</p>
							</div>
						</div>
					</div>
				</div>

<br><hr>
<!-- /#comments --><?php	if(isset($_SESSION['auth'])) : ?>

											 <div id="comment-form" data-animate="fadeInUp" style="opacity: 0;" class="animated fadeInUp">

													 <h4>Postez un témoignage</h4>

													 <form action="traitemant_testimotial.php?id_formation=<?php echo $id_formation ;?>&amp;email=<?php echo $_SESSION['auth']->email;?>" method="post">

															 <div class="row">
																	 <div class="col-sm-12">
																			 <div class="form-group">
																					 <label for="comment">Méssage <span class="required">*</span>
																					 </label>
																					 <textarea class="form-control" id="comment" rows="4" name="temoignage"></textarea>
																			 </div>
																	 </div>
															 </div>

															 <div class="row">
																	 <div class="col-sm-12 text-right">
																			 <button class="btn btn-primary"><i class="fa fa-comment-o"></i> Post comment</button>
																	 </div>
															 </div>


													 </form>

											 </div>
											 <!-- /#comment-form -->
											 <?php else: ?>

												 <?php endif; ?>



                        <!-- /#comment-form -->

                    </div>

                    <!-- /.box -->
                </div>
                <!-- /#blog-post -->

                <div class="col-md-3">
                    <!-- *** BLOG MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu" style="background-color: #232f68;">

							<div class="panel-heading" style="background-color: #232f68;">
								<?php	if(isset($_SESSION['auth'])) : ?>
									<?php if(user_has_already_like_the_micropost($id_formation)): ?>
										<a  href="traitement_unapp.php?id_formation=<?php echo $id_formation ;?>&amp;id_apprenant=<?php echo $_SESSION['auth']->id ;?>" class="btn btn-primary"><i class="fa fa-comment-o">Annuler</i></a>
								<?php else: ?>
										<a  href="traitement_app.php?id_formation=<?php echo $id_formation ;?>&amp;id_apprenant=<?php echo $_SESSION['auth']->id ;?>&amp;email=<?php echo $_SESSION['auth']->email ;?>" class="btn btn-primary"><i class="fa fa-comment-o">S'inscrire</i></a>
									<?php endif; ?>
								<?php else: ?>
								<a href="login.php"  class="btn btn-primary"><i class="fa fa-comment-o">S'inscrire</i></a>
								<?php endif; ?>
	                        </div>


                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">

								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Début du cours </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->formationdeb);?></span/>
                                </li>
								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Fin du cours </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->formationfin);?></span>
                                </li><hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Heure de début </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->heuredeb);?></span>
                                </li><hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Heure fin cours </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->heurefin);?></span>
                                </li>
								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Séssion</strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->sessionName);?></span>
                                </li>
								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Salle</strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->salleName);?></span>
                                </li>
								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Pack </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->packName);?></span>
                                </li>
								<hr/

                            </ul>
                        </div>

                    </div>

                    <!-- /.col-md-3 -->

                    <!-- *** BLOG MENU END *** -->


                </div>



            </div>
			<?php }} ?>

          </div>
            <!-- /.content -->
 </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->




                <!--div class="course-image hidden-md hidden-sm hidden-xs">
                    <div class="video-button"></div>
                    <img src="FUN%20-%20Du%20manager%20agile%20au%20leader%20designer%20_%20From%20an%20agile%20manager%20to%20a%20designer%20leader_files/course-v1cnam01002session05.jpg">
                </div>

                            <div class="register-course-button">
                                    <a href="#" class="register"><span>S'inscrire</span></a>
                            </div>
                        <div class="register-error"></div>

                <div class="blue-zone">
                    <div class="row">
                        <div class="col-sm-36 social-networks">
                            <a href="https://www.facebook.com/france.universite.numerique" target="_blank">
                                <span class="facebook"></span>
                            </a>
                            <a href="http://twitter.com/intent/tweet?text=Je+viens+de+m%27inscrire+pour+Du+manager+agile+au+leader+designer+/+From+an+agile+manager+to+a+designer+leader+via+@funmooc:+http://www.fun-mooc.fr/courses/course-v1:CNAM+01002+session05/about" target="_blank">
                                <span class="twitter"></span>
                            </a>
                            <a href="mailto:?subject=Suivez%20un%20cours%20en%20ligne%20avec%20FUN&amp;body=Je%20viens%20de%20m%27inscrire%20pour%20Du%20manager%20agile%20au%20leader%20designer%20/%20From%20an%20agile%20manager%20to%20a%20designer%20leader%20via%20FUN%20http://www.fun-mooc.fr/courses/course-v1:CNAM+01002+session05/about" target="_blank">
                                <span class="email"></span>
                            </a>
                        </div>
                        <div class="col-xxs-36 col-xs-18 col-sm-36 col-lg-18">
                            <div class="course-info calendar">
                                <ul>
                                <li>
                                    <strong>Fin d'inscription</strong>
                                </li>
                                <li>
                                            25 mar 2018
                                </li>
                                </ul>
                            </div>
                            <div class="course-info calendar">
                                <ul>
                                <li>
                                    <strong>Début du Cours</strong>
                                </li>
                                <li>
                                    15 fév 2018
                                </li>
                                </ul>
                            </div>
                            <div class="course-info calendar">
                                <ul>
                                <li>
                                    <strong>Fin du cours</strong>
                                </li>
                                    25 mar 2018
                                <li>
                                </li>
                                </ul>
                            </div>


                        </div>
                        <div class="col-xxs-36 col-xs-18 col-sm-36 col-lg-18">


                            <div class="course-info letter">
                                <ul>
                                <li>
                                    <strong>Effort estimé</strong>
                                </li>
                                <li>
                                    02:30 h/semaine
                                </li>
                                </ul>
                            </div>


                            <div class="course-info bubble">
                                <ul>
                                <li>
                                    <strong>Langue</strong>
                                </li>
                                <li class="icon fr-flag">
                                    Français
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div-->


<!-- //services -->

<?php include'includes/footer.php' ?>
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
	<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->
<!-- //here ends scrolling icon -->
</body>
</html>
