<?php

session_start();
error_reporting(0);

include('../include/connection.php');

$_SESSION['login'] == "";
date_default_timezone_set('Asia/Kolkata');
$logoutdate=date( 'd-m-Y h:i:s A', time () );
$uname = $_SESSION['user_name'];
$status = "inactive";

$sql = "UPDATE `patient_log` SET `log_out` = '$logoutdate', `status` = '$status' WHERE `username` = '$uname' ORDER BY `patient_log_id` DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
session_unset();
//session_destroy();
$_SESSION['errmsg'] = "You have successfully logout";
?>

<script language="javascript">
document.location="../../index.php";
</script>