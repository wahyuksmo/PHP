<?php

$api_url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";
$data = json_decode(file_get_contents($api_url));



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top ms-auto">
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <h4>Quran Digital</h4>
                <h5>Daftar Surah</h5>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">


            <?php foreach ($data as $d) :  ?>
                <div class="col-12 col-md-6 col-lg-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><span class="me-3"><?= $d->number_of_surah; ?></span><?= $d->name; ?> <span>(<?= $d->name_translations->ar; ?>)</span></h5>
                            <span class="" style="font-style: italic;">"<?= $d->name_translations->id; ?>"</span>
                            <p class="mt-2"><?= $d->number_of_ayah; ?> Ayat | <?= $d->type; ?></p>
                            <a href="detail.php?id=<?= $d->number_of_surah; ?>" class="btn btn-primary">Baca</a>
                            <a href="#" class="btn btn-success">Tafsir</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>