<?php 

require 'fungsiRegistrasi.php';
if (isset($_POST["submit"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan!');
      </script>";
      echo "<script>location='login.php';</script>";
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

    <title>Budget App</title>
</head>

<body>


    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Registrasion</h3>

                            <form action="" method="post" class="mb-3">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" required >
                                <label for="floatingInput">Nama anda</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password1" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password2" required>
                                <label for="floatingPassword">Konfirmasi Password</label>
                            </div>

                            <button class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit">Registrasi</button>
                        
                            </form>
                            <span>Already have account? <a href="login.php" class="text-decoration-none text-danger">Login</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>