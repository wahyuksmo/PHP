<?php

$id_posts = $_GET["id"];

$row = queryData("SELECT * FROM posts JOIN kategori ON posts.id_kategori = kategori.id_kategori WHERE id_posts = $id_posts")[0];
$nomor = 1;


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
                        <img src="../foto_postingan/<?= $row["foto"]; ?>" alt="" class="img-fluid">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive mt-4">
                            <table class="table table-lg">

                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $row["judul"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?= $row["nama_kategori"]; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td><?= $_SESSION["admin"]["nama"] ?></td>

                                    </tr>
                                    <tr>
                                        <th>Prolog</th>
                                        <td> <?= $row["prolog"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td><?= $row["deskripsi"]; ?></td>
                                    </tr>
                                </tbody>

                            </table>
                            <a href="index.php?halaman=posts" class="btn btn-sm btn-success me-1 mb-1"><i
                                    class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
                                Ke
                                Postingan Anda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>