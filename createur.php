<?php
    session_start();
  include('admin/includes/config.php');
include('admin/includes/connect.php');

?>
<!-- banner -->
<?php include('includes/header.php');?>

<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
		<div class="container">
		
			
				<div class="team-w3ls-row">
				   <h3 class="w3l_header w3_agileits_header">Nos<span>Formateurs</span></h3>
				   <div class="agileits_banner_bottom_grids">
				     <?php
$sql = "SELECT * FROM user";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>
				<div class="col-md-3 col-sm-6 team-grids">
					<img src="admin/images/admin/<?php echo htmlentities($result->image);?>" alt=""/>
					<div class="img-caption w3-agileits">
						<div class="img-agileinfo-text">
							<h4><?php echo htmlentities($result->UserName);?></h4>
							<p><?php echo htmlentities($result->profession);?></p> 
							<div class="w3social-icons"> 
								<ul>
									<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
									<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> </a></li> 
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php }} ?>
			
				
				
				<div class="clearfix"> </div> 
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
