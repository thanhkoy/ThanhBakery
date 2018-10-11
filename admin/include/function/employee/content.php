<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'edit':
        include('include/function/employee/editemp.php');
        break;
    case 'add':
        include('include/function/employee/addemp.php');
        break;
    default:
        include('include/function/employee/listemp.php');
        break;
}
?>