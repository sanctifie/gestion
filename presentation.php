<?php
    session_start();
  include('admin/includes/config.php');
include('admin/includes/connect.php');

?>
<!-- banner -->
<?php include('includes/header.php');?>

<!-- //banner -->
<!-- banner-bottom -->
<!-- services -->
	<div class="services two" style="background-color:#edeeef;">
		<div class="container">
								<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Date de création</li>
							<li>Situation Géographique</li>
							<li>But et motivations</li>
							<li>Historique</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							   <p class="w3ls_para">mise en place le 04 octobre 2016  à Libreville au GAGON ou se situe son siège par plusieurs ingénieurs informaticiens</p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page_agile_its_w3ls">
								<p class="w3ls_para">La Fédération africaine D’Informatique est située à l’ancien </p>


							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  
							   <p class="w3ls_para">
							   La Fédérations Africain D’Informatique se donne comme mission de :
									Créer une communauté des informaticiens d’Afrique engagés pour la promotion de la technologie en Afrique, de son rayonnement à l’International ; 
									Informer et former l’Afrique sur les métiers de l’informatique et des solutions que propose l’informatique sur les activités quotidiennes ; 
									Aider l’Afrique à être informé et formé sur chaque innovation dans le domaine de l’informatique ; 
									Proposer des solutions informatiques aux services public et privé grâce aux partenariats ; 
									Jouer le rôle d’aide pour ses partenaires conformément aux clauses des partenariats.  
</p>
							</div>
						</div>
									   <div class="tab4">

							<div class="single_page_agile_its_w3ls">
							  
							<p class="w3ls_para">Lancée par des étudiants ingénieurs de l'institut africain d'informatique en octobre 2016, cette initiative vise à fédérer les projets des entreprises et écoles africaine pour leur donner une visibilité internationale.

									Le catalogue de cours disponibles s'est continuellement enrichi pour proposer une variété de formations répondant aux besoins de tous les publics. Nous sommes partis d'une offre d'une dizaine de cours sur quelques thématiques. Nous avons maintenant une couverture très complète des thématiques et une offre de 150 cours dont certains se sont rejoués quatre fois.

									
									FAI est désormais un Groupement d'Intérêt Public .
									
								</p>
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
<!-- //here ends scrolling icon -->
</body>
</html>
