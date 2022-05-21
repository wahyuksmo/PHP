<?php 

$id_admin = $_SESSION["admin"]["id_admin"];


?>



<?php 

$posts = mysqli_query($conn,"SELECT * FROM posts WHERE id_admin = '$id_admin'");
$post = mysqli_num_rows($posts);

$komens =  mysqli_query($conn,"SELECT * FROM komen WHERE id_admin = '$id_admin'");
$komen = mysqli_num_rows($komens);

$kategori =  mysqli_query($conn, "SELECT * FROM kategori");
$kat = mysqli_num_rows($kategori);


?>



<div class="grey-bg container-fluid">
    <section id="minimal-statistics">
        <div class="row">
            <div class="page-heading">
                <h3>Selamat Datang <?= $_SESSION["admin"]["nama"] ?></h3>
                <p class="text-muted">Ini adalah angka statistik dari postingan anda</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?= $post; ?></h3>
                                    <span>New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?= $komen; ?></h3>
                                    <span>New Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?= $kat; ?></h3>
                                    <span>Kategori</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>