<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


$id = $_GET["id"];
$org = query("SELECT * FROM konten WHERE id = $id")[0];



if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
        </script>
    ";
    }
}



?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <h3 class="text-center">Ubah Data</h3>

    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $org["id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $org["gambar"]; ?>">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul :</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="<?= $org["judul"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" name="kata">Konten :</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kata" value="<?= $org["kata"]; ?>">

                    </div>
                    <div class="mb-3">
                        <img src="img/<?= $org['gambar']; ?>" width="40"> <br>
                        <label for="exampleInputEmail1" class="form-label">Gambar :</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gambar" value="<?= $org["gambar"]; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                </form>

            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>