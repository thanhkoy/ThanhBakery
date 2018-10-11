<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'detail':
        include('include/function/bill/detail.php');
        break;
    default:
        include('include/function/bill/listbill.php');
        break;
}
?>