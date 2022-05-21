<?php 


$id_pembelian = $_GET["id"];

$result = $conn->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
$row = $result->fetch_assoc();

if (isset($_POST["proses"])) {
    $resi = $_POST["resi"];
    $status = $_POST["status"];

    $conn->query("UPDATE pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian ='$id_pembelian'");
    echo "<script> Swal.fire(
        'Berhasil',
        'Pembayaran berhasil di update',
        'success' )</script>";
}



?>
<section class="section">




    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pembayaran Pelanggan</h4>
                    </div>


                    <!-- Table with no outer spacing -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bank</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500"><?= $row["nama"]; ?></td>
                                    <td><?= $row["bank"]; ?></td>
                                    <td class="text-bold-500">Rp.<?= number_format($row["jumlah"]) ?></td>
                                    <td><?= $row["tanggal"]; ?></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="../bukti_pembayaran/<?= $row["bukti"] ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Proses</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nomor Resi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="resi"
                                                placeholder="Ketikan resi...">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Status Pembayaran</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="status">
                                                    <option value="Lunas dan dikirim">Lunas</option>
                                                    <option value="Batal">Batal</option>
                                                </select>
                                            </fieldset>
                                        </div>



                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" name="proses">Submit
                                                Proses Anda</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="index.php?halaman=pembelian" class="btn btn-sm btn-success me-1 mb-1"><i
            class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
        Ke Data Pembelian</a>


</section>