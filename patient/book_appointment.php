<?php
session_start();
error_reporting(0);
include('../authentication/include/connection.php');
include('../authentication/include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$pa_username = $_SESSION['pa_username'];
	$specilization = $_POST['specialization'];
	$ret = mysqli_query($conn, "SELECT `doc_username` FROM `doctor_reg` WHERE `specialization` = '$specilization'");
	while ($row = mysqli_fetch_array($ret)) {
		$_SESSION['doc_username'] = $row['doc_username'];
	}
	$doc_username = $_SESSION['doc_username'];
	$userid = $_SESSION['id'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['time'];
	$reason = $_POST['AppointmentReason'];
	$userstatus = 1;
	$docstatus = 1;


	$query = mysqli_query($conn, "INSERT INTO `appointment`(`username`, `doc_username`, `specialization`, `fees`, `date`, `time`, `reason`, `userStatus`, `doctorStatus`) VALUES ('$pa_username', '$doc_username','$specilization', '$fees','$appdate','$time','$reason','$userstatus','$docstatus')");
	if ($query) {
		echo "<script>alert('Your appointment booked successfully');</script>";
		echo "<script>window.location.href = 'appointment_history.php'</script>";
	} else {
		echo "<script>alert('Please Try Again!')</script>";
		echo "<script>window.location.href = 'book_appointment.php'</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Patient | Book Appointment</title>

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
	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function (data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>
	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function (data) {
					$("#fees").html(data);
				}
			});
		}
	</script>
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
								<h1 class="mainTitle">Patient | Book Appointment</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>
										<?php
										$fname = $_SESSION['fullname'];
										echo $fname;
										$ret = mysqli_query($conn, "SELECT `username` FROM `patient_reg` WHERE `fullname` = '$fname'");
										while ($row = mysqli_fetch_array($ret)) {
											$_SESSION['pa_username'] = $row['username'];
										}
										?>
									</span>
								</li>
								<li class="active">
									<span>Book Appointment</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-8">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h7 class="panel-title"><b>Book Appointment</b></h7>
											</div>
											<div class="panel-body">
												<p style="color:red;">
													<?php echo htmlentities($_SESSION['msg1']); ?>
													<?php echo htmlentities($_SESSION['msg1'] = ""); ?>
												</p>
												<form role="form" name="book" method="post">
													<div class="form-group">
														<label for="specialization">Doctor Specialization</label>
														<select name="specialization" id="specialization"
															class="form-control" onChange="getdoctor(this.value);"
															required>
															<option value="">Select Specialization</option>
															<?php
															$ret = mysqli_query($conn, "SELECT `specialization` FROM `doctor_reg`");
															while ($row = mysqli_fetch_array($ret)) {
																?>
																<option
																	value="<?php echo htmlentities($row['specialization']); ?>">
																	<?php echo htmlentities($row['specialization']); ?>
																</option>
															<?php } ?>
														</select>
													</div>

													<div class="form-group">
														<label for="doctor">
															Doctors
														</label>
														<select name="doctor" class="form-control" id="doctor"
															onChange="getfee(this.value);" required="required">
															<option value="">Select Doctor</option>
														</select>
													</div>

													<div class="form-group">
														<label for="consultancyfees">
															Consultancy Fees (&#8377;)
														</label>
														<select name="fees" class="form-control" id="fees" readonly>
															<option value=""></option>
														</select>
													</div>

													<div class="form-group">
														<label for="AppointmentDate">Date</label>
														<input type="date" onChange="gettime(this.value);"
															class="form-control" id="time" name="appdate"
															min="<?php echo date('Y-m-d'); ?>" required>
													</div>
													<!-- <div class="form-group">
														<label for="AppointmentDate">
															Date
														</label>
														<input class="form-control datepicker" name="appdate"
															required="required" data-date-format="yyyy-mm-dd">
															<script>
															jQuery(document).ready(function () {
																Main.init();
																FormElements.init();
															});

															$('.datepicker').datepicker({
																format: 'yyyy-mm-dd',
																startDate: '-0d'
															});
														</script>
													</div> -->

													<div class="form-group">
														<label for="Appointmenttime">Time</label>
														<select name="time" class="form-control" id="time" required>
															<option value="">Select Time</option>
															<option value="10,10.30">10:00 AM - 10:30 AM</option>
															<option value="10.30,11">10:30 AM - 11:00 AM</option>
															<option value="11,12">11:00 AM - 12:00 AM</option>
														</select>
													</div>
													<style>
														body {
															font-family: 'Roboto';
														}

														.days {
															width: 1000px;
														}

														.day {
															width: 120px;
															height: 230px;
															background-color: #efeff6;
															padding: 10px;
															float: left;
															margin-right: 7px;
															margin-bottom: 5px;
														}

														.datelabel {
															margin-bottom: 15px;
														}

														.timeslot {
															background-color: #00c09d;
															width: auto;
															height: 30px;
															color: white;
															padding: 7px;
															margin-top: 5px;
															font-size: 14px;
															border-radius: 3px;
															vertical-align: center;
															text-align: center;
														}

														.timeslot:hover {
															background-color: #2CA893;
															cursor: pointer;
														}
													</style>

													<div class="form-group">
														<label for="AppointmentReason">Reason</label>
														<textarea name="AppointmentReason" class="form-control"
															id="AppointmentReason" rows="5"
															placeholder="Reason"></textarea>
													</div>

													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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