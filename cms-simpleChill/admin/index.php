<?php



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


                if(($_GET["halaman"]=="posts")) {
                    include 'posts.php';
                }else if($_GET["halaman"]== "tambahposts"){
                    include "tambahposts.php";
                }else if($_GET["halaman"]== "logout"){
                    include "logout.php";
                }else if($_GET["halaman"]== "hapusposts"){
                    include "hapusposts.php";
                }else if($_GET["halaman"]== "ubahposts"){
                    include "ubahposts.php";
                }else if($_GET["halaman"]== "detailposts"){
                    include "detailposts.php";
                }else if($_GET["halaman"]== "kategori"){
                    include "kategori.php";
                }else if($_GET["halaman"]== "tambahkategori"){
                    include "tambahkategori.php";
                }else if($_GET["halaman"]== "hapuskategori"){
                    include "hapuskategori.php";
                }else if($_GET["halaman"]== "komen"){
                    include "komen.php";
                }






            }else {
                include "main.php";
            }
            
            
            
            
            
            ?>

        </section>
    </div>

</div>



<?php include('include/footer.php') ?>