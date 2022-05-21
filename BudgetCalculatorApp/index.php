<?php
session_start();
error_reporting(0);

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_user = $_SESSION["user"]["id_user"];
$nomor = 1;




?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>Budget App</title>
</head>

<body>

    <section class="vh-200" style="background-color: #508bfc;">
        <div class="container py-4">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 15px;">

                        <div class="container p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="bi bi-currency-dollar d-flex" style="font-size: 49px; color:#ffcb80;">
                                                <h3 class="mt-3">Selamat Datang <strong><?= $_SESSION["user"]["nama"]  ?></strong></h3>
                                            </i>
                                            <p class="card-subtitle mb-2 mt-3 text-muted">Atur pengeluaran anda sepintar mungkin</p>
                                           
                                        </div>
                                    </div>
                                </div>
                                 <div class="col">
                                 <a href="logout.php" class="btn btn-sm btn-danger rounded-pill float-end" onclick="return confirm('Yakin')"><i class="bi bi-box-arrow-left me-2" style="font-size: 15px;"></i>Logout</a>
                                 </div>
                            </div>
                        </div>

                        <div class="container ms-4">
                         <a href="income.php" class="btn btn-sm btn-success"><i class="bi bi-clipboard-plus me-2" style="font-size: 20px;"></i>Isi pendapatan anda</a>
                          <a href="tambah.php" class="btn btn-sm btn-primary btn-tambah"><i class="bi bi-clipboard-minus me-2" style="font-size: 20px;"></i>Isi pengeluaran anda</a>
                        </div>
                     
                        <div class="container p-5">



                            <div class="row justify-content-center">

                                <div class="col-md-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h6 class="">Pendapatan</h6>
                                            <h3 class="text-right mt-4"><i class="fas fa-file-invoice-dollar float-end mt-2"></i><span>Rp. <?= number_format($incomeAwal) ?></span></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Dompet Anda Sekarang</h6>
                                            <h3 class="text-right mt-4"><i class="fas fa-wallet float-end mt-2"></i><span>Rp. <?= number_format($income) ?></span></h2>
                                        </div>

                                    </div>
                                    <div id="emailHelp" class="form-text text-center mb-4" style="margin-top:-19px;">Dompet ini adalah pendapatan anda dikurang pengeluaran anda.</div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Pengeluaran</h6>
                                            <h3 class="text-right mt-4"><i class="fas fa-search-dollar float-end mt-2"></i><span>Rp. <?= number_format($total) ?> </span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-5">
                                    <div class="table-responsive">
                                        <table class="table text-center table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Pengeluaran</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $result = $conn->query("SELECT * FROM budget WHERE id_user ='$id_user'");
                                                while ($row = $result->fetch_assoc()) {
                                                ?>
                                                
                                                    <tr>
                                                        <th scope="row"><?= $nomor ?></th>
                                                        <td><?= $row["nama"] ?></td>
                                                        <td>Rp. <?= number_format($row["pengeluaran"]) ?></td>
                                                        <td>
                                                            <a href="edit.php?id=<?= $row["id_budget"]; ?>" class="btn btn-sm btn-success rounded-pill"><i class="bi bi-eyedropper me-1"></i>Edit</a>
                                                            <a href="hapus.php?id=<?= $row["id_budget"]; ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Yakin')" ><i class="bi bi-trash3 me-1"></i>Hapus</a>
                                                        </td> 
                                                    </tr>
                                                <?php $nomor++;
                                                } ?>
                                            </tbody>
                                        </table>
                                      
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }




    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 20px;
    }

    .order-card i {
        font-size: 26px;
    }

    .btn-tambah {
        margin-top: 30px;
    }

    @media (min-width: 992px) { 


   .btn-tambah {
       margin-top: 0;
   }

    }

    @media (min-width: 500px) { 


.btn-tambah {
    margin-top: 0;
}

 }

</style>