<?php

session_start();
error_reporting(0);

include("../include/connection.php");
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $sql = "SELECT `email` FROM `patient_reg` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $check_email = $row['email'];
    }

    if($email == $check_email){
        $_SESSION['email']=$email;
        echo "<script>window.location.href = 'reset_password.html'</script>";
    }
    else{
        echo "<script>alert('Please enter registered email!')</script>";
        echo "<script>window.location.href = 'forgot_pass.html'</script>";
    }
}