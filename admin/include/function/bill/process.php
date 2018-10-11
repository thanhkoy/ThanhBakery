<?php
session_start();

if (isset($_SESSION['admin']) && isset($_SESSION['verify'])) {

    include('../../../connect.php');
    if (isset($_GET['a'])) {
        $a = $_GET['a'];
    } else {
        $a = '';
    }

    switch ($a) {
        case 'edit':
            $id = $_POST['id'];
            $status = $_POST['status'];

            $sql = "update bill set bill_status = {$status} WHERE bill_id = {$id}";
            $sql2 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Change bill status')";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql2);
            header("Location:../../../index.php?f=bill&a=detail&id={$id}");
            break;
        default:
            break;
    }
} elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
    header("Location:../../verify.php");
} else {
    header("Location:../../../index.php");
}