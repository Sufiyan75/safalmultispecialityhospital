<?php
session_start();
error_reporting(0);
include('../authentication/include/connection.php');
include('../authentication/include/checklogin.php');
check_login();

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $message = $_POST['message'];
    $is_read = "No";
    $feedback_status = "active";

    $sql = "INSERT INTO `tbl_feedback`(`username`, `email`, `mobileno`, `message`, `is_read`, `feedback_status`) VALUES ('$uname', '$email', '$phonenumber', '$message', '$is_read', '$feedback_status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
		echo "<script>alert('Feedback Sent Successfully');</script>";
		echo "<script>window.location.href = 'manage_feedback.php'</script>";
	} else {
		echo "<script>alert('Something Went Wrong!')</script>";
		echo "<script>window.location.href = 'give_feedback.php'</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient | Feedback Form</title>

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
                                <h1 class="mainTitle">Patient | Feedback Form</h1>
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
                                        <span>Feedback Form</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row margin-top-8">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h7 class="panel-title"><b>Feedback Form</b></h7>
                                                </div>
                                                <div class="panel-body">
                                                    <p style="color:red;">
                                                        <?php echo htmlentities($_SESSION['msg1']); ?>
                                                        <?php echo htmlentities($_SESSION['msg1'] = ""); ?>
                                                    </p>
                                                    <form role="form" name="feedback" method="post">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username"
                                                                name="username" value="<?php echo $row['username']; ?>"
                                                                readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">
                                                                Email
                                                            </label>
                                                            <input type="text" class="form-control" id="email" name="email"
                                                                value="<?php echo $row['email']; ?>" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="phonenumber">
                                                                Mobile Number
                                                            </label>
                                                            <input type="text" class="form-control" id="phonenumber"
                                                                name="phonenumber"
                                                                value="<?php echo $row['phonenumber']; ?>" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="message">Message</label>
                                                            <textarea name="message" class="form-control" id="message"
                                                                rows="5" placeholder="Message"></textarea>
                                                        </div>
                                                    <?php } ?>
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