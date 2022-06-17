<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Tambah Data</h1>
            <form action="/komik/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Judul" name="judul">
                    <label for="floatingInput">Judul</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    <label for="floatingInput">penulis</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    <label for="floatingInput">penerbit</label>
                </div>



                <div class="mb-3">
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-preview img-thumbnail">
                    </div>
                    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" type="file" name="sampul" id="sampul" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection('content'); ?>