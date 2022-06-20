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
                    <h5 class="py-3 text-center">Halaman Registrasi</h5>
                    <form action="/user/save" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Lengkap" class="form-control rounded-pill <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="<?= old('email'); ?>" placeholder="Email" class="form-control rounded-pill <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <p class="ms-3 mt-2" style="margin-bottom: -10px;"><small class="text-muted">Pastikan email yang terdaftar asli agar bisa membuka fitur Lupa Passoword</small></p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mt-2">
                                <input type="password" name="password" value="<?= old('password'); ?>" placeholder="Password" class="form-control rounded-pill <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <input type="password" name="konfirmasi_password" value="<?= old('konfirmasi_password'); ?>" placeholder="Konfirmasi Password" class="form-control rounded-pill <?= ($validation->hasError('konfirmasi_password')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('konfirmasi_password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <img src="/img/default.png" class="img-preview img-thumbnail mb-3 ms-3">
                            </div>
                            <input type="file" name="gambar" id="gambar" class="form-control rounded-pill <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <p class="ms-3 mt-2"><small class="text-muted">Jika tidak pilih gambar, profile anda akan default profile</small></p>
                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary rounded-pill p-2" type="submit">Registrasi</button>
                            </div>
                        </div>
                    </form>
                    <p class="my-4 text-center"><a href="/user/login" class="text-decoration-none">Sudah punya akun? Login</a></p>
                </div>

            </div>
        </div>
    </div>




    <script>
        function previewImg() {
            const sampul = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(sampul.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }


        }
    </script>

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