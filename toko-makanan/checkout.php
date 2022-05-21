<?php include('include/header.php') ?>
<?php
$nomor = 1;
$totalbelanja = 0;
$keranjang  = $_SESSION["keranjang"];

if (!isset($_SESSION["pelanggan"])) {
    echo "<script>Swal.fire({
        icon: 'info',
        title: 'Anda Belom Login',
        showConfirmButton: false,
        focusConfirm: false,
        footer: '<a href=index.php style=color:#0099CC;text-decoration:none;>Silahkan Login Dahulu</a>'
      })</script>";
}

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
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
                    <h1>Silahkan Belanja</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Billing Address
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="" method="POST">
                                            <p><input type="text" class="form-control" value="<?= $_SESSION["pelanggan"]["nama_pelanggan"] ?>" readonly>
                                            </p>
                                            <p><input type="text" class="form-control" value="<?= $_SESSION["pelanggan"]["telepon_pelanggan"] ?>" readonly>
                                            </p>

                                            <p>
                                            <select class="form-control" name="id_ongkir" required>
                                                    <option value>Pilih ongkos kirim</option>
                                                    <?php $result = $conn->query("SELECT * FROM ongkir"); ?>
                                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $row['id_ongkir']; ?>"><?= $row["nama_kota"]; ?>-
                                                        Rp.
                                                        <?= number_format($row["tarif"]); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </p>
                                            <p>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pengiriman" placeholder="Masukan alamat anda yang ingin diterima makanannya..." required></textarea>
                                            </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($keranjang as $id_produk => $jumlah) :  ?>
                                <?php $result = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                $row = $result->fetch_assoc();
                                $subharga = $row["harga_produk"] * $jumlah;
                                ?>
                                <tr class="table-body-row">
                                    <td class="product-remove"><?= $nomor++ ?></td>
                                    <td class="product-image"><img src="./foto_produk/<?= $row["foto_produk"] ?>" alt="">
                                    </td>
                                    <td class="product-name"><?= $row["nama_produk"] ?></td>
                                    <td class="product-price">Rp. <?= number_format($row["harga_produk"]) ?></td>
                                    <td class="product-quantity"><?= $jumlah ?></td>
                                    <td class="product-total">Rp. <?= number_format($subharga) ?></td>
                                </tr>

                                <?php $totalbelanja += $subharga; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Belanja : </th>
                                <th>Rp. <?= number_format($totalbelanja) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="cart-buttons">
                    <a href="index.php" class="boxed-btn"><i class="bi bi-chevron-double-left">Belanja Lagi</i></a>
                        <button class="btn btn-outline-success rounded-pill" name="checkout">Check Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php


if (isset($_POST["checkout"])) {
    $id_pelanggan  = $_SESSION["pelanggan"]["id_pelanggan"];
    $id_ongkir = $_POST["id_ongkir"];
    $tanggal_pembelian = date("Y-m-d");
    $alamat_pengiriman = htmlspecialchars($_POST["alamat_pengiriman"]);

    $result = mysqli_query($conn, "SELECT * FROM ongkir WHERE id_ongkir = $id_ongkir");
    $row = mysqli_fetch_assoc($result);
    $nama_kota = $row["nama_kota"];
    $tarif = $row["tarif"];

    $total_pembelian = $totalbelanja + $tarif;

    mysqli_query($conn, "INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,id_ongkir,nama_kota,tarif,alamat_pengiriman) 
     VALUES ('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$id_ongkir','$nama_kota','$tarif','$alamat_pengiriman')");

    $id_pembelian_barusan = $conn->insert_id;

    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
        $result = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = $id_produk");
        $perproduk = mysqli_fetch_assoc($result);

        $nama = $perproduk["nama_produk"];
        $harga = $perproduk["harga_produk"];
        $subharga = $perproduk["harga_produk"] * $jumlah;

        $conn->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,subharga)
      VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah','$nama','$harga','$subharga')");

        //skrip update stock 
        $conn->query("UPDATE produk SET stock_produk =stock_produk -$jumlah WHERE id_produk = '$id_produk'");
    }



    unset($_SESSION["keranjang"]);

    echo "<script>alert('pembelian sukses');</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
}


?>





<?php include('include/footer.php') ?>