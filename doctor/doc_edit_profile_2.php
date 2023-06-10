<?php
    session_start();
    error_reporting(0);
    include("../authentication/include/connection.php");

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $specialization = $_POST['specialization'];
        $qualify = $_FILES["qualify"]["name"];
        $existingFileName = $_SESSION['existingFileName'];
        $fees = $_POST['fees'];
        $phone = $_POST['phonenumber'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $did = $_SESSION['d_id'];
        $profilepic = $_FILES["profilepic"]["name"];
        $existingPicutre = $_SESSION['existingPicutre'];

        
        if ($_FILES['qualify']['error'] == UPLOAD_ERR_OK){
            $folder = "../authentication/registration/qualification/" . $qualify;
            $tempname = $_FILES["qualify"]["tmp_name"];
        
            move_uploaded_file($tempname, $folder);

            $sql = "UPDATE `doctor_reg` SET `qualification` = '$qualify' WHERE `doctor_id` = '$did'";
            $result = mysqli_query($conn, $sql);
            // echo 'File name: ' . $qualify;
        }
        else{
            $sql = "UPDATE `doctor_reg` SET  `qualification` = '$existingFileName' WHERE `doctor_id` = '$did'";
            $result_q = mysqli_query($conn, $sql);
            // echo 'File name: ' . $existingFileName;
        }

        if($_FILES["profilepic"]["error"] == UPLOAD_ERR_OK){
            $folder = "../authentication/registration/picture/" . $profilepic;
            $tempname = $_FILES["profilepic"]["tmp_name"];
        
            move_uploaded_file($tempname, $folder);

            $sql = "UPDATE `doctor_reg` SET `profilepic` = '$profilepic' WHERE `doctor_id` = '$did'";
            $result = mysqli_query($conn, $sql);
            // echo 'File name: ' . $profilepic;
        }
        else{
            $sql = "UPDATE `doctor_reg` SET  `profilepic` = '$existingPicutre' WHERE `doctor_id` = '$did'";
            $result_q = mysqli_query($conn, $sql);
            // echo 'File name: ' . $existingPicutre;
        }

        $sql = "UPDATE `doctor_reg` SET  `fullname` = '$fullname', `doc_username` = '$username', `email` = '$email', `specialization` = '$specialization', `fees` = '$fees', `phonenumber` = '$phone', `address` = '$add', `city` = '$city'  WHERE `doctor_id` = '$did'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "<script>alert('Please Try Again!')</script>";
            echo "<script>window.location.href = 'doc_edit_profile.php'</script>";
            // echo mysqli_error($conn);
        }
        else{
            echo "<script>alert('Profile Updated Successfully')</script>";
            echo "<script>window.location.href = 'doc_edit_profile.php'</script>";
        }
        
    }
?>