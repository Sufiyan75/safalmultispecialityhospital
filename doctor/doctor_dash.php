<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Dashboard</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../materials/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../materials/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../materials/vendor/themify-icons/themify-icons.min.css">
		<link href="../materials/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../materials/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../materials/assets/css/styles.css">
		<link rel="stylesheet" href="../materials/assets/css/plugins.css">
		<link rel="stylesheet" href="../materials/assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">		
<?php include('../doctor/include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('../doctor/include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Dashboard</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>
										<?php
											$uname = $_SESSION['fullname'];
											echo $uname;
										?>
										</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">My Profile</h2>
											
											<p class="links cl-effect-1">
												<a href="doc_edit_profile.php">
													Update Profile
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">My Appointments</h2>
										
											<p class="cl-effect-1">
												<a href="doc_appointment_history.php">
													View Appointment History
												</a>
											</p>
										</div>
									</div>
								</div>
								
							</div>
						</div>
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../materials/vendor/jquery/jquery.min.js"></script>
		<script src="../materials/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../materials/vendor/modernizr/modernizr.js"></script>
		<script src="../materials/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../materials/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../materials/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../materials/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../materials/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../materials/vendor/autosize/autosize.min.js"></script>
		<script src="../materials/vendor/selectFx/classie.js"></script>
		<script src="../materials/vendor/selectFx/selectFx.js"></script>
		<script src="../materials/vendor/select2/select2.min.js"></script>
		<script src="../materials/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../materials/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../materials/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../materials/assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

