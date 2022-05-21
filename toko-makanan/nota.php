<?php include('include/header.php') ?>


<?php 
$result = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan
WHERE pembelian.id_pembelian = $_GET[id]");
$row = mysqli_fetch_assoc($result);



 //jika pelanggan yang beli tidak sama dengan pelanggan yang login
 $idpelangganyangbeli = $row["id_pelanggan"];
 $idpelangganyanglogin= $_SESSION["pelanggan"]["id_pelanggan"];

 if($idpelangganyangbeli !== $idpelangganyanglogin) {
   echo "<script>alert('Jangan Nakal');</script>";
   echo "<script>location='riwayat.php';</script>";
   exit();

 }

?>




<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Nota pembelanjaan anda</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="nota py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center border-dark">
                    <div class="card-body">
                        <h5 class="card-title">Pembayaran Anda</h5>
                        <div class="alert alert-success mt-4 mb-5" role="alert">
                            <strong> Transfer pembayaran anda ke bank tertera</strong>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <img src="./foto_produk/Logo OVO (PNG-480p) - FileVector69.png" alt=""
                                    class="img-fluid" style="width: 100px;">
                                <p><strong>085773006946</strong></p>
                            </div>
                            <div class="col-md">
                                <img src="./foto_produk/Bank BNI Logo (PNG-480p) - FileVector69.png" alt=""
                                    class="img-fluid" style="width: 200px;">
                                <p><strong>085773006946</strong></p>
                            </div>
                            <div class="col-md">
                                <img src="./foto_produk/Bank BRI (Bank Rakyat Indonesia) Logo (PNG-480p) - FileVector69.png"
                                    alt="" class="img-fluid" style="width: 200px;">
                                <p><strong>085773006946</strong></p>
                            </div>
                        </div>


                        <div class="card-footer bg-transparent mt-4">
                        </div>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Harga Satuan</th>
                                    <th>Tarif Ongkir</th>
                                    <th>Total Semua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ambil = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON 
            pembelian_produk.id_produk =  produk.id_produk WHERE pembelian_produk.id_pembelian = $_GET[id]") ?>

                                <?php while ($pecah  = $ambil->fetch_assoc()) { ?>
                                <tr>
                                <td><?= $pecah["nama"] ?></td>
                                <td><?= $pecah["jumlah"] ?></td>    
                                <td>Rp. <?= number_format($pecah["harga"]) ?></td>
                                    <?php } ?>
                                    <td>Rp. <?= number_format($row["tarif"] ) ?></td>
                                    <td><strong>Rp.<?= number_format($row["total_pembelian"]); ?></strong></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="alert alert-warning" role="alert">
                            <strong>Mohon kirim Bukti Transfer anda di Profile <a href="riwayat.php" class="text-primary">Riwayat anda</a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php include('include/footer.php') ?>