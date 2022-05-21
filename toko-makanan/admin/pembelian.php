<?php 




$result = queryData("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
$nomor = 1;



?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pembelian</h3>
                <p class="text-subtitle text-muted">Data Barang-barang Yang Dibeli Oleh Pelanggan</p>
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
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Pembelian</th>
                            <th>Status Pembelian</th>
                            <th>Total Pembelian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_pelanggan"]; ?></td>
                            <td><?= $row["tanggal_pembelian"]; ?></td>
                            <td><?= $row["status_pembelian"]; ?></td>
                            <td>Rp. <?= number_format($row["total_pembelian"]) ?></td>
                            <td>
                                <a href="index.php?halaman=detail&id=<?= $row["id_pembelian"]; ?> "
                                    class="btn btn-sm btn-info">Detail</a>

                                <?php if($row["status_pembelian"] == "Sudah Kirim Pembayaran" ) : ?>
                                <a href="index.php?halaman=pembayaran&id=<?= $row["id_pembelian"]; ?>"
                                    class="btn btn-sm btn-primary">Lihat
                                    Pembayaran</a>
                                <?php endif; ?>
                                <?php if($row["status_pembelian"] == "Lunas dan dikirim" ) : ?>
                                <button class="btn btn-sm btn-success" disabled>Sudah Lunas dan dikirim</button>
                                <?php endif; ?>


                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>