<?php 


$result = queryData("SELECT * FROM kategori");

if (isset($_POST["submit"])) {

    if (tambahProduk($_POST) > 0) {
        echo "<script> Swal.fire(
        'Berhasil',
        'Data anda berhasil ditambahkan',
        'success' )</script>";
       
    } else {
        echo "Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })";
    }
}

?>


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Produk Anda</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Nama Produk</label>
                                        <input type="text" id="first-name-column" class="form-control" name="nama"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-2s">
                                    <div class="form-group">
                                        <label for=""></label>
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
                                        <label for="city-column">Stock produk anda</label>
                                        <input type="number" id="city-column" class="form-control" name="stock" min="1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Harga Produk Anda</label>
                                        <input type="number" id="country-floating" class="form-control" name="harga"
                                            min="1">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Foto produk anda</label>
                                        <input type="file" id="company-column" class="form-control" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Deskripsi Produk</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="deskripsi"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <a href="index.php?halaman=produk" class="btn btn-sm btn-success me-1 mb-1"><i
                                            class="bi bi-arrow-left-square me-2" style="font-size: 20px;"></i>Kembali
                                        Ke
                                        Produk Anda</a>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">
                                        Submit</button>

                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>