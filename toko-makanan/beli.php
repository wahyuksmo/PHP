<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
</body>
</html>

<?php 
session_start();
$id_produk = $_GET["id"];


if(isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
}else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>Swal.fire({
    icon: 'success',
    title: 'Berhasil Dibeli',
    showConfirmButton: false,
    focusConfirm: false,
    footer: '<a href=keranjang.php style=color:#0099CC;text-decoration:none;>Silahkan Ke Keranjang Anda</a>'
  })</script>";




?>