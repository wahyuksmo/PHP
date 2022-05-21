<?php



$id = $_GET["id"];

$result = $conn->query("SELECT * FROM produk WHERE id_produk = $id");
$row = $result->fetch_assoc();

$fotoproduk = $row["foto_produk"];

if (file_exists("../foto_produk/$fotoproduk")) {
    unlink("../foto_produk/$fotoproduk");
}
$conn->query("DELETE FROM produk WHERE id_produk = $id");


echo "
 <script>Swal.fire({
    icon: 'error',
    title: 'Berhasil',
    text: 'Data Berhasil dihapus ',
  })</script>
";


?>


<section class="section"><a href="index.php?halaman=produk" class="btn btn-primary">Kembali Ke Produk Anda</a></section>