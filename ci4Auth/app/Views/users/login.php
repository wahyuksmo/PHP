<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card p-4 shadow-lg border-0 my-4">
                    <img src="/img/default.png" alt="" class="d-block mx-auto">

                    <h5 class="py-3 text-center">Halaman Login</h5>
                    <?php if (session()->getFlashdata('pesan')) :  ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) :  ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="/user/fungsiLogin" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="email" name="email" value="<?= old('email'); ?>" placeholder="Email" class="form-control rounded-pill <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> ">
                            <div class="invalid-feedback text-center">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <p class="ms-3 mt-2"><small class="text-muted">Masukan Email yang anda Registrasikan</small></p>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="<?= old('password'); ?>" placeholder="Password" class="form-control rounded-pill <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback text-center">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <div class="form-group ms-3">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" name="remember" id="CustomCheckbox1" class="custom-control-input" value="1">
                                <label for="CustomCheckbox1" class="custom-control-label">Remember Me </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary rounded-pill p-2" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="my-4 text-center small"><a href="/user/lupapassword" class="text-decoration">Lupa Password ?</a></p>
                    <p class="text-center small"><a href="/" class="text-decoration-none">Belom punya akun? Registrasi</a></p>
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