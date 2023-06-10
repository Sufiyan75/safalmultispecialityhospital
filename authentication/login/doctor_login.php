<?php

session_start();
error_reporting(0);
include("../include/connection.php");

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql2 = "SELECT `doc_username`,`password` FROM `doctor_reg` WHERE `doc_username`='$uname' AND `password`='$password'";
    $result2 = mysqli_query($conn, $sql2);
    
    while($row = mysqli_fetch_assoc($result2)){
        $check_username = $row['doc_username'];
        $check_password = $row['password'];
    }
    if($uname == $check_username && $password == $check_password){
        $_SESSION['username'] = $uname;
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $host=$_SERVER['HTTP_HOST'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $status="active";
        echo "<script>alert('Successfully logged in')</script>";
        echo "<script>window.location.href = '../../doctor/doctor_dash.php'</script>";
        $sql3 = "INSERT INTO `doctor_log` (`doc_username`, `doctor_ip` ,`status`) VALUES ('$uname', '$uip', '$status')";
        $result3 = mysqli_query($conn, $sql3);
    }
    else{
        echo "<script>alert('Bad Credentials!')</script>";
        echo "<script>window.location.href = 'doctor_login.html'</script>";
    }
}

?>