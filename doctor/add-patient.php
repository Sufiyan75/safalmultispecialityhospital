<?php
session_start();
error_reporting(0);
include('../doctor/include/connection.php');

if (isset($_POST['submit'])) {
    $docid = $_SESSION['id'];
    $doc_username = $_SESSION['doctor_uname'];
    $patname = $_POST['patname'];
    $patcontact = $_POST['patcontact'];
    $patemail = $_POST['patemail'];
    $gender = $_POST['gender'];
    $pataddress = $_POST['pataddress'];
    $patage = $_POST['patage'];
    $medhis = $_POST['medhis'];
    $sql = "insert into `tblpatient`(doc_username,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$doc_username','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')";
    $result = mysqli_query($conn, $sql);
    if ($sql) {
        echo '<script>alert("Patient Details Added Successfully.")</script>';
        echo "<script>window.location.href ='add-patient.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
        echo "<script>window.location.href ='add-patient.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Add Patient</title>

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
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#patemail").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>
</head>

<body>
    <div id="app">
        <?php include('../doctor/include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('../doctor/include/header.php'); ?>

            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Add Patient</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>
										<?php
										$fname = $_SESSION['fullname'];
										echo $fname;
										$sql = "SELECT `doc_username` FROM `doctor_reg` WHERE `fullname` = '$fname'";
										$result = mysqli_query($conn, $sql);
										while($row = mysqli_fetch_array($result)) {
											$_SESSION['doctor_uname'] = $row['doc_username'];
										}
										?>
									</span>
                                </li>
                                <li class="active">
                                    <span>Add Patient</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Add Patient</h5>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" name="" method="post">

                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Patient Name
                                                        </label>
                                                        <input type="text" name="patname" class="form-control"
                                                            placeholder="Enter Patient Name" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Contact no
                                                        </label>
                                                        <input type="text" name="patcontact" class="form-control"
                                                            placeholder="Enter Patient Contact no" required="true"
                                                            maxlength="10" pattern="[0-9]+">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Email
                                                        </label>
                                                        <input type="email" id="patemail" name="patemail"
                                                            class="form-control" placeholder="Enter Patient Email id"
                                                            required="true" onBlur="userAvailability()">
                                                        <span id="user-availability-status1"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="block">
                                                            Gender
                                                        </label>
                                                        <div class="clip-radio radio-primary">
                                                            <input type="radio" id="rg-male" name="gender" value="male">
                                                            <label for="rg-male">
                                                                Male
                                                            </label>
                                                            <input type="radio" id="rg-female" name="gender"
                                                                value="female">
                                                            <label for="rg-female">
                                                                Female
                                                            </label>
                                                            <input type="radio" id="rg-other" name="gender" value="other">
                                                            <label for="rg-other">
                                                                Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">
                                                            Patient Address
                                                        </label>
                                                        <textarea name="pataddress" class="form-control"
                                                            placeholder="Enter Patient Address"
                                                            required="true"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Patient Age
                                                        </label>
                                                        <input type="text" name="patage" class="form-control"
                                                            placeholder="Enter Patient Age" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Medical History
                                                        </label>
                                                        <textarea type="text" name="medhis" class="form-control"
                                                            placeholder="Enter Patient Medical History(if any)"
                                                            ></textarea>
                                                    </div>

                                                    <button type="submit" name="submit" id="submit"
                                                        class="btn btn-o btn-primary">
                                                        Add
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
        </div>
        <!-- start: FOOTER -->
        <?php include('../doctor/include/footer.php'); ?>
        <!-- end: FOOTER -->
        <!-- start: SETTINGS -->
        <?php include('../doctor/include/setting.php'); ?>
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