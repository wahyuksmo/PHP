<?php include('include/header.php') ?>

<?php 


$result = queryData("SELECT * FROM produk");


?>
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <h1>Makanan enak hanya disini</h1>
                        <div class="hero-btns">
                            <a href="contact.html" class="bordered-btn"><i class="bi bi-telephone-plus-fill"></i>
                                WhatsApp Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Produk</span> Kita</h3>
                    <p>Makanan terbaik di kota, dan ada banyak kategori makanan yang kita jual</p>
                </div>
            </div>
        </div>

        <div class="row">

            <?php foreach($result as $row) : ?>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="./foto_produk/<?= $row["foto_produk"] ?>" alt=""
                                width="300" height="300"></a>
                    </div>
                    <h3><?= $row["nama_produk"] ?></h3>
                    <p class="product-price">Rp. <?= number_format($row["harga_produk"]) ?></p>
                    <a href="beli.php?id=<?= $row["id_produk"] ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>
                        Add to Cart</a>
                    <a href="detail.php?id=<?= $row["id_produk"] ?>"
                        class="btn btn-outline-success rounded-pill ">Detail</a>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </div>
</div>

<?php include('include/footer.php') ?>