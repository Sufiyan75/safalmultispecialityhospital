<?php
session_start();
error_reporting(0);
include('../doctor/include/connection.php');
if (isset($_POST['submit'])) {
    $vid = $_GET['viewid'];
    $d_uname = $_SESSION['doctor_uname'];
    $p_uname = $_SESSION['patient_uname'];
    $bp = $_POST['bp'];
    $bs = $_POST['bs'];
    $weight = $_POST['weight'];
    $temp = $_POST['temp'];
    $pres = $_POST['pres'];


    $query = mysqli_query($conn, "INSERT `medicalhistory`(`username`, `doc_username`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`) VALUES ('$p_uname', '$d_uname', '$bp', '$bs', '$weight', '$temp', '$pres')");
    if ($query) {
        echo '<script>alert("Medical history has been added.")</script>';
        echo "<script>window.location.href ='doc_appointment_history.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
        echo "<script>window.location.href = 'doc_appointment_history.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | View Patients</title>

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
                                <h1 class="mainTitle">Doctor | View Patients</h1>
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
                                    <span>View Patients</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15"><span class="text-bold">View Patients</span></h5>
                                <?php
                                $vid = $_GET['viewid'];
                                $ret = mysqli_query($conn, "SELECT * FROM `appointment` WHERE `app_id`='$vid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                    $_SESSION['patient_uname'] = $row['username'];
                                    $pat_name = $_SESSION['patient_uname'];
                                }
                                $sql = mysqli_query($conn, "SELECT * FROM `patient_reg` WHERE `username`='$pat_name'");
                                while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <table border="1" class="table table-bordered">
                                        <tr align="center">
                                            <td colspan="4" style="font-size:20px;color:blue">
                                                Patient Details</td>
                                        </tr>

                                        <tr>
                                            <th scope>Patient Name</th>
                                            <td>
                                                <?php echo $row['fullname']; ?>
                                            </td>
                                            <th scope>Patient Email</th>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope>Patient Mobile Number</th>
                                            <td>
                                                <?php echo $row['phonenumber']; ?>
                                            </td>
                                            <th>Patient City</th>
                                            <td>
                                                <?php echo $row['city']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Patient Gender</th>
                                            <td>
                                                <?php echo $row['gender']; ?>
                                            </td>
                                            <th>Patient Date Of Birth</th>
                                            <td>
                                                <?php echo $row['dob']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Patient Reg Date</th>
                                            <td>
                                                <?php echo $row['reg_at']; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                    <?php
                                        $user = $_SESSION['patient_uname'];
                                        $ret = mysqli_query($conn, "SELECT * FROM `medicalhistory` WHERE `username` = '$user'");
                                    ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr align="center">
                                            <th colspan="8">Medical History</th>
                                        </tr>
                                        <tr>
                                            <th>Sr. No.</th>
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

                                    <p align="center">
                                        <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal"
                                            data-target="#myModal">Add Medical History</button>
                                    </p>
                                    <?php ?>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-hover data-tables">
                                                        <form method="post" name="submit">
                                                            <tr>
                                                                <th>Blood Pressure :</th>
                                                                <td>
                                                                    <input name="bp" placeholder="Blood Pressure"
                                                                        class="form-control wd-450" required="true">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Blood Sugar :</th>
                                                                <td>
                                                                    <input name="bs" placeholder="Blood Sugar"
                                                                        class="form-control wd-450" required="true">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Weight :</th>
                                                                <td>
                                                                    <input name="weight" placeholder="Weight"
                                                                        class="form-control wd-450" required="true">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Body Temprature :</th>
                                                                <td>
                                                                    <input name="temp" placeholder="Body Temperature"
                                                                        class="form-control wd-450" required="true">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th>Prescription :</th>
                                                                <td>
                                                                    <textarea name="pres" placeholder="Medical Prescription"
                                                                        rows="12" cols="14" class="form-control wd-450"
                                                                        required="true"></textarea>
                                                                </td>
                                                            </tr>

                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>

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