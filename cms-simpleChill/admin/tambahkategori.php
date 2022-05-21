<?php 
  if (isset($_POST["save"])) {

    if (tambahKategori($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php?halaman=kategori';
        </script>
    ";
       
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php?halaman=kategori';
        </script>
    ";
    }
}


?>

<section id="basic-horizontal-layouts">
    <div class="row match-height ">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambahkan Kategori Anda</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST">
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Kategori</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="kategori"
                                            placeholder="Kategori...">
                                    </div>

                                    <div class="col-md-6 mt-4">

                                        <a href="index.php?halaman=kategori" class="btn btn-sm btn-success me-1 mb-1"><i
                                                class="bi bi-arrow-left-square me-2"
                                                style="font-size: 20px;"></i>Kembali
                                            Ke
                                            Kategori Anda</a>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                            name="save">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>