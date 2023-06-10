<?php
session_start();
error_reporting(0);
include('../authentication/include/connection.php');
include('../authentication/include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient | View Medical History</title>

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
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Patient | Medical History</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>
										<?php
										$uname = $_SESSION['user_name'];
										$sql = "SELECT `fullname` FROM `patient_reg` WHERE `username`= '$uname'";
										$result = mysqli_query($conn, $sql);
										while ($row = mysqli_fetch_assoc($result)) {
                                            $_SESSION['fn'] = $row['fullname'];
											echo $row['fullname'];
										}
										?>
									</span>
                                </li>
                                <li class="active">
                                    <span>Medical History</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15"><span class="text-bold">Medical History</span></h5>
                                    <?php
                                        $user = $_SESSION['user_name'];
                                        $ret = mysqli_query($conn, "SELECT * FROM `medicalhistory` WHERE `username` = '$user'");
                                        $cnt = 1;
                                    ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Blood Pressure</th>
                                            <th>Weight</th>
                                            <th>Blood Sugar</th>
                                            <th>Body Temprature</th>
                                            <th>Medical Prescription</th>
                                            <th>Visit Date</th>
                                        </tr>
                                        <?php
                                        while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $pa_user = $row['username'];
                                                        $sq = "SELECT `fullname` FROM `patient_reg` WHERE `username` = '$pa_user'";
                                                        $que = mysqli_query($conn, $sq);
                                                        while($dt = mysqli_fetch_array($que)){
                                                            echo $dt['fullname'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $doc_user = $row['doc_username']; 
                                                        $sq = "SELECT `fullname` FROM `doctor_reg` WHERE `doc_username` = '$doc_user'";
                                                        $que = mysqli_query($conn, $sq);
                                                        while($dt = mysqli_fetch_array($que)){
                                                            echo $dt['fullname'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['BloodPressure']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Weight']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['BloodSugar']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['Temperature']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['MedicalPres']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['CreationDate']; ?>
                                                </td>
                                            </tr>
                                            <?php $cnt = $cnt + 1;
                                        } ?>
                                    </table>
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