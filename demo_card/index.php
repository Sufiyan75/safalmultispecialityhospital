<?php
session_start();
error_reporting(0);
include('../authentication/include/connection.php');
include('../authentication/include/checklogin.php');
check_login();

// if (isset($_POST['submit'])) {
//     $uname = $_POST['username'];
//     $email = $_POST['email'];
//     $phonenumber = $_POST['phonenumber'];
//     $message = $_POST['message'];
//     $is_read = "No";
//     $feedback_status = "active";

//     $sql = "INSERT INTO `tbl_feedback`(`username`, `email`, `mobileno`, `message`, `is_read`, `feedback_status`) VALUES ('$uname', '$email', '$phonenumber', '$message', '$is_read', '$feedback_status')";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         echo "<script>alert('Feedback Sent Successfully');</script>";
//         echo "<script>window.location.href = 'manage_feedback.php'</script>";
//     } else {
//         echo "<script>alert('Something Went Wrong!')</script>";
//         echo "<script>window.location.href = 'give_feedback.php'</script>";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient | Payment Form</title>

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
    <link rel="stylesheet" href="../app_payment/css/style.css">
    <link rel="stylesheet" href="../materials/assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
    <div id="app">
        <?php include('../authentication/include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('../authentication/include/header.php'); ?>
            <div class="container">

                <div class="card-container">

                    <div class="front">
                        <div class="image">
                            <img src="../app_payment/image/chip.png" alt="">
                            <img src="../app_payment/image/visa.png" alt="">
                        </div>
                        <div class="card-number-box">################</div>
                        <div class="flexbox">
                            <div class="box">
                                <span>card holder</span>
                                <div class="card-holder-name">full name</div>
                            </div>
                            <div class="box">
                                <span>expires</span>
                                <div class="expiration">
                                    <span class="exp-month">mm</span>
                                    <span class="exp-year">yy</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="back">
                        <div class="stripe"></div>
                        <div class="box">
                            <span>cvv</span>
                            <div class="cvv-box"></div>
                            <img src="image/visa.png" alt="">
                        </div>
                    </div>

                </div>

                <form action="">
                    <div class="inputBox">
                        <span>card number</span>
                        <input type="text" maxlength="16" class="card-number-input">
                    </div>
                    <div class="inputBox">
                        <span>card holder</span>
                        <input type="text" class="card-holder-input">
                    </div>
                    <div class="flexbox">
                        <div class="inputBox">
                            <span>expiration mm</span>
                            <select name="" id="" class="month-input">
                                <option value="month" selected disabled>month</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>expiration yy</span>
                            <select name="" id="" class="year-input">
                                <option value="year" selected disabled>year</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>cvv</span>
                            <input type="text" maxlength="4" class="cvv-input">
                        </div>
                    </div>
                    <input type="submit" value="submit" class="submit-btn">
                </form>

            </div>

            <script>

                document.querySelector('.card-number-input').oninput = () => {
                    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
                }

                document.querySelector('.card-holder-input').oninput = () => {
                    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
                }

                document.querySelector('.month-input').oninput = () => {
                    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
                }

                document.querySelector('.year-input').oninput = () => {
                    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
                }

                document.querySelector('.cvv-input').onmouseenter = () => {
                    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
                    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
                }

                document.querySelector('.cvv-input').onmouseleave = () => {
                    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
                    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
                }

                document.querySelector('.cvv-input').oninput = () => {
                    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
                }

            </script>

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