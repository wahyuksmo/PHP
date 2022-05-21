<?php 


$result = queryData("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");
$nomor = 1;


?>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Produk</h3>
                <p class="text-subtitle text-muted">Data Barang-barang Yang Ada Ditoko</p>
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
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_produk"]; ?></td>
                            <td><?= $row["nama_kategori"]; ?></td>
                            <td>Rp.<?= number_format($row["harga_produk"]); ?></td>
                            <td><?= $row["stock_produk"]; ?></td>
                            <td>
                                <img src="../foto_produk/<?= $row["foto_produk"]; ?>" alt="" width="150">
                            </td>
                            <td>
                                <a href="index.php?halaman=hapusproduk&id=<?= $row["id_produk"];?>"
                                    onclick="return confirm('Yakin ?') ;" class=" btn btn-sm btn-danger">Hapus</a>
                                <a href="index.php?halaman=ubahproduk&id=<?= $row["id_produk"]; ?>"
                                    class=" btn btn-sm btn-success">Edit</a>
                                <a href="index.php?halaman=detailproduk&id=<?= $row["id_produk"]; ?>"
                                    class=" btn btn-sm btn-warning">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="bi bi-bag-plus"></i>Tambah Produk
            Anda</a>

    </section>
</div>