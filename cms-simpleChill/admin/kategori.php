<?php 

$result  = queryData("SELECT * FROM kategori");
$nomor = 1;



?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kategori</h3>
                <p class="text-subtitle text-muted">Kategori Postingan</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th class="">No</th>
                            <th class="">Nama Kategori</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_kategori"]; ?></td>
                            <td>
                                <a href="index.php?halaman=hapuskategori&id=<?= $row["id_kategori"]; ?> "
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.php?halaman=tambahkategori" class="btn btn-primary"><i
                class="bi bi-clipboard-plus me-2"></i>Tambah
            Kategori Postingan</a>

    </section>
</div>