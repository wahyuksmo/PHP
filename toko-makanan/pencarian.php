<?php


$conn = new mysqli("localhost", "root", "", "toko-makanan");

$keyword = $_GET["keyword"];
$semuadata = array();

$result = $conn->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");

while ($row = $result->fetch_assoc()) {
    $semuadata[] = $row;
}






?>

<?php include('include/header.php') ?>



<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1 class="mt-5 mb-5 text-white">Hasil pencarian <?= $keyword; ?></h1>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">

            <?php if(empty($semuadata)) :  ?>
            <div class="alert alert-danger" style="height: 100px; font-size:20px;"> <strong>
                    <center>Pencarian tidak ditemukan</center>

                </strong> </div>
            <div class="container" style="height: 300px;">

            </div>

            <?php endif; ?>

            <div class="row">

                <?php foreach($semuadata as $key => $value) : ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="./foto_produk/<?= $value["foto_produk"] ?>" alt=""
                                    width="300" height="300"></a>
                        </div>
                        <h3><?= $value["nama_produk"] ?></h3>
                        <p class="product-price">Rp. <?= number_format($value["harga_produk"]) ?></p>
                        <a href="beli.php?id=<?= $value["id_produk"] ?>" class="cart-btn"><i
                                class="fas fa-shopping-cart"></i>
                            Add to Cart</a>
                        <a href="detail.php?id=<?= $value["id_produk"] ?>"
                            class="btn btn-outline-success rounded-pill ">Detail</a>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>



    <?php include('include/footer.php') ?>