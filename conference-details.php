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
									$sql = "SELECT * from conference f join images i on f.id=i.id_conference join salle s on f.id_salle=s.id join user u on f.id_users=u.id   where f.id='$id_formation' GROUP BY i.id_conference ";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{				?>


                    <div class="box">

                        <h1><?php echo htmlentities($result->conferenceTitle);?></h1>



                        <div id="post-content">

                                <img src="admin/images/conference/<?php echo htmlentities($result->image_conf);?>" class="img-responsive"  alt="Example blog post alt">
                            </p><br><br>

														<h2>A Propos de la formation</h2><br>



                            <blockquote><p><?php echo htmlentities($result->conferenceOverview);?></p><blockquote>



                        </div><br>
                        <!-- /#post-content -->



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
									<?php if(userss_has_already_like_the_sem($id_formation)): ?>
										<a  href="traitement_upp.php?id_formation=<?php echo $id_formation ;?>&amp;id_apprenant=<?php echo $_SESSION['auth']->id ;?>" class="btn btn-primary"><i class="fa fa-comment-o">Annuler</i></a>
								<?php else: ?>
										<a  href="traitement_a.php?id_formation=<?php echo $id_formation ;?>&amp;id_apprenant=<?php echo $_SESSION['auth']->id ;?>" class="btn btn-primary"><i class="fa fa-comment-o">S'inscrire</i></a>
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
                                   <span style="color:white;"> <?php echo htmlentities($result->conferencedeb);?></span/>
                                </li>
								<hr/>
								<li style="text-align:center;">
                                    <strong style="color:white;">Fin du cours </strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->conferencefin);?></span>
                                </li>
								<hr/>

								<li style="text-align:center;">
                                    <strong style="color:white;">Salle</strong>
                                </li><br/>
								<li style="text-align:center;">
                                   <span style="color:white;"> <?php echo htmlentities($result->salleName);?></span>
                                </li>
								<hr/>



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
								<?php }} ?>


            </div>

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
	<?php include'includes/footer.php' ?>
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
