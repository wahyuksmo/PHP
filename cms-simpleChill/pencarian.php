<?php include('include/header.php') ?>

<?php 


$conn = new mysqli("localhost", "root", "", "coba-cms");

$keyword = $_GET["keyword"];
$semuadata = array();

$result = $conn->query("SELECT * FROM posts JOIN kategori ON posts.id_kategori = kategori.id_kategori JOIN admin ON posts.id_admin = admin.id_admin WHERE judul LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'");

while ($row = $result->fetch_assoc()) {
    $semuadata[] = $row;
}



?>


<div class="main-wrapper ">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <h1 class="text-capitalize mb-4 text-lg">Hasil Pencarian <?= $keyword; ?></h1>
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
            <div class="row">
                <div class="col-lg">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <form action="./pencarian.php" method="GET" autocomplete="off">
                                <input type="text" class="form-control" placeholder="Cari artikel...." name="keyword">
                                <button type="submit" class="btn btn-mian btn-small d-block mt-2">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="container p-5">
    <?php if(empty($semuadata)) :  ?>
    <div class="alert alert-danger" style="height: 100px; font-size:20px;"> <strong>
            <center>Pencarian tidak ditemukan</center>

        </strong> </div>


    <?php endif; ?>
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