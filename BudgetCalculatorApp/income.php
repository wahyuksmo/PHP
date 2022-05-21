<?php 
require 'functions.php';
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {

    if (tambahIncome($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Budget App</title>
</head>

<body>


    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Isi data anda</h3>

                            <form action="" method="post" class="mb-3">

                            <div class="form-floating mb-4">
                                
                                <input type="number" min="1" class="form-control" id="floatingPassword" placeholder="Password" name="pendapatan">
                                
                                <label for="floatingPassword">Nilai Pendapatan Anda</label>
                            </div>
                            <a href="index.php" class="btn btn-sm btn-danger rounded-pill"><i class="bi bi-box-arrow-left me-2" style="font-size: 15px;"></i>Kembali</a>
                            <button class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
