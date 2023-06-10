<?php
session_start();
error_reporting(0);
include('../doctor/include/connection.php');
if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $patname = $_POST['patname'];
    $patcontact = $_POST['patcontact'];
    $patemail = $_POST['patemail'];
    $gender = $_POST['gender'];
    $pataddress = $_POST['pataddress'];
    $patage = $_POST['patage'];
    $medhis = $_POST['medhis'];
    $sql = mysqli_query($conn, "UPDATE `tblpatient` SET `PatientName`='$patname', `PatientContno`='$patcontact', `PatientEmail`='$patemail', `PatientGender`='$gender', `PatientAdd`='$pataddress', `PatientAge`='$patage', `PatientMedhis`='$medhis' WHERE `Patient_id`='$eid'");
    if ($sql) {
        echo '<script>alert("Patient Details Updated Successfully.")</script>';
        echo "<script>window.location.href ='manage-patient.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
        echo "<script>window.location.href ='manage-patient.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Edit Patient</title>

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
        <?php include('../doctor/include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('../doctor/include/header.php'); ?>

            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Edit Patient</h1>
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
                                    <span>Edit Patient Details</span>
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
                                                <h5 class="panel-title">Edit Patient Details</h5>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" name="" method="post">
                                                    <?php
                                                    $eid = $_GET['editid'];
                                                    $ret = mysqli_query($conn, "SELECT * FROM `tblpatient` WHERE `Patient_id`='$eid'");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="doctorname">
                                                                Patient Name
                                                            </label>
                                                            <input type="text" name="patname" class="form-control"
                                                                value="<?php echo $row['PatientName']; ?>" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                Patient Contact no
                                                            </label>
                                                            <input type="text" name="patcontact" class="form-control"
                                                                value="<?php echo $row['PatientContno']; ?>" required="true"
                                                                maxlength="10" pattern="[0-9]+">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                Patient Email
                                                            </label>
                                                            <input type="email" id="patemail" name="patemail"
                                                                class="form-control"
                                                                value="<?php echo $row['PatientEmail']; ?>" readonly='true'>
                                                            <span id="email-availability-status"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Gender: </label>
                                                            <?php if ($row['PatientGender'] == "female") { ?>
                                                                <input type="radio" name="gender" id="gender" value="male">&nbsp;Male&emsp;
                                                                <input type="radio" name="gender" id="gender" value="female" checked="true">&nbsp;Female&emsp;
                                                                <input type="radio" name="gender" id="gender" value="other">&nbsp;Other&emsp;
                                                            <?php } elseif ($row['PatientGender'] == "male") { ?>
                                                                <label>
                                                                    <input type="radio" name="gender" id="gender" value="male" checked="true" &emsp;>&nbsp;Male&emsp;
                                                                    <input type="radio" name="gender" id="gender" value="female">&nbsp;Female&emsp;
                                                                    <input type="radio" name="gender" id="gender" value="other">&nbsp;Other&emsp;
                                                                </label>
                                                            <?php } else{ ?>
                                                                <label>
                                                                    <input type="radio" name="gender" id="gender" value="male">&nbsp;Male&emsp;
                                                                    <input type="radio" name="gender" id="gender" value="female">&nbsp;Female&emsp;
                                                                    <input type="radio" name="gender" id="gender" value="other" checked="true">&nbsp;Other&emsp;
                                                                </label>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">
                                                                Patient Address
                                                            </label>
                                                            <textarea name="pataddress" class="form-control"
                                                                required="true"><?php echo $row['PatientAdd']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                Patient Age
                                                            </label>
                                                            <input type="text" name="patage" class="form-control"
                                                                value="<?php echo $row['PatientAge']; ?>" required="true">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                Medical History
                                                            </label>
                                                            <textarea type="text" name="medhis" class="form-control"
                                                                placeholder="Enter Patient Medical History(if any)"
                                                                ><?php echo $row['PatientMedhis']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                Creation Date
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $row['CreationDate']; ?>" readonly='true'>
                                                        </div>
                                                    <?php } ?>
                                                    <button type="submit" name="submit" id="submit"
                                                        class="btn btn-o btn-primary">
                                                        Update
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