<?php
session_start();

include('../../connect.php');

$username = $_SESSION['admin'];
$verify = $_POST['txtverify'];

$sql = "select * from employee WHERE emp_username = '{$username}' and emp_verify = '{$verify}'";
$rs = mysqli_query($conn, $sql);
$nr = mysqli_num_rows($rs);
$row = mysqli_fetch_array($rs);
//    echo $nr;

if ($nr > 0) {
    $_SESSION["verify"] = $verify;
    $_SESSION['access'] = $row['emp_access'];
    header("Location:../../index.php");
} else {
    header("Location:../../../index.php");
}
?>