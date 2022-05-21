<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$orang = query("SELECT * FROM konten");

//
if (isset($_POST["cari"])) {
  $orang = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="script.js"></script>
  <title>Hello, world!</title>
</head>

<body>
  <h3 class="text-center">Crud Programmer</h3>


  <div class="container">
    <div class="row">
      <div class="col">
        <a href="logout.php" class="btn btn-danger mt-5">Logout</a>
        <a href="tambah.php" class="btn btn-primary mt-5">Tambah Data</a>
      </div>
      <div class="col-4">
        <form action="" method="POST">
          <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari data...">
        </form>
      </div>
    </div>
  </div>





  <div class="container mt-5" id="panjul">
    <div class="row">
      <?php $i = 1; ?>
      <?php foreach ($orang as $row) : ?>
        <div class="col">

          <div class="card mt-5" style="width: 18rem">
            <img src="img/<?= $row["gambar"]; ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <p hidden> <?= $i; ?> </p>
              <h5 class="card-title"><?= $row["judul"]; ?></h5>
              <p class="card-text"><?= $row["kata"]; ?></p>
              <a href="hapus.php?id=<?= $row["id"]; ?>" class=" btn btn-danger" onclick="return confirm('yakin?');">Hapus Data</a>
              <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-success">Ubah Data</a>
            </div>
          </div>


        </div>
        <?php $i++; ?>
      <?php endforeach; ?>
    </div>
  </div>


  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>



<style>
  .card img {
    height: 175px;
  }
</style>