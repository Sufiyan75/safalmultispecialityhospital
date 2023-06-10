<?php
include_once("../include/connection.php");

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid Email Format!')</script>";
        echo "<script>window.location.href = 'patient_reg_form.html'</script>";
    }
    elseif(strlen($phonenumber) != 10){
        echo "<script>alert('Invalid Mobile Number Format!')</script>";
        echo "<script>window.location.href = 'patient_reg_form.html'</script>";
    }
    else{
        $sql = "INSERT INTO `patient_reg` (`fullname`, `username`, `phonenumber`, `dob`, `city`, `gender`, `email`, `password`) VALUES ('$fullname', '$username', '$phonenumber', '$dob', '$city', '$gender', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "<script>alert('Please Try Again!')</script>";
            echo "<script>window.location.href = 'patient_reg_form.html'</script>";
        }
        else{
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.location.href = '../login/patient_login.html'</script>";
        }
    }
}

?>