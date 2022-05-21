<?php 


$id_admin = $_SESSION["admin"]["id_admin"];

$result = queryData("SELECT * FROM posts JOIN kategori ON posts.id_kategori = kategori.id_kategori WHERE id_admin = $id_admin");
$nomor  = 1;



?>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Postingan</h3>
                <p class="text-subtitle text-muted">Postingan yang di upload</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover text-center" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Penulis</th>
                            <th class="text-center">Prolog</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["judul"]; ?></td>
                            <td><?= $row["nama_kategori"]; ?></td>
                            <td><?= $_SESSION["admin"]["nama"] ?></td>
                            <td><?= $row["prolog"]; ?></td>
                            <td>
                                <img src="../foto_postingan/<?= $row["foto"]; ?>" alt="" width="150">
                            </td>
                            <td>
                                <a href="index.php?halaman=hapusposts&id=<?= $row["id_posts"];?>"
                                    onclick="return confirm('Yakin ?') ;" class=" btn btn-sm btn-danger">Hapus</a>
                                <a href="index.php?halaman=ubahposts&id=<?= $row["id_posts"]; ?>"
                                    class=" btn btn-sm btn-success">Edit</a>
                                <a href="index.php?halaman=detailposts&id=<?= $row["id_posts"]; ?>"
                                    class=" btn btn-sm btn-warning">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="index.php?halaman=tambahposts" class="btn btn-primary"><i class="bi bi-clipboard-plus me-2"></i>Tambah
            Postingan
            Anda</a>

    </section>
</div>