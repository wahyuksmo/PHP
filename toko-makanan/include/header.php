<?php
session_start();
require 'functions.php';
error_reporting(0)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Toko Makanan</title>

    <!-- favicon -->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="./assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="./assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="./assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <i class="bi bi-basket-fill" style="font-size: 20px; color :white;"> Makan</i>
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </li>
                                <?php if ($_SESSION["pelanggan"]) : ?>
                                <li><a class="shopping-cart" href="keranjang.php"><i
                                            class="fas fa-shopping-cart"></i></a></li>
                                <li>
                                    <a class="login"><i class="fas fa-user"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="riwayat.php">Riwayat
                                                <?= $_SESSION["pelanggan"]["nama_pelanggan"] ?></a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                        <?php else : ?>
                                        <li>
                                            <a class="login"><i class="fas fa-user"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="login.php">Login</a></li>
                                                <li><a href="registrasi.php">Registrasi</a></li>

                                            </ul>
                                        </li>
                                        <?php endif ?>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <form action="./pencarian.php" method="GET" autocomplete="off">
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="close-btn"><i class="fas fa-window-close"></i></span>
                        <div class="search-bar">
                            <div class="search-bar-tablecell">

                                <h3>Search For:</h3>
                                <input type="text" placeholder="Keywords" name="keyword">
                                <button type="submit">Search <i class="fas fa-search"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end search area -->