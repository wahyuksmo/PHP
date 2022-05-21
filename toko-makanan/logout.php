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
session_destroy();

echo "<script>Swal.fire({
    icon: 'success',
    title: 'Anda Berhasil Logout',
    showConfirmButton: false,
    focusConfirm: false,
    footer: '<a href=login.php style=color:#0099CC;text-decoration:none;>Silahkan Ke Halaman Login</a>'
  })</script>";




?>