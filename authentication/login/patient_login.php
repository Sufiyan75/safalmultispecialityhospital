<?php

session_start();
error_reporting(0);
include("../include/connection.php");

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql2 = "SELECT `username`,`password` FROM `patient_reg` WHERE `username`='$uname' AND `password`='$password'";
    $result2 = mysqli_query($conn, $sql2);
    
    while($row = mysqli_fetch_assoc($result2)){
        $check_username = $row['username'];
        $check_password = $row['password'];
    }
    if($uname == $check_username && $password == $check_password){
        $_SESSION['user_name'] = $uname;
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status="active";
        echo "<script>alert('Successfully logged in')</script>";
        echo "<script>window.location.href = '../../patient/patient_dash.php'</script>";
        $sql3 = "INSERT INTO `patient_log` (`username`, `user_ip` ,`status`) VALUES ('$uname', '$uip', '$status')";
        $result3 = mysqli_query($conn, $sql3);
    }
    else{
        echo "<script>alert('Bad Credentials!')</script>";
        echo "<script>window.location.href = 'patient_login.html'</script>";
    }
}

?>