<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
  }

include('include/header.php');


?>


<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-content">
        <section class="row">

            <?php 
            
            if(isset($_GET["halaman"]))  {


                if(($_GET["halaman"]=="produk")) {
                    include 'produk.php';
                }else if($_GET["halaman"]== "tambahproduk"){
                    include "tambahproduk.php";
                }else if($_GET["halaman"]== "hapusproduk"){
                    include "hapusproduk.php";
                }else if($_GET["halaman"]== "ubahproduk"){
                    include "ubahproduk.php";
                }else if($_GET["halaman"]== "detailproduk"){
                    include "detailproduk.php";
                }else if($_GET["halaman"]== "kategori"){
                    include "kategori.php";
                }else if($_GET["halaman"]== "tambahkategori"){
                    include "tambahkategori.php";
                }else if($_GET["halaman"]== "hapuskategori"){
                    include "hapuskategori.php";
                }else if($_GET["halaman"]== "pelanggan"){
                    include "pelanggan.php";
                }else if($_GET["halaman"]== "logout"){
                    include "logout.php";
                }else if($_GET["halaman"]== "pembelian"){
                    include "pembelian.php";
                }else if($_GET["halaman"]== "pembayaran"){
                    include "pembayaran.php";
                }else if($_GET["halaman"]== "detail"){
                    include "detail.php";
                }else if($_GET["halaman"]== "laporan_pembelian"){
                    include "laporan_pembelian.php";
                } else if($_GET["halaman"]== "ongkir"){
                    include "ongkir.php";
                }else if($_GET["halaman"]== "hapusongkir"){
                    include "hapusongkir.php";
                }
                else if($_GET["halaman"]== "tambahongkir"){
                    include "tambahongkir.php";
                }else if($_GET["halaman"]== "logout"){
                    include "logout.php";
                }





            }else {
                include "main.php";
            }
            
            
            
            
            
            ?>

        </section>
    </div>

</div>



<?php include('include/footer.php') ?>