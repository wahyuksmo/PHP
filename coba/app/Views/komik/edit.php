<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Edit Data</h1>
            <form action="/komik/update/<?= $komik['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul']; ?>">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Judul" name="judul" 
                    value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>"> 
                    <label for="floatingInput">Judul</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis'] ?>"> 
                    <label for="floatingInput">penulis</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
                    <label for="floatingInput">penerbit</label>
                </div>

                <div class="mb-3">
                <div class="col-sm-2">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-preview img-thumbnail">
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