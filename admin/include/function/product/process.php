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
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $status = $_POST['status'];

            $file = '';

            $filename = $_FILES['file']['name'];

            if ($filename == '') {
                $file = $_POST['txtimage'];
            } else {
                $file = $filename;

                unlink('../../../../views/assets/images/product/' . $_POST['txtimage']);
                move_uploaded_file($_FILES['file']['tmp_name'], "../../../../views/assets/images/product/" . $file);
            }

            $sql = "update product set prd_name = '{$name}', prd_price = {$price}, prd_image = '{$file}', prd_description = '{$desc}', prd_status = {$status} WHERE prd_id = {$id}";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Change property of product {$name}')";
//        echo $sql;
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=prd');
            break;
        case 'add':
            $name = $_POST['txtname'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $cat = $_POST['cat'];

            $filename = $_FILES['file']['name'];

            move_uploaded_file($_FILES['file']['tmp_name'], "../../../../views/assets/images/product/" . $filename);

            $sql = "insert into product(prd_name, prd_price, prd_image, prd_description, cat_id) values ('{$name}', {$price}, '{$filename}', '{$desc}', {$cat})";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Add a new product {$name}')";
//        echo $sql;
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=prd');
            break;

        default:
            break;
    }
} elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
    header("Location:../../verify.php");
} else {
    header("Location:../../../index.php");
}