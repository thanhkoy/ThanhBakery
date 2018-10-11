<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'edit':
        include('include/function/product/editprd.php');
        break;
    case 'add':
        include('include/function/product/addprd.php');
        break;
    default:
        include('include/function/product/listprd.php');
        break;
}
?>