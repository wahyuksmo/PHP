<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card p-4 shadow-lg border-0 my-4">
                    <!-- <img src="/img/default.png" alt="" class="d-block mx-auto"> -->
                    <h5 class="py-3 text-center">Reset Password Anda</h5>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-warning">
                            <ul>
                                <?php foreach (session()->getFlashdata('pesan') as $val) {
                                ?>
                                    <li><?= $val; ?></li>
                                <?php
                                } ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">

                        <div class="form-group">
                            <input type="password" name="password" id="" placeholder="Password" class="form-control rounded-pill">
                            <p class="ms-3 mt-2"><small class="text-muted">Setelah anda dapat link dari gmail, tuliskan password baru anda di form</small></p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="konfirmasi_password" id="" placeholder="Konfirmasi Password" class="form-control rounded-pill">
                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary rounded-pill p-2" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                    <p class="my-4 text-center small"><a href="/user/login" class="text-decoration-none">Langsung ke Login</a></p>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        background-image: -moz-linear-gradient(0deg, #5295fe 0%, #3399ff 100%);
        background-image: -webkit-linear-gradient(0deg, #5295fe 0%, #3399ff 100%);
        background-image: -moz-linear-gradient(0deg, #5295fe 0%, #3399ff 100%);
        font-family: 'Poppins', sans-serif;
    }

    .card img {
        max-width: 120px;
    }

    .form-group {
        padding: 15px;
    }

    .form-control:not(#gambar) {
        font-size: 0.8rem;
        padding: 1.5rem 1rem;
    }
</style>