<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>


<div class="container mt-5">
    <h1 class="mt-5">Detail Komik</h1>
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis</b> : <?= $komik['penulis']; ?></p>
                            <p class="card-text"><b>Penerbit</b> : <?= $komik['penerbit']; ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-info text-light">Edit</a>

                            <form action="/komik/<?= $komik['id']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin')">Hapus</button>
                            </form>

                         
                            <br>
                            <br>
                            <a href="/komik">
                                << Back to komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>