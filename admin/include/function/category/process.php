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
            $name = $_POST['txtname'];
            $status = $_POST['status'];

            $sql = "update category set cat_name = '{$name}', cat_status = {$status} WHERE cat_id = {$id}";
            $sql1 = "update product set prd_status = {$status} WHERE cat_id = {$id}";
            $sql2 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Change property of category {$name}')";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            mysqli_query($conn, $sql2);
            header('Location:../../../index.php?f=cat');
            break;
        case 'add':
            $name = $_POST['txtname'];

            $sql = "insert into category(cat_name) VALUE ('{$name}')";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Add a new category {$name}')";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=cat');
            break;
        default:
            break;
    }
} elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
    header("Location:../../verify.php");
} else {
    header("Location:../../../index.php");
}