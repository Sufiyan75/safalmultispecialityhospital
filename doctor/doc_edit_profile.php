<?php
session_start();
error_reporting(0);
include("../doctor/include/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Edit Profile</title>

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

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">
                                    <?php
                                    $fname = $_SESSION['fullname'];
                                    echo "Doctor"
                                    ?>
                                    | Edit Profile
                                </h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>
                                        <?php
                                        $fname = $_SESSION['fullname'];
                                        echo $fname;
                                        ?>
                                    </span>
                                </li>
                                <li class="active">
                                    <span>Edit Profile</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="color: green; font-size:18px; ">
                                    <?php if ($_SESSION['msg1']) {
                                        echo htmlentities($_SESSION['msg1']);
                                    } ?>
                                </h5>
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h7 class="panel-title" style="font-family: poppins;"><b>Edit Profile</b></h7>
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                echo "<h4>$fname" . "'s Profile</h4> <br>";
                                                $sql = "Select * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                $result = mysqli_query($conn, $sql);
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    echo "<b>Registered Date</b>: " . $data['created_at'] . "&emsp;";
                                                    echo "<b>Last Updation Date</b>: " . $data['updationDate'];
                                                    $_SESSION['d_id'] = $data['doctor_id'];
                                                }
                                                ?>
                                                <div>
                                                    <hr>
                                                    <form action="doc_edit_profile_2.php" role="form" name="edit" id="edit" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="uploadPicture">Upload Your Profile Picture&nbsp;</label>
                                                            <label for="uploadPicture">
                                                                <span class="form-control" id="mySpan" value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    $existingPicutre = $data['profilepic'];
                                                                    echo $existingPicutre;
                                                                    $_SESSION['existingPicutre'] = $existingPicutre;
                                                                ?>">Current Profile Pic: <a download="<?php echo $data['profilepic'] ?>" href="../authentication/registration/picture/<?php echo $data['profilepic'] ?>"><?php echo  $data['profilepic'] ?></a></span>
                                                            </label>
                                                            <input type="file" class="form-control" name="profilepic" id="profilepic" accept="image/*">
                                                            <?php } ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="uname">User Name</label>
                                                            <input type="text" readonly onkeypress="return (event.charCode != 32)" id="uname" name="uname" class="form-control" 
                                                            value="<?php
                                                                $sql = "SELECT `doc_username` FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['doc_username'];
                                                                }
                                                            ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fname">Full Name</label>
                                                            <input type="text" id="fullname" name="fullname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" class="form-control" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['fullname'];
                                                                }
                                                            ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" id="email" onkeydown="ValidateEmail()" name="email" class="form-control" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['email'];
                                                                }
                                                            ?>">
                                                            <span id="text" style="font-size:12px;"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="specialization">Specialization</label>
                                                            <input type="text" class="form-control" id="specialization" name="specialization" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['specialization'];
                                                                }
                                                            ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="upload">Upload Your Qualification&nbsp;</label>
                                                            <label for="upload">
                                                                <span class="form-control" id="mySpan" value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    $existingFileName = $data['qualification'];
                                                                    echo $existingFileName;
                                                                    $_SESSION['existingFileName'] = $existingFileName;
                                                                ?>">Old File: <a download="<?php echo $data['qualification'] ?>" href="../authentication/registration/qualification/<?php echo $data['qualification'] ?>"><?php echo  $data['qualification'] ?></a></span>
                                                            </label>
                                                            <input type="file" class="form-control" name="qualify" id="qualify" accept="image/*, application/pdf">
                                                            <?php } ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="fees">Fees</label>
                                                            <input type="number" class="form-control" id="fees" name="fees" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['fees'];
                                                                }
                                                            ?>">
                                                        </div>

                                                        <div class="form-group">Phone Number</label>
                                                            <input type="number" maxlength="10" id="phonenumber" onkeydown="phone()" name="phonenumber" class="form-control" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['phonenumber'];
                                                                }
                                                            ?>">
                                                            <span id="phonetxt" style="font-size:12px;"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="add">Address</label>
                                                            <textarea name="add" class="form-control" id="add" rows="5" placeholder="Address"><?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['address'];
                                                                }
                                                            ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="fname">City</label>
                                                            <input type="text" name="city" id="city" class="form-control" 
                                                            value="<?php
                                                                $sql = "SELECT * FROM `doctor_reg` WHERE `fullname` = '$fname'";
                                                                $result = mysqli_query($conn, $sql);
                                                                while($data = mysqli_fetch_assoc($result)){
                                                                    echo $data['city'];
                                                                }
                                                            ?>">
                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white"></div>
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
    <script>
        
                function phone()
                {
                var form = document.getElementById("edit");
                var mobile = document.getElementById("phonenumber").value;
                var phone = document.getElementById("phonetxt");
                var mobileexp = /^\d{10}$/;

                if(mobile.match(mobileexp))
                {
                    form.classList.add("valid");
                    form.classList.remove("Invalid");
                    phone.innerHTML = "Your Phone Number is valid";
                    phone.style.color = "#00ff00";
                }
                else{
                    form.classList.remove("valid");
                    form.classList.add("Invalid");
                    phone.innerHTML = "Your Phone Number is not valid";
                    phone.style.color = "#ff0000";
                }
            }   
            
    </script>
    <script>
                function ValidateEmail()
                {
                var form = document.getElementById("edit");
                var email = document.getElementById("email").value;
                var text = document.getElementById("text");

                var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if(email.match(pattern))
                {
                    form.classList.add("valid");
                    form.classList.remove("Invalid");
                    text.innerHTML = "Your Email address is valid";
                    text.style.color = "#00ff00";
                    
                }
                else
                {
                    form.classList.remove("valid");
                    form.classList.add("Invalid");
                    text.innerHTML = "Your Email address is not valid";
                    text.style.color = "#ff0000";
                }
                }


            </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>