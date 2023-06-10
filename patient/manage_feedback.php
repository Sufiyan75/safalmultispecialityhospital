<?php
session_start();
error_reporting(0);
include('../authentication/include/connection.php');
include('../authentication/include/checklogin.php');

if (isset($_GET['cancel'])) {
	$feed_id = $_GET['id'];
	$sql = "UPDATE `tbl_feedback` SET `feedback_status` = 'inactive' WHERE `tbl_feedback`.`feedback_id` = '$feed_id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$_SESSION['msg'] = "Your Feedback cancelled !!";
		// echo "<script>alert('Feedback Sent Successfully');</script>";
		echo "<script>window.location.href = 'manage_feedback.php'</script>";
	} else {
		echo "<script>alert('Something Went Wrong!')</script>";
		echo "<script>window.location.href = 'manage_feedback.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Patient | Feedback History</title>

	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../materials/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../materials/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../materials/vendor/themify-icons/themify-icons.min.css">
	<link href="../materials/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="../materials/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="../materials/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="../materials/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
		media="screen">
	<link href="../materials/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="../materials/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet"
		media="screen">
	<link href="../materials/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../materials/assets/css/styles.css">
	<link rel="stylesheet" href="../materials/assets/css/plugins.css">
	<link rel="stylesheet" href="../materials/assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div id="app">
		<?php include('../authentication/include/sidebar.php'); ?>
		<div class="app-content">


			<?php include('../authentication/include/header.php'); ?>
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Patient | Feedback History</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>
										<?php
										$uname = $_SESSION['user_name'];
                                        $sql = "SELECT * FROM `patient_reg` WHERE `username`= '$uname'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $_SESSION['fn'] = $row['fullname'];
                                            echo $row['fullname'];
                                            ?>
									</span>
								</li>
								<li class="active">
									<span>Feedback History</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">

								<p style="color:red;">
									<?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?>
								</p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">Sr. No.</th>
											<th class="hidden-xs">Username</th>
											<th>Email</th>
											<th>Mobile Number</th>
											<th>Message</th>
											<th>Response</th>
											<th>Creation Date / Time</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($conn, "select * from tbl_feedback where username = '$uname' and `feedback_status` = 'active'");
										$cnt = 1;
										}
										while ($row = mysqli_fetch_array($sql)) {
											?>

											<tr>
												<td class="center">
													<?php echo $cnt; ?>.
												</td>
												<td class="hidden-xs">
													<?php echo $row['username']; ?>
												</td>
												<td>
													<?php echo $row['email']; ?>
												</td>
												<td>
													<?php echo $row['mobileno']; ?>
												</td>
												<td>
													<?php echo $row['message']; ?>
												</td>
												<td>
													<?php 
														$r = $row['is_read'];
														if($r == "Yes"){
															echo $row['admin_remark'];
														}
														else{
															echo "No response";
														}
													?>
												</td>
												<td>
													<?php echo $row['posting_date']; ?>
												</td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="manage_feedback.php?id=
															<?php 
																echo $row['feedback_id'];
																$_SESSION['feedback_id'] = $row['feedback_id'];
															?>&cancel=update"
															onClick="return confirm('Are you sure you want to delete this feedback?')"
															class="btn btn-transparent btn-xs tooltips"
															title="Delete Feedback" tooltip-placement="top"
															tooltip="Remove">Delete
														</a>
													</div>
												</td>
												<td>
													
												</td>
											</tr>

											<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- end: BASIC EXAMPLE -->
					<!-- end: SELECT BOXES -->

				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('../authentication/include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('../authentication/include/setting.php'); ?>

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
		jQuery(document).ready(function () {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>
<?php
// }
?>