<?php 



$semuadata = array();
$tgl_mulai = "-";
$tgl_selesai = "-";

if (isset($_POST["kirim"])) {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];

    $result = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan = pl.id_pelanggan
     WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");

    while ($row = $result->fetch_assoc()) {
        $semuadata[] = $row;
    }
}


?>



<section class="section text-center">
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Pembelian</h4>
                </div>
                <div class="card-content">
                    <form action="" method="POST">
                        <div class="card-body">
                            <p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tglm" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tglm" name="tglm"
                                            value="<?= $tgl_mulai; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tgls" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tgls" name="tgls"
                                            value="<?= $tgl_selesai; ?>">
                                    </div>
                                </div>
                                <div class="col-md-1 mt-2">
                                    <label>&nbsp;</label>
                                    <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>

                                </div>
                            </div>
                            </p>
                        </div>
                    </form>
                    <!-- table head dark -->
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total  = 0; ?>
                                <?php foreach ($semuadata as $key => $value) : ?>
                                <?php $total += $value["total_pembelian"] ?>
                                <tr>
                                    <th scope="row"><?= $key + 1; ?></th>
                                    <td><?= $value["nama_pelanggan"]; ?></td>
                                    <td><?= $value["tanggal_pembelian"]; ?></td>
                                    <td>Rp. <?= number_format($value["total_pembelian"]); ?></td>
                                    <td><?= $value["status_pembelian"]; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th>Rp. <?= number_format($total); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>