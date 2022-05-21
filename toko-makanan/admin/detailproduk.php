<?php


$id_produk  = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = $id_produk");
$row = mysqli_fetch_assoc($result);

?>
<section class="section ">
    <div class="row" id="basic-table">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Produk</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <img src="../foto_produk/<?= $row["foto_produk"] ?>" alt="" class="img-fluid p-5">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">

                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $row["nama_produk"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?= $row["nama_kategori"]; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>Rp. <?= number_format($row["harga_produk"]); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <td> <?= $row["stock_produk"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td><?= $row["deskripsi_produk"]; ?></td>
                                    </tr>
                                </tbody>

                            </table>
                            <a href="index.php?halaman=produk" class="btn btn-sm btn-success me-1 mb-1"><i
                                    class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
                                Ke
                                Produk Anda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>