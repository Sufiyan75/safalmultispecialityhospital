<?php
session_start();
error_reporting(0);
include('../doctor/include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Search Patients</title>

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
                                <h1 class="mainTitle">Doctor | Search Patient</h1>
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
                                    <span>Search Patient</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="post" name="search">
                                    <div class="form-group">
                                        <label for="doctorname">
                                            Search by Name/Mobile No.
                                        </label>
                                        <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
                                    </div>

                                    <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                                        Search
                                    </button>
                                </form>
                                <?php
                                if (isset($_POST['search'])) {

                                    $sdata = $_POST['searchdata'];
                                    ?>
                                    <hr>
                                    <h4 align="center">Result against "
                                        <?php echo $sdata; ?>" keyword
                                    </h4>
                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center">Sr. No.</th>
                                                <th>Patient Name</th>
                                                <th>Patient Contact Number</th>
                                                <th>Patient Gender </th>
                                                <th>Creation Date </th>
                                                <th>Updation Date </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $du = $_SESSION['doctor_uname'];
                                            $sql = mysqli_query($conn, "SELECT * FROM `tblpatient` WHERE `doc_username` = '$du' AND `PatientName` like '%$sdata%'|| PatientContno like '%$sdata%'");
                                            $num = mysqli_num_rows($sql);
                                            if ($num > 0) {
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    ?>
                                                    <tr>
                                                        <td class="center">
                                                            <?php echo $cnt; ?>.
                                                        </td>
                                                        <td class="hidden-xs">
                                                            <?php echo $row['PatientName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['PatientContno']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['PatientGender']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['CreationDate']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['UpdationDate']; ?>
                                                        </td>
                                                        <td>

                                                            <a href="edit-patient.php?editid=<?php echo $row['Patient_id']; ?>"><i
                                                                    class="fa fa-edit"></i></a> || <a
                                                                href="view-patient.php?viewid=<?php echo $row['Patient_id']; ?>"><i
                                                                    class="fa fa-eye"></i></a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $cnt = $cnt + 1;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="8"> No record found against this search</td>

                                                </tr>

                                            <?php }
                                } ?>
                                    </tbody>
                                </table>
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