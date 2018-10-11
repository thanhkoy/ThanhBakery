<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
//    case 'edit':
//        include('include/function/category/editcat.php');
//        break;
    default:
        include('include/function/log/listlog.php');
        break;
}
?>