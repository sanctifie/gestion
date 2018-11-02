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

                        <li><a href="index.html">Accueil</a>
                        </li>
                        <li><a href="blog.html">Formations</a>
                        </li>
                        <li>Détail</li>
                    </ul>
                </div>

                <div class="col-sm-9" id="blog-post">
									<?php
									$id_formation=intval($_GET['id_formation']);
									$sql = "SELECT * from formation f join image i on f.id=i.id_formation join salle s on f.id_salle=s.id join pack p on f.id_pack=p.id join session a on f.id_session=a.id join user u on f.id_users=u.id where f.id='$id_formation' GROUP BY i.id_formation ";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>


                    <div class="box">

                        <h1><?php echo htmlentities($result->formationTitle);?></h1>



                        <div id="post-content">

                                <img src="admin/images/formation/<?php echo htmlentities($result->nom_image);?>" class="img-responsive"  alt="Example blog post alt">
                            </p><br><br>

														<h2>A Propos de la formation</h2><br>



                            <blockquote><p><?php echo htmlentities($result->formationOverview);?></p><blockquote>



                        </div><br><hr>
                        <!-- /#post-content -->
									
			<div class="agileits-info">
				<div class="agileits-infoleft">
					<img src="images/img1.JPG" width="20%" alt="">
					<div class="agileits-infotext">
						<h2>Jose Leiter</h2>
						<h6>Fashion Designer</h6> 
					</div> 
				</div> 
				<div class="agileits-inforight"> 
					<p><img src="images/i1.png" alt=""> +01 11 222 3333</p>
					<p><img src="images/i2.png" alt=""> <a href="mailto:example@mail.com"> mail@example.com</a></p>
				</div>	
				<div class="clear"> </div>
			</div>
			<h3>Send a message to me</h3>
			<div class="contact-wthree">
				
			 
		</div><br><hr>
		



                        <div id="comments" data-animate="fadeInUp" style="opacity: 0;" class="animated fadeInUp">
                            <h4>2 comments</h4>


                            <div class="row comment">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5>Julie Alma</h5>
                                    <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                    </p>
                                </div>
                            </div>
                            <!-- /.comment -->


                            <div class="row comment last">

                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="img/blog-avatar.jpg" class="img-responsive img-circle" alt="">
                                    </p>
                                </div>

                                <div class="col-sm-9 col-md-10">
                                    <h5>Louise Armero</h5>
                                    <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2012 at 12:00 am</p>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                    </p>
                                </div>

                            </div>
                            <!-- /.comment -->

                        </div>
                        <!-- /#comments -->

                        <div id="comment-form" data-animate="fadeInUp" style="opacity: 0;" class="animated fadeInUp">

                            <h4>Leave comment</h4>

                            <form>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="required">*</span>
                                            </label>
                                            <input class="form-control" id="name" type="text">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="required">*</span>
                                            </label>
                                            <input class="form-control" id="email" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="comment">Comment <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control" id="comment" rows="4"></textarea>
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
										<a  href="traitement_app.php?id_formation=<?php echo $id_formation ;?>&amp;id_apprenant=<?php echo $_SESSION['auth']->id ;?>" class="btn btn-primary"><i class="fa fa-comment-o">S'inscrire</i></a>
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

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
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
