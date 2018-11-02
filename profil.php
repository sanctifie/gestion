<?php
    session_start();
	require 'includes/functions.php';
  include('admin/includes/config.php');
include('admin/includes/connect.php');
	logged_only();

?>
<!-- banner -->
	<!-- banner -->
	<?php include('includes/header2.php'); ?>
<!-- //banner -->
<!-- registration -->
		<div class="container">
			<div class="content-wrapper" id="content">
        <div id="left_block">
          <form  action="dropzone/upload.php" class="dropzone" id="dropzonewidget" enctype="multipart/data-form">
            <img id="profile_img" src="img/me.png" alt="" />
    </form>

		<div id="infos_user" style="padding-left: 5px">
			<div id="updates">
				<span class="blue">1025</span> <br/> POSTS
			</div>
			<div id="friends_number">
				<span class="blue">758</span> <br/> AMIS
			</div>
		</div>
		<div id="search">
			 Rechercher des amis
			<input type="search" />
		</div>


	</div>



			</div>
		 </div>
	</div>
<!-- registration -->
<!-- stats -->
</body>
</html>
