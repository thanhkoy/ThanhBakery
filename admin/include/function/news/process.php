<?php
session_start();

if (isset($_SESSION['admin']) && isset($_SESSION['verify'])) {

    include('../../../connect.php');

    $row = mysqli_fetch_array(mysqli_query($conn, "select * from employee where emp_username = '{$_SESSION['admin']}'"));

    if (isset($_GET['a'])) {
        $a = $_GET['a'];
    } else {
        $a = '';
    }

    switch ($a) {
        case 'edit':
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['editor1'];
            $file = '';

            $filename = $_FILES['file']['name'];

            if ($filename == '') {
                $file = $_POST['file'];
            } else {
                $file = $filename;

                unlink('../../../../views/assets/images/news/' . $_POST['file']);
                move_uploaded_file($_FILES['file']['tmp_name'], "../../../../views/assets/images/news/" . $file);
            }

            $sql = "update news set news_title = '{$title}', news_image = '{$file}', news_content = '{$content}' WHERE news_id = {$id}";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Edit news')";
//        echo $sql;
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=news');
            break;
        case 'add':
            $title = $_POST['title'];
            $content = $_POST['editor1'];
            $date = 'now()';
            $emp = $row['emp_id'];

            $filename = $_FILES['file']['name'];

            move_uploaded_file($_FILES['file']['tmp_name'], "../../../../views/assets/images/news/" . $filename);

            $sql = "insert into news(news_title, news_image, news_content, news_datetime, emp_id) values ('{$title}', '{$filename}', '{$content}', {$date}, {$emp})";
            $sql1 = "insert into log(emp_username, log_act) VALUE ('{$_SESSION['admin']}', 'Add a news')";
//        echo $sql;
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql1);
            header('Location:../../../index.php?f=news');
            break;

        default:
            break;
    }
} elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
    header("Location:../../verify.php");
} else {
    header("Location:../../../index.php");
}