<?php 

 
$result  = queryData("SELECT * FROM ongkir");
$nomor  = 1;


?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Ongkir</h3>
                <p class="text-subtitle text-muted">Harga ongkir dan kesediaan kota</p>
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
                            <th>Nama Kota</th>
                            <th>Tarif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_kota"]; ?></td>
                            <td>Rp.<?= number_format($row["tarif"]); ?></td>
                            <td><a href="index.php?halaman=hapusongkir&id=<?= $row["id_ongkir"]; ?> "
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="index.php?halaman=tambahongkir" class="btn btn-sm btn-primary me-1 mb-1"><i class="bi bi-bag-plus"
                style="font-size: 20px;"></i>Tambah Ongkir Produk</a>

    </section>