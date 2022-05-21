<?php


$result = queryData("SELECT * FROM kategori");

if (isset($_POST["submit"])) {

    if (tambahPostingan($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php?halaman=posts';
        </script>
    ";
       
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
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
                    <h4 class="card-title">Tambah Postingan Anda</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_admin" value="<?= $_SESSION["admin"]["id_admin"] ?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Judul Postingan</label>
                                        <input type="text" id="first-name-column" class="form-control" name="judul"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Prolog Postingan</label>
                                        <input type="text" id="first-name-column" class="form-control" name="prolog"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Pilih Kategori</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="id_kategori">
                                                <option>Pilih Kategori</option>
                                                <?php foreach ($result as $row) : ?>
                                                <option value="<?= $row["id_kategori"]; ?>">
                                                    <?= $row["nama_kategori"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Foto Postingan anda</label>
                                        <input type="file" id="company-column" class="form-control" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Deskripsi Postingan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                                            name="deskripsi"></textarea>
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