<?php

include('functions.php')



?>
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
    <link rel="stylesheet" href="./assets/vendors/bootstrap-icons/bootstrap-icons.css" />
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
                            <a href="index.html">Toko Makanan</a>
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
                            <a href="index.php?halaman=pembelian" class="sidebar-link">
                                <i class="bi bi-bag-check-fill"></i>
                                <span>Pembelian</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.php?halaman=produk" class="sidebar-link">
                                <i class="bi bi-basket-fill"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php?halaman=laporan_pembelian" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                                <span>Laporan Pembelian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php?halaman=pelanggan" class="sidebar-link">
                                <i class="bi bi-people-fill"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php?halaman=ongkir" class="sidebar-link">
                                <i class="bi bi-bicycle"></i>
                                <span>Ongkir</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php?halaman=kategori" class="sidebar-link">
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Kategori</span>
                            </a>
                        </li>



                        <li class="sidebar-item">
                            <a href="index.php?halaman=logout" class="sidebar-link">
                                <i class="bi bi-arrow-left-square-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>