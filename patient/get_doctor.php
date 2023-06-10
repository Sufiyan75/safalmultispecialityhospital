<?php
include('../authentication/include/connection.php');
session_start();


if (!empty($_POST["specilizationid"])) {

    $sql = mysqli_query($conn, "SELECT `doctor_id`,`fullname` FROM `doctor_reg` WHERE specialization='" . $_POST['specilizationid'] . "'"); ?>
    <option selected="selected">Select Doctor </option>
    <?php
    while ($row = mysqli_fetch_array($sql)) { 
        $_SESSION['doc_fullname'] = $row['fullname'];?>
        <option value="<?php echo htmlentities($row['doctor_id']); ?>"><?php echo htmlentities($row['fullname']); ?></option>
        <?php
    }
}

if (!empty($_POST["doctor"])) {

    $sql = mysqli_query($conn, "SELECT `doc_username`,`fees` FROM `doctor_reg` WHERE doctor_id='" . $_POST['doctor'] . "'");
    while ($row = mysqli_fetch_array($sql)) { 
        $_SESSION['doc_username'] = $row['doc_username'] ?>
        <option value="<?php echo htmlentities($row['fees']); ?>"><?php echo htmlentities($row['fees']); ?></option>
        <?php
    }
}

