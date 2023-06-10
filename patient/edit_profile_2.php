<?php
    session_start();
    error_reporting(0);
    include_once("../authentication/include/connection.php");
    $_SESSION['msg_1'] = "";

    if (isset($_POST['submit'])) {
        
        $fullname = $_POST['fullname'];
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phonenumber'];
        $city = $_POST['city'];
        $pid = $_SESSION['p_id'];
        $profilepic = $_FILES["profilepic"]["name"];
        $existingPicutre = $_SESSION['existingPicutre'];


        if ($_FILES['profilepic']['error'] == UPLOAD_ERR_OK){
            $folder = "../authentication/registration/picture/" . $profilepic;
            $tempname = $_FILES["profilepic"]["tmp_name"];
        
            move_uploaded_file($tempname, $folder);

            $sql = "UPDATE `patient_reg` SET `profilepic` = '$profilepic' WHERE `patient_id` = '$pid'";
            $result = mysqli_query($conn, $sql);
            // echo 'File name: ' . $profilepic;
        }
        else{
            $sql = "UPDATE `patient_reg` SET  `profilepic` = '$existingPicutre' WHERE `patient_id` = '$pid'";
            $result_q = mysqli_query($conn, $sql);
            // echo 'File name: ' . $existingPicutre;
        }

        $sql = "UPDATE `patient_reg` SET  `fullname` = '$fullname', `username` = '$username', `email` = '$email', `phonenumber` = '$phone', `city` = '$city'  WHERE `patient_id` = '$pid'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "<script>alert('Please Try Again!')</script>";
            echo "<script>window.location.href = 'edit_profile.php'</script>";
            echo mysqli_error($conn);
        }
        else{
            $_SESSION['msg_1'] = "Your Profile updated Successfully";
            echo "<script>alert('Profile Updated Successfully')</script>";
            echo "<script>window.location.href = 'edit_profile.php'</script>";
        }
        
    }
?>