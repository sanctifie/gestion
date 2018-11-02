<?php
    session_start();
  include('admin/includes/config.php');
include('admin/includes/connect.php');

?>
<!-- banner -->
<?php include('includes/header.php');?>
<!-- mail -->
	
	<div class="contact">
		<div class="container">
			<h3 class="w3l_header w3_agileits_header1">Demandez votre <span>Dévis</span></h3>
			<div class="w3layouts_mail_grid">
					<div class="agileits_mail_grid_right agileits_w3layouts_mail_grid_right">
					<div class="agileits_mail_grid_right1 agile_mail_grid_right1">
						<form action="deviss.php" method="post">
							<span>
								<i>Nom</i>
								<input type="text" name="nom" placeholder=" " required="">
							</span><span>
								<i>Prénom</i>
								<input type="text" name="prenom" placeholder=" " required="">
							
							<span>
								<i>Email</i>
								<input type="email" name="email" placeholder=" " required="">
							</span>
							</span><span>
								<i>Telephone</i>
								<input type="text" name="tel" placeholder=" " required="">
							</span>
							<span>
								<i>Structure</i>
								<select type="text"  name="societe" required="">
								<option value="Entreprise">Entreprise</option>
								<option value="Personnel">Personnel</option>
								
								</select>
							</span>
							<span>
								<i>Fonction</i>
								<input type="text" name="poste" placeholder=" " required="">
							</span>
							<span>
								<i>Nombre de place</i>
								<input type="text" name="nombre" placeholder=" " required="">
							</span><br>
							<span>
								<i>lieux de la formation</i>
								<select type="text"  name="lieux" required="">
								<option value="FAI">Dans nos locaux</option>
								<option value="externe">Dans vos locaux</option>
								</select>
							</span><br>
							
							<span>
								<i>Votre besoin</i>
								<textarea name="besoin" placeholder=" " required=""></textarea>

							</span>
							<input type="submit" value="SUBMIT">
						</form>
					</div>
				</div>
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //mail -->
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
