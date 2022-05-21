<?php 
session_start();
$conn = new mysqli("localhost","root","","coba-cms");



if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if(mysqli_num_rows($result) ===1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["admin"] = $row;
        header("Location: index.php");
        exit;
        
}


$error = true;


}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">


                    <h1 class="auth-title">Login</h1>
                    <p class="auth-subtitle mb-5">Log in dengan akun admin anda</p>

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>


                        <?php if (isset($error)) : ?>
                        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i>
                            Login gagal</div>
                        <?php endif; ?>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="login" type="submit">Log
                            in</button>
                    </form>




                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>