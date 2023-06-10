<?php
session_start();
error_reporting(0);

include_once("../include/connection.php");

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $_SESSION['doc_username'] = $username;
    $specialization = $_POST['specialization'];
    $qualify = $_FILES["qualify"]["name"];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $folder = "qualification/" . $qualify;
    $tempname = $_FILES["qualify"]["tmp_name"];

    move_uploaded_file($tempname, $folder);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid Email Format!')</script>";
        echo "<script>window.location.href = 'doctor_reg_form.html'</script>";
    }
    elseif(strlen($phonenumber) != 10){
        echo "<script>alert('Invalid Mobile Number Format!')</script>";
        echo "<script>window.location.href = 'doctor_reg_form.html'</script>";
    }
    else{
        $sql = "INSERT INTO `doctor_reg` (`fullname`, `doc_username`, `specialization`, `qualification`, `phonenumber`, `address`, `city`, `gender`, `email`, `password`) VALUES 
        ('$fullname', '$username', '$specialization', '$qualify', '$phonenumber', '$address', '$city', '$gender', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
    
        if(!$result){
            echo "<script>alert('Please Try Again!')</script>";
            echo "<script>window.location.href = 'doctor_reg_form.html'</script>";
        }
        else{
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.location.href = '../login/doctor_login.html'</script>";
        }
    }
}

?>