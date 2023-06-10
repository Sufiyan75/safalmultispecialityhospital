<?php
session_start();
// error_reporting(0);
include('include/connection.php');

if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $_SESSION['doc_username'] = $username;
    $specialization = $_POST['specialization'];
    $qualify = $_FILES["qualify"]["name"];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $folder = "../authentication/registration/qualification/" . $qualify;
    $tempname = $_FILES["qualify"]["tmp_name"];

    move_uploaded_file($tempname, $folder);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid Email Format!')</script>";
        echo "<script>window.location.href = 'doctor_reg_form.html'</script>";
    }
    elseif(strlen($phonenumber) != 10){
        echo "<script>alert('Invalid Mobile Number Format!')</script>";
        echo "<script>window.location.href = 'doctor_reg_form.html'</script>";
    }
    else{
        $sql = "INSERT INTO `doctor_reg` (`fullname`, `doc_username`, `specialization`, `qualification`, `phonenumber`, `address`, `city`, `gender`, `email`, `password`) VALUES 
        ('$fullname', '$username', '$specialization', '$qualify', '$phonenumber', '$address', '$city', '$gender', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
    
        if(!$result){
            echo "<script>alert('Please Try Again!')</script>";
            echo "<script>window.location.href = 'add-doctor.php'</script>";
        }
        else{
            echo "<script>alert('Doctor's Details Added Successfully')</script>";
            echo "<script>window.location.href = 'manage-doctors.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Add Doctor</title>

	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<script type="text/javascript">
		function valid() {
			if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.adddoc.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>


	<script>
		function checkemailAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'emailid=' + $("#docemail").val(),
				type: "POST",
				success: function (data) {
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function () { }
			});
		}
	</script>
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Admin | Add Doctor</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Add Doctor</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add Doctor</h5>
											</div>
											<div class="panel-body">

												<form role="form" name="adddoc" method="post" id="register"
													enctype="multipart/form-data" onSubmit="return valid();">
													<div class="form-group">
														<input type="text" class="form-control" id="fullname"
															minlength="3" maxlength="25"
															title="Enter Fullname(Max Length: 25)"
															onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
															name="fullname" placeholder="Full Name" required>
													</div>
													<div class="form-group">
														<input type="text" class="form-control" name="username"
															minlength="3" maxlength="15"
															title="Enter Username(Max Length: 15)"
															onkeypress="return(event.charCode != 32)"
															placeholder="User Name" required>
													</div>
													<div class="form-group">
														<label for="specialization">
															Doctor Specialization
														</label>
														<input type="text" name="specialization" class="form-control"
															placeholder="Enter Doctor Specialization" required="true">
													</div>
													<div class="form-group">
														<label class="block">Upload Your Qualification</label>
														<input type="file" class="form-control" name="qualify"
															id="qualify" title="Upload Qualification"
															accept="image/*, application/pdf" required>
													</div>
													<div class="form-group">
														<input type="text" onkeydown="phone()"
															onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
															class="form-control" maxlength="10" name="phonenumber"
															id="phonenumber" title="Enter Phonenumber(Max Length: 10)"
															placeholder="Phone Number" required>
														<span id="phonetxt" style="font-size: 12px;"></span>
														<script>
															function phone() {
																var form = document.getElementById("register");
																var mobile = document.getElementById("phonenumber").value;
																var phone = document.getElementById("phonetxt");
																var mobileexp = /^\d{10}$/;

																if (mobile.match(mobileexp)) {
																	form.classList.add("valid");
																	form.classList.remove("Invalid");
																	phone.innerHTML = "Your Phone Number is valid";
																	phone.style.color = "#00ff00";
																}
																else {
																	form.classList.remove("valid");
																	form.classList.add("Invalid");
																	phone.innerHTML = "Your Phone Number is not valid";
																	phone.style.color = "#ff0000";
																}
															}   
														</script>
													</div>
													<div class="form-group">
														<textarea name="address" class="form-control" id="address"
															rows="5" title="Enter Address" placeholder="Address"
															required></textarea>
													</div>
													<div class="form-group">
														<!-- <label for="city">City: </label> -->
														<select name="city" class="form-control" id="city" required>
															<option value="none" selected disabled hidden>Select Area
																&#9660;</option>
															<option value="Bapunagar">Bapunagar</option>
															<option value="Dariyapur">Dariyapur</option>
															<option value="Gandhi Road">Gandhi Road</option>
															<option value="Jamalpur">Jamalpur</option>
															<option value="Kalupur">Kalupur</option>
															<option value="Khadia">Khadia</option>
															<option value="Khanpur">Khanpur</option>
															<option value="Manek Chowk">Manek Chowk</option>
															<option value="Nava Vadaj">Nava Vadaj</option>
															<option value="Rakhial">Rakhial</option>
															<option value="Raipur">Raipur</option>
															<option value="Sanand">Sanand</option>
															<option value="Shahibaug">Shahibaug</option>
															<option value="Shahpur">Shahpur</option>
															<option value="Shukhramnagar">Shukhramnagar</option>
															<option value="Sharkhej">Sharkhej</option>
															<option value="Thaltej">Thaltej</option>
														</select>
													</div>
													<div class="form-group">
														<label class="block">
															Gender
														</label>
														<div class="clip-radio radio-primary">
															<input type="radio" id="rg-male" name="gender" value="male"
																required>
															<label for="rg-male">
																Male
															</label>
															<input type="radio" id="rg-female" name="gender"
																value="female">
															<label for="rg-female">
																Female
															</label>
															<input type="radio" id="rg-other" name="gender"
																value="other">
															<label for="rg-other">
																Other
															</label>
														</div>
													</div>
													<div class="form-group">
														<span class="input-icon">
															<input type="text" class="form-control" name="email"
																id="email" title="Enter Email"
																onkeydown="ValidateEmail()" placeholder="Email"
																required>
															<span id="text" style="font-size: 12px;"></span>
															<i class="fa fa-envelope"></i> </span>
														<span id="user-availability-status1"
															style="font-size:12px;"></span>
														<script>
															function ValidateEmail() {
																var form = document.getElementById("register");
																var email = document.getElementById("email").value;
																var text = document.getElementById("text");

																var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
																if (email.match(pattern)) {
																	form.classList.add("valid");
																	form.classList.remove("Invalid");
																	text.innerHTML = "Your Email address is valid";
																	text.style.color = "#00ff00";
																}
																else {
																	form.classList.remove("valid");
																	form.classList.add("Invalid");
																	text.innerHTML = "Your Email address is not valid";
																	text.style.color = "#ff0000";
																}
															}
														</script>
													</div>
													<div class="form-group">
														<span class="input-icon">
															<input type="password" class="form-control" id="password"
																name="password" title="Enter Password(Min Length: 6)"
																placeholder="Password" minlength="6" required>
															<i class="fa fa-lock"></i> </span>
													</div>
													<div class="form-group">
														<span class="input-icon">
															<input type="password" class="form-control"
																id="password_again"
																title="Enter Password(Min Length: 6)"
																name="password_again" placeholder="Password Again"
																required>
															<i class="fa fa-lock"></i> </span>
													</div>
													<input type="checkbox" onclick="myFunction()" class="check mt-2">
													show password
													<script>
														function myFunction() {
															var x = document.getElementById("password");
															var y = document.getElementById("password_again");
															if (x.type === "password") {
																x.type = "text";
																y.type = "text"
															}
															else {
																x.type = "password";
																y.type = "password";
															}
														}

													</script><br><br>


													<button type="submit" name="submit" id="submit"
														class="btn btn-o btn-primary">
														Submit
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->






			<!-- end: SELECT BOXES -->

		</div>
	<!-- </div>
	</div> -->
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
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