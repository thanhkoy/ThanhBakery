<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thanh's Bakery</title>
    <link rel="shortcut icon" href="views/assets/images/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="views/assets/lib/jquery/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="views/assets/lib/bootstrap/css/bootstrap.css">
    <script src="views/assets/lib/bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <link rel="stylesheet" href="views/assets/lib/RateYo/jquery.rateyo.css">
    <script src="views/assets/lib/RateYo/jquery.rateyo.js"></script>

    <link rel="stylesheet" type="text/css" href="views/assets/css/index.css">
    <script src="views/assets/js/index.js"></script>
</head>
<body>

<div class="banner">
    <img src="views/assets/images/banner.jpg">
</div>

<nav class="navbar navbar-expand-sm bg-danger navbar-dark sticky-top">
    <a class="navbar-brand" href="?f=index"><i class="fas fa-home"></i>Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?f=menu"><i class="fas fa-birthday-cake"></i>Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?f=contact"><i class="fas fa-map-marked-alt"></i>Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#<?php if (isset($_SESSION['username'])) {
                    echo 'feedback-modal';
                } else {
                    echo 'login-modal';
                } ?>"><i class="fas fa-comment-alt"></i>Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#cart-modal" onclick="listItem()"><i
                            class="fas fa-shopping-cart"></i>Cart</a>
            </li>
            <li class="nav-item" <?php if (isset($_SESSION["username"])) {
                echo "style='display: none'";
            } ?>>
                <a class="nav-link" href="" data-toggle="modal" data-target="#login-modal"><i
                            class="fas fa-sign-in-alt"></i>Sign in</a>
            </li>
            <li class="nav-item" <?php if (isset($_SESSION["username"])) {
                echo "style='display: none'";
            } ?>>
                <a class="nav-link" href="" data-toggle="modal" data-target="#reg-modal"><i
                            class="fas fa-user-plus"></i>Register</a>
            </li>
            <li class="nav-item" <?php if (!isset($_SESSION["username"])) {
                echo "style='display: none'";
            } ?>>
                <a class="nav-link" href=""><i class="fas fa-user"></i>Hello <?php echo $_SESSION["username"]; ?></a>
            </li>
            <li class="nav-item" <?php if (!isset($_SESSION["username"])) {
                echo "style='display: none'";
            } ?>>
                <a class="nav-link" href="?f=account/logout"><i class="fas fa-sign-out-alt"></i>Sign out</a>
            </li>
        </ul>
    </div>
</nav>
<?php
include('views/modal/login.php');
include('views/modal/cart.php');
include('views/modal/checkout.php');
include('views/modal/register.php');
include('views/modal/imageShow.php');
include('views/modal/feedback.php');
include('views/modal/addCart.php');
if (isset($_GET['err'])) {
    echo "<script>alert('Sign in error!')</script>";
}
?>