<?php include('include/header.php') ?>
<?php


$idpem = $_GET["id"];
$reuslt =  mysqli_query($conn, "SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$row = mysqli_fetch_assoc($reuslt);

//jika yang beli bukan yang sedang login
$id_pelanggan_beli = $row["id_pelanggan"];

$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_beli !== $id_pelanggan_login) {
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
                    <h1>Kirim Bukti Anda</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="kontent py-5">
    <div class="container mt-5">
        <h3>Konfirmasi Bukti Pembayaran</h3>
        <p>Kirim bukti pembayaran anda disini</p>

        <div class="alert alert-info" role="alert">
            Tagihan anda <strong>Rp.<?php echo number_format($row["total_pembelian"]) ?></strong>
        </div>


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $idpem; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Atas Nama : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Bank : </label>
                <select class="form-control" aria-label="Default select example" name="bank">
                    <option selected>Pilih bank anda</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="OVO">OVO</option>
                </select>
            </div>



            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jumlah sesuai tagihan : </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="jumlah" min="1" style="width: 400px;" required>
            </div>

            <div class="mb-3">
                <div class="input-group is-invalid">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" required name="bukti">
                        <label class="custom-file-label" for="validatedInputGroupCustomFile">Foto bukti anda...</label>
                    </div>
                </div>
                <div id="emailHelp" class="form-text text-muted">Maksimal 2MB.</div>

                <button type="submit" name="kirim" class="btn btn-warning text-white mt-4">Kirim Data Anda</button>

        </form>

    </div>
</section>


<?php


if (isset($_POST["kirim"])) {


    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis") . $namabukti;
    move_uploaded_file($lokasibukti, "../bukti_pembayaran/$namafiks");

    $nama = htmlspecialchars($_POST["nama"]);
    $bank = $_POST["bank"];
    $jmlh = $_POST["jumlah"];
    $tanggal  = date("Y-m-d");

    $conn->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jmlh','$tanggal','$namafiks')");

    $conn->query("UPDATE pembelian SET status_pembelian ='Sudah Kirim Pembayaran' WHERE id_pembelian = '$idpem'");
    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Berhasil mengirim pembayaran',
        showConfirmButton: false,
        focusConfirm: false,
        footer: '<a href=riwayat.php style=color:#0099CC;text-decoration:none;>Kembali ke riwayat</a>'
      })</script>";
}



?>



<?php include('include/footer.php') ?>