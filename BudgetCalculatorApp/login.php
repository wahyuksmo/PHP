<?php 
session_start();

$conn = new mysqli("localhost", "root", "", "budget-baru");


if(isset($_POST["submit"])) {

    $email = htmlspecialchars($_POST["email"]);
    $password = mysqli_escape_string($conn, $_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$email' AND password = '$password'");
    $row = mysqli_num_rows($result);

    if($row == 1) {
        $akun = mysqli_fetch_assoc($result);
        $_SESSION["user"] = $akun;
        echo "<script>alert('Anda Sukses login');</script>";
        echo "<script>location='index.php';</script>";
    }else {
        echo "<script>alert('Anda Gagal login');</script>";
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

                            <h3 class="mb-5">Sign in</h3>

                            <form action="" method="post" class="mb-3">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <button class="btn btn-outline-primary btn-lg btn-block" type="submit" name="submit">Login</button>
                        
                            </form>
                            <span>Dont have account? <a href="registrasi.php" class="text-decoration-none text-danger">Registrasi</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>