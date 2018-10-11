<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'reply':
        include('include/function/feedback/reply.php');
        break;
    default:
        include('include/function/feedback/listfb.php');
        break;
}
?>