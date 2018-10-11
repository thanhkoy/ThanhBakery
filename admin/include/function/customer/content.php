<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'detail':
        include('include/function/customer/detail.php');
        break;
    default:
        include('include/function/customer/listcust.php');
        break;
}
?>