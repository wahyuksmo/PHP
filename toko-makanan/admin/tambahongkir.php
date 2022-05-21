<?php 




    if (isset($_POST["save"])) {
        $kota = htmlspecialchars($_POST["kota"]);
        $tarif = htmlspecialchars($_POST["tarif"]);
    
        $conn->query("INSERT INTO ongkir VALUES ('', '$kota', '$tarif')");
        echo "<script> Swal.fire(
            'Berhasil',
            'Ongkir Berhasil Di Tambahkan',
            'success' )</script>";
    }   
    



?>


<section id="basic-horizontal-layouts">
    <div class="row match-height ">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambahkan Ongkir Produk</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST">
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <label>Nama Kota</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="kota"
                                            placeholder="Kota...">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Tarif</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="first-name" class="form-control" name="tarif" min="1">
                                    </div>

                                    <div class="col-md-6 mt-4">

                                        <a href="index.php?halaman=ongkir" class="btn btn-sm btn-success me-1 mb-1"><i
                                                class="bi bi-arrow-left-square me-2"
                                                style="font-size: 20px;"></i>Kembali
                                            Ke
                                            Data Ongkir</a>
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