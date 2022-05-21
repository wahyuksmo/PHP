<?php include('include/header.php') ?>

<?php 

$keranjang = $_SESSION['keranjang'];


$nomor = 1;

?>

<?php 
if(empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
    echo "<script>Swal.fire({
        icon: 'info',
        title: 'Anda belom beli apapun',
        showConfirmButton: false,
        focusConfirm: false,
        footer: '<a href=index.php style=color:#0099CC;text-decoration:none;>Silahkan belanja dulu</a>'
      })</script>";
    
  }

?>

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Anda masuk ke keranjang belanja</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove">No</th>
                                <th class="product-image">Foto Produk</th>
                                <th class="product-name">Nama</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-total">Subharga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($keranjang as $id_produk => $jumlah) :  ?>
                            <?php $result = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                     $row = $result->fetch_assoc();
                     $subharga = $row["harga_produk"] * $jumlah;
                  ?>
                            <tr class="table-body-row">
                                <td class="product-remove"><?= $nomor++ ?></td>
                                <td class="product-image"><img src="./foto_produk/<?= $row["foto_produk"] ?>" alt=""></td>
                                <td class="product-name"><?= $row["nama_produk"] ?></td>
                                <td class="product-price">Rp. <?= number_format($row["harga_produk"]) ?></td>
                                <td class="product-quantity"><?= $jumlah ?></td>
                                <td class="product-total">Rp. <?= number_format($subharga )?></td>
                                <td><a href="hapuskeranjang.php?id=<?= $id_produk; ?>"
                                        class="btn btn-danger btn-sm">Hapus</a></td>
                            </tr>  
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <div class="cart-buttons">
							<a href="index.php" class="boxed-btn"><i class="bi bi-chevron-double-left">Belanja Lagi</i></a>
							<a href="checkout.php" class="btn btn-success rounded-pill">Check Out</a>
						</div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php include('include/footer.php') ?>