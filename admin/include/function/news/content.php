<?php

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = '';
}

switch ($a) {
    case 'add':
        include('include/function/news/addnews.php');
        break;
    case 'detail':
        include('include/function/news/detail.php');
        break;
    default:
        include('include/function/news/listnews.php');
        break;
}
?>