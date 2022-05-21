<?php include('include/header.php') ?>



<?php

$result = queryData("SELECT * FROM posts JOIN kategori ON posts.id_kategori = kategori.id_kategori JOIN admin ON posts.id_admin = admin.id_admin");

$ambilkategori = mysqli_query($conn , "SELECT * FROM kategori");


?>

<div class="main-wrapper ">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <form action="./pencarian.php" method="GET" autocomplete="off">
                                <input type="text" class="form-control" placeholder="Cari artikel...." name="keyword">
                                <button type="submit" class="btn btn-mian btn-small d-block mt-2">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                        <h5 class="mb-4 text-center">Kateogori</h5>

                        <?php foreach($ambilkategori as $a) : ?>
                        <a href="postKategori.php?id_kat=<?= $a["id_kategori"]?>"><?= $a["nama_kategori"] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="container p-5">
    <div class="row">



        <?php foreach ($result as $row) : ?>
        <div class="col-lg-6 col-md-6 mb-5">
            <div class="blog-item">
                <img src="./foto_postingan/<?= $row["foto"] ?>" alt="" class="img-fluid rounded">

                <div class="blog-item-content bg-white p-5">
                    <div class="blog-item-meta bg-gray py-1 px-2">
                        <span class="text-muted text-capitalize mr-3"><i
                                class="ti-pencil-alt mr-2"></i><?= $row["nama_kategori"] ?></span>
                        <span class="text-muted text-capitalize mr-3"><i
                                class="ti-time mr-1"></i><?= $row["tanggal"] ?></span>
                        <span class="text-muted">By. <?= $row["username"]; ?></span>
                    </div>

                    <h3 class="mt-3 mb-3"><a href=""><?= $row["judul"] ?></a></h3>
                    <p class="mb-4"><?= $row["prolog"] ?></p>
                    <a href="detail.php?id=<?= $row["id_posts"] ?>" class="btn btn-small btn-main btn-round-full">Detail
                        Postingan</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
</div>
</section>

<?php include('include/footer.php') ?>