<?php


$result = queryData("SELECT * FROM pelanggan");
$nomor = 1;

?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pelanggan</h3>
                <p class="text-subtitle text-muted">Data Pelanggan Yang Terdaf<tar /p>
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
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["nama_pelanggan"]; ?></td>
                            <td><?= $row["email_pelanggan"]; ?></td>
                            <td><?= $row["alamat_pelanggan"] ?></td>
                            <td><?= $row["telepon_pelanggan"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>