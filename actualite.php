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



<div class="courses-page" style="background-color:#edeeef;">
	


	<div class="row-fluid">

			<div id="course-search" class="course-list clearfix">

							</div>

							<div class="right row">
									

									<div class="result-navigation result-navigation-top">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

		<div class="navigation-block total-count">
			<?php
			//Query for Listing count
			$sql = "SELECT id from actualite";
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
			
				<div class="col-md-3 banner-bottom-grid">
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
						</div>
						<div class="navigation-block labels-search hidden-xs">

					</div>

									<div class="result-navigation result-navigation-bottom">


	<div class="navigation-bar color-denim-blue">

	<div class="navigation-left">

					<div class="navigation-block total-count">
						<?php
						//Query for Listing count
						$sql = "SELECT id from actualite";
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


							
								<div class="color-iron pages" id="pagination"> </div>
						


									<span class="result-page clickable glyphicon glyphicon-menu-right page-forward" data-page="2"></span>


					</div>


		

			

	</div> <!-- navigation-right -->

</div> <!-- navigation-bar -->


</div>

									

									
							</div>


					</div>
			</div>
	</div>
</div><br><br>

<!-- //services -->

<?php include'includes/footer.php';?>
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
