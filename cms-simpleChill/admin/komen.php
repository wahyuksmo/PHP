<?php 

$result = queryData("SELECT * FROM komen JOIN posts ON komen.id_posts = posts.id_posts JOIN admin ON komen.id_admin = admin.id_admin");
$nomor =  1;


?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Komen Orang</h3>
                <p class="text-subtitle text-muted">Komen</p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th class="">No</th>
                            <th class="">Nama Postingan</th>
                            <th class="">Nama Penulis</th>
                            <th class="">Komen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $row["judul"]; ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td><?= $row["komen"]; ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </section>
</div>