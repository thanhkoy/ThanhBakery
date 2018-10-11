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
            $name = $_POST['name'];
            $access = $_POST['access'];

            $sql = "update employee set emp_access = {$access} WHERE emp_id = {$id}";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Change property of employee account {$name}')";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=emp');
            break;
        case 'add':
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];
            $access = $_POST['access'];

            $sql1 = "select * from employee where emp_username = '{$name}'";
            $rs1 = mysqli_query($conn, $sql1);
            $nr1 = mysqli_num_rows($rs1);

            if ($pass != $repass) {
                header('Location:../../../index.php?f=emp&a=add&err=errpw');
            } elseif ($nr1 > 0) {
                header('Location:../../../index.php?f=emp&a=add&err=taken');
            } else {
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                srand((double)microtime() * 1000000);
                $i = 0;
                $verify = '';

                while ($i <= 5) {
                    $num = rand() % 33;
                    $tmp = substr($chars, $num, 1);
                    $verify = $verify . $tmp;
                    $i++;
                }

                $sql = "insert into employee(emp_username, emp_pw, emp_access, emp_verify) VALUE ('{$name}', '{$pass}', {$access}, '{$verify}')";
                $sql2 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Add a new employee account {$name}')";
                mysqli_query($conn, $sql);
                mysqli_query($conn, $sql2);
                header('Location:../../../index.php?f=emp');
            }
            break;
        default:
            break;
    }
} elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
    header("Location:../../verify.php");
} else {
    header("Location:../../../index.php");
}