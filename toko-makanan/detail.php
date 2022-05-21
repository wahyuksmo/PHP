<?php include('include/header.php') ?>
<?php 
$id = $_GET["id"];

$row = queryData("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = $id")[0];

if (isset($_POST["beli"])) {

    $jumlah = $_POST["jumlah"];

    $_SESSION["keranjang"][$id] = $jumlah;
    echo "<script>Swal.fire({
		icon: 'success',
		title: 'Berhasil Dibeli',
		showConfirmButton: false,
		focusConfirm: false,
		footer: '<a href=keranjang.php style=color:#0099CC;text-decoration:none;>Silahkan Ke Keranjang Anda</a>'
	  })</script>";
	
}
?>

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>We sale good snacks</p>
						<h1>Detail Produk <?= $row["nama_produk"] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="single-product mt-100 mb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="./foto_produk/<?= $row["foto_produk"] ?>" alt="" height="500">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?= $row["nama_produk"] ?></h3>
						<p class="single-product-pricing"><span>Stock = <?= $row["stock_produk"] ?></span>Rp. <?= number_format($row["harga_produk"]) ?></p>
						<p><?= $row["deskripsi_produk"] ?></p>
						<div class="single-product-form">
							<form action="" method="POST">
								<input type="number" placeholder="0" min="1" max="<?= $row["stock_produk"] ?>" name="jumlah" class="me-2"> 
							<button class="btn btn-outline-warning" name="beli"><i class="fas fa-shopping-cart" ></i> Add to Cart</button>
                            </form>
						
						</div>
                        <p><strong>Categories: </strong><?= $row["nama_kategori"] ?></p>
                          <a href="index.php" class="btn btn-outline-primary rounded-pill"><i class="bi bi-chevron-double-left">Kembali Ke Halaman Utama</i></a>
					</div>
                    
				</div>
			</div>
            
		</div>	
      
	</div>

	

<?php include('include/footer.php') ?>