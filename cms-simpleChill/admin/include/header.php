<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
  }

include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />

    <link rel="stylesheet" href="./assets/vendors/iconly/bold.css" />

    <link rel="stylesheet" href="./assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/app.css" />
    <link rel="shortcut icon" href="./assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="./assets/vendors/simple-datatables/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <iv id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.php" class="sidebar-link">
                                <i class="bi bi-house-door-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.php?halaman=posts" class="sidebar-link">
                                <i class="bi bi-box2-heart-fill"></i>
                                <span>Postingan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.php?halaman=kategori" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Kategori</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.php?halaman=komen" class="sidebar-link">
                                <i class="bi bi-chat-left-quote-fill"></i>
                                <span>Komen</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.php?halaman=logout" class="sidebar-link" onclick="return confirm('Yakin?')">
                                <i class="bi bi-caret-left-square-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>