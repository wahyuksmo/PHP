<?php 

$result = queryData("SELECT * FROM kategori");
$nomor = 1;



?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori Produk</h3>
                <p class="text-subtitle text-muted">Data kategori dari sebuah produk</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_kategori"]; ?></td>
                            <td>
                                <a href="index.php?halaman=hapuskategori&id=<?= $row["id_kategori"]; ?>"
                                    onclick="return confirm('Yakin ?') ;" class=" btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="index.php?halaman=produk" class="btn btn-sm btn-success me-1 mb-1"><i
                class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
            Ke
            Produk Anda</a>
        <a href="index.php?halaman=tambahkategori" class="btn btn-sm btn-primary me-1 mb-1"><i class="bi bi-bag-plus"
                style="font-size: 20px;"></i>Tambah Kategori
            Anda</a>
    </section>
</div>