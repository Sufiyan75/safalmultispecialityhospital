<?php
session_start();
error_reporting(0);
include("../include/connection.php");

if(isset($_POST['submit']))
{
    $uname=$_POST['username'];
    $upassword=$_POST['password'];

    $sql = "SELECT `username`, `password` FROM `admin` WHERE `username` = '$uname' AND `password` = '$upassword'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $check_username = $row['username'];
        $check_password = $row['password'];
    }
    if($uname == $check_username && $upassword == $check_password){
        $_SESSION['uname'] = $uname;
        $_SESSION['lgn']=$_POST['username'];
        echo "<script>alert('Successfully logged in')</script>";
        echo "<script>window.location.href = '../../admin/dashboard.php'</script>";
    }
    else{
        echo "<script>alert('Bad Credentials!')</script>";
        echo "<script>window.location.href = 'admin_login_form.html'</script>";
    }
}
?>