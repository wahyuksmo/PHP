<?php 

$id = $_GET["id"];

$conn->query("DELETE FROM kategori WHERE id_kategori = $id");

echo "
 <script>Swal.fire({
    icon: 'error',
    title: 'Berhasil',
    text: 'Data Berhasil dihapus ',
  })</script>
"; 


?>

<section class="section"><a href="index.php?halaman=kategori" class="btn btn-primary">Kembali ke Kategori</a></section>