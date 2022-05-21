<?php 


$id = $_GET["id"];

$row = queryData("SELECT * FROM posts WHERE id_posts = $id")[0];
$datakategori = queryData("SELECT * FROM kategori");


if (isset($_POST["submit"])) {

    if (ubahPosts($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php?halaman=posts';
        </script>
    ";
       
    } else {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php?halaman=posts';
        </script>
    ";
    }
}



?>



<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Postingan Anda</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row["id_posts"]; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $row["foto"]; ?>">
                            <input type="hidden" name="id_admin" value="<?= $_SESSION["admin"]["id_admin"] ?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Judul Postingan</label>
                                        <input type="text" id="first-name-column" class="form-control" name="judul"
                                            required value="<?= $row["judul"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Prolog Postingan</label>
                                        <input type="text" id="first-name-column" class="form-control" name="prolog"
                                            required value="<?= $row["prolog"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Pilih Kategori</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="id_kategori">
                                                <option>Pilih Kategori</option>
                                                <?php foreach($datakategori as $key => $value)  : ?>

                                                <option value="<?= $value["id_kategori"]; ?>"
                                                    <?php if($row["id_kategori"]==$value["id_kategori"]){echo"Selected";} ?>>
                                                    <?= $value["nama_kategori"]; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Foto Postingan anda</label>
                                        <input type="file" id="company-column" class="form-control" name="foto">
                                        <img src="../foto_postingan/<?= $row['foto']; ?>" width="90"
                                            style="margin-top: 10px;"> <br>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Deskripsi Postingan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                                            name="deskripsi"><?= $row["deskripsi"]; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">
                                        Submit</button>

                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>

                                </div>
                            </div>
                        </form>
                        <a href="index.php?halaman=posts" class="btn btn-sm btn-success me-1 mb-1"><i
                                class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
                            Ke
                            Postingan Anda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>