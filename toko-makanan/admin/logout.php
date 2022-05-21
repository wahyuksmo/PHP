<?php
session_destroy();
echo "<script>Swal.fire({
    icon: 'success',
    title: 'Berhasil Logout',
    showConfirmButton: false,
    focusConfirm: false,
    footer: '<a href=login.php style=color:#0099CC;text-decoration:none;>Silahkan Login Kembali</a>'
  })</script>";