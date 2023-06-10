<?php

session_start();
error_reporting(0);

include("../include/connection.php");

if(isset($_POST['change'])){
    $new_password = md5($_POST['password']);
    $email = $_SESSION['email'];

    $sql = "UPDATE `patient_reg` SET `password`='$new_password' WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('No')</script>";
    }
    else{
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>window.location.href ='patient_login.html'</script>";
    }
}

?>