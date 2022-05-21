<?php

require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan!');
      </script>";
    } else {
        echo mysqli_error($conn);
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

    <title>Halaman Login</title>
</head>

<body>
    <h3 class="text-center mt-4 mb-5">Halaman Registrasi</h3>


    <div class="container">
        <div class="row">
            <div class="col">

                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Username :</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" name="kata">Password :</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" name="kata">Konfirmasi Password :</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password2">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Registrasi</button>
                    <a href="login.php" class="btn btn-success">Login</a>
                </form>



            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>