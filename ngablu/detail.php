<?php

$id = $_GET["id"];

$api_url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/surah/$id.json";
$data = json_decode(file_get_contents($api_url));




?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>



    <nav class="navbar navbar-expand fixed-top -lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top ms-auto">
        </div>
    </nav>


    <section class="inti">
    <div class="container">
        <div class="row">
            <?php foreach ($data->verses as $d) : ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d->text; ?></h5>
                            <p><span class="ayat"><?= $d->number; ?></span> <?= $d->translation_id; ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>


<style>

.inti {
    margin-top: 100px;
}

.inti .card {
    border: none;
    border-bottom: 2px  solid black;
    margin-top: 10px;
}

    .inti h5 {
        font-size: 29px;
        float: right;
    }

    .inti p {
        margin-top: 70px;
    }
</style>