<?php
session_start();
error_reporting(0); 
?>
<header class="navbar navbar-default navbar-static-top">
	<!-- start: NAVBAR HEADER -->
	<div class="navbar-header">
		<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle"
			data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
			<i class="ti-align-justify"></i>
		</a>
		<a class="navbar-brand" href="#">
			<h2 style="padding-top:20px ">Safal Hospital</h2>
		</a>
		<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed"
			data-toggle-target="#app">
			<i class="ti-align-justify"></i>
		</a>
		<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse"
			href=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<i class="ti-view-grid"></i>
		</a>
	</div>
	<!-- end: NAVBAR HEADER -->
	<!-- start: NAVBAR COLLAPSE -->
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-right">
			<!-- start: MESSAGES DROPDOWN -->
			<li style="padding-top:2% ">
				<h2>Safal Multispeciality Hospital</h2>
			</li>


			<li class="dropdown current-user">
				<a href class="dropdown-toggle" data-toggle="dropdown">
				<?php 
					$uname = $_SESSION['user_name'];
					$sql = "SELECT `profilepic` FROM `patient_reg` WHERE `username`= '$uname'";
					$result = mysqli_query($conn, $sql);

					while($row = mysqli_fetch_assoc($result)){
					?>
					<img src="../authentication/registration/picture/<?php echo $row['profilepic']; ?>" width="100" height="50" class="img-thumbnail" alt="No Image Found"> <span class="username">
						<?php
							$sql = "SELECT `fullname` FROM `patient_reg` WHERE `username`= '$uname'";
							$result = mysqli_query($conn, $sql);

							while($row = mysqli_fetch_assoc($result)){
								echo $row['fullname'];
								$fname = $row['fullname'];
								$_SESSION['fullname'] = $fname;
							}
						} ?> 
						<i class="ti-angle-down"></i></i>
					</span>
				</a>
				<ul class="dropdown-menu dropdown-dark">
					<li>
						<a href="../patient/edit_profile.php">
							My Profile
						</a>
					</li>

					<li>
						<a href="../authentication/login/forgot_pass.html">
							Change Password
						</a>
					</li>
					<li>
						<a href="../authentication/logout/log_out.php">
							Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- end: USER OPTIONS DROPDOWN -->
		</ul>
		<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
		<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
	</div>


	<!-- end: NAVBAR COLLAPSE -->
</header>