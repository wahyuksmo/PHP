<?php include('include/header.php') ?>

<?php 

$id = $_GET["id_kat"];

$result = queryData("SELECT * FROM posts WHERE id_kategori = $id");
$namakategori = queryData("SELECT * FROM kategori WHERE id_kategori = $id")[0];


?>
<div class="main-wrapper ">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-4 text-lg">Artikel <?= $namakategori["nama_kategori"] ?></h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.php" class="text-white">
                                    <<< </a>
                            </li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="index.php" class="text-white-50">Back to Article</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">

            <?php if(empty($result)) :  ?>
            <div class="alert alert-danger" style="height: 100px; font-size:20px;"> <strong>
                    <center>Kategori Belom Ada Postingan :D</center>

                </strong> </div>


            <?php endif; ?>

            <div class="row">

                <?php foreach($result as $row)  : ?>
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="blog-item">
                        <img src="./foto_postingan/<?= $row["foto"] ?>" alt="" class="img-fluid rounded">

                        <div class="blog-item-content bg-white p-5">
                            <div class="blog-item-meta bg-gray py-1 px-2">
                                <span class="text-black text-capitalize mr-3"><i
                                        class="ti-time mr-1"></i><?= $row["tanggal"] ?></span>
                            </div>

                            <h3 class="mt-3 mb-3"><?= $row["judul"] ?></h3>
                            <p class="mb-4"><?= $row["prolog"] ?></p>

                            <a href="detail.php?id=<?= $row["id_posts"] ?>"
                                class="btn btn-small btn-main btn-round-full">Detail Postingan</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>


        </div>
    </section>






    <?php include('include/footer.php') ?>