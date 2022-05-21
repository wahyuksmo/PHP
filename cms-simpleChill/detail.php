<?php include('include/header.php') ?>

<?php 

$id = $_GET["id"];

$row = queryData("SELECT * FROM posts JOIN kategori ON posts.id_kategori = kategori.id_kategori WHERE id_posts = $id")[0];

$ambilkomen = queryData("SELECT * FROM komen WHERE id_posts =$id");

$ambilpenulis = queryData("SELECT * FROM posts JOIN admin ON posts.id_admin = admin.id_admin WHERE id_posts = $id")[0];


?>

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="single-blog-item">
                            <img src="./foto_postingan/<?= $row["foto"] ?>" alt="" class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    <span class="text-muted text-capitalize mr-3"><i
                                            class="ti-pencil-alt mr-2"></i><?= $row["nama_kategori"] ?></span>
                                    <span class="text-muted text-capitalize mr-3"><i
                                            class="ti-time mr-1"></i><?= $row["tanggal"] ?></span>
                                    <span class="text-muted">Penulis : <?= $ambilpenulis["nama"] ?></span>
                                </div>

                                <h2 class="mt-3 mb-4"><?= $row["judul"] ?></a></h2>
                                <h3 class="mt-2 mb-4"><?= $row["prolog"] ?></h3>
                                <p><?= $row["deskripsi"] ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 mb-5">
                        <div class="comment-area card border-0 p-5">
                            <h4 class="mb-4">Comments</h4>
                            <ul class="comment-tree list-unstyled">
                                <li class="mb-5">
                                    <?php foreach($ambilkomen as $komen) :  ?>
                                    <div class="comment-area-box">
                                        <p class="mb-1"><strong>Anonymous : </strong></p>
                                        <div class="comment-content mt-3">

                                            <p><?= $komen["komen"] ?></p>
                                            <hr>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <form class="contact-form bg-white rounded p-5" id="comment-form" action="" method="POST">
                            <h4 class="mb-4">Tulis Komen</h4>
                            <div class="row">
                                <textarea class="form-control mb-3" name="komment" id="comment" cols="30" rows="5"
                                    placeholder="Komen"></textarea>
                                <input type="hidden" name="id_admin" value="<?= $row["id_admin"]; ?>">
                                <button class="btn btn-main btn-round-full" name="submit">Kirim Komen</button>
                                <a href="index.php" class="btn btn-outline-warning btn-round-full ml-3">Kembali Ke
                                    Postingan</a>

                        </form>

                    </div>

                </div>


                <?php 


if(isset($_POST["submit"])){

  $id_posts = $id;
  $komen = htmlspecialchars($_POST["komment"]);
  $admin = $_POST["id_admin"];

  $conn->query("INSERT INTO komen VALUES ('', '$id_posts', '$admin', '$komen')");
  echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'detail.php?id=$id';
        </script>
    ";


}


?>


                <?php include('include/footer.php') ?>