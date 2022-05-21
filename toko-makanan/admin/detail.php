<?php   


$id_produk = $_GET["id"];

$result = queryData("SELECT * FROM pembelian_produk WHERE id_pembelian = $id_produk");
$nomor = 1;

$ambilgambar = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE id_pembelian = $id_produk");
$gambar = mysqli_fetch_assoc($ambilgambar);


?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail</h3>
                <p class="text-muted">Detail data pembelian pelanggan</p>
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
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["jumlah"]; ?></td>
                            <td>Rp. <?= number_format($row["harga"]) ?></td>
                            <td>Rp. <?= number_format($row["subharga"]) ?></td>
                            <td><img src="../foto_produk/<?= $gambar["foto_produk"] ?> " alt="" width="100"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="index.php?halaman=pembelian" class="btn btn-sm btn-success me-1 mb-1"><i
                class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
            Ke
            Data Pembelian</a>
    </section>