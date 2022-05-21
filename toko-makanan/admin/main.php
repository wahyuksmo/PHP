<?php 

$produk = $conn->query("SELECT * FROM produk");
$detailproduk = mysqli_num_rows($produk);


$pembelian =  $conn->query("SELECT * FROM pembelian");
$detailpembelian = mysqli_num_rows($pembelian);

$pelanggan =  $conn->query("SELECT * FROM pelanggan");
$detailpelanggan = mysqli_num_rows($pelanggan);


?>

<div class="page-heading">
    <h3>Selamat Datang <?= $_SESSION["admin"]["nama_lengkap"] ?></h3>
    <p class="text-muted">Ini adalah angka statistik dari toko anda</p>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-basket2-fill" style="margin-left:-10px;margin-top:-10px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Produk Makanan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $detailproduk ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="bi bi-cart-check-fill"
                                            style="margin-left:-10px;margin-top:-10px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pembelian Produk</h6>
                                    <h6 class="font-extrabold mb-0"><?= $detailpembelian; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="bi bi-people-fill" style="margin-left:-10px;margin-top:-10px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pelanggan</h6>
                                    <h6 class="font-extrabold mb-0"><?= $detailpelanggan; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>