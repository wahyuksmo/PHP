<?php include('include/header.php') ?>
<?php 



$id_pembelian = $_GET["id"];

$result =  $conn->query("SELECT * FROM pembayaran 
LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE  pembelian.id_pembelian = '$id_pembelian' ");

$row = $result->fetch_assoc();

//jika belum ada data pembayaran
if (empty($row)) {
    echo "<script>alert('Tidak ada data pembelian');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

//jika data pelanggan tidak sesuai dengan yang login

if ($_SESSION["pelanggan"]["id_pelanggan"] != $row["id_pelanggan"]) {
    echo "<script>alert('Anda Tidak Berhak');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}





?>

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Hasil Bukti Pembayaran Anda</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<section class="kontent py-5">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Nama</th>
                        <td><?= $row["nama"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Bank</th>
                        <td><?= $row["bank"]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Jumlah</th>
                        <td>Rp. <?= number_format($row["jumlah"]) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td><?= $row["tanggal"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <img src="./bukti_pembayaran/<?= $row["bukti"]; ?>" alt="" >
        </div>
    </div>
    <div class="alert alert-warning mt-4" role="alert" style="font-size: 15px;">
 <strong>Terima kasih sudah belanja di toko kami  <i class="bi bi-heart-fill"></i></strong>
</div>
    <a href="index.php" class="btn btn-outline-primary rounded-pill"><i class="bi bi-chevron-double-left">Silahkan Belanja Lagi</i></a>
</div>

</section>




<?php include('include/footer.php') ?>