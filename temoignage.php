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
	</div>
	</div>
</div><br><br>

<!-- //services -->

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
