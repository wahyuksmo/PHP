<?php 

$id = $_GET["id"];


$surah ="https://raw.githubusercontent.com/penggguna/QuranJSON/master/surah/$id.json";

$data = json_decode(file_get_contents($surah));



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Quran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>


    <nav class="navbar bg-dark navbar-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Qur'An Digital</span>
            <a href=""><i class="bi bi-github"></i></a>
        </div>
    </nav>


    <section class="inti mt-5">

        <div class="container ">
            <div class="row">
                <div class="col">
                    <section class="atas">
                        <h3><?= $data->name; ?> <span class="arab">(<?= $data->name_translations->ar; ?>)</span></h3>
                        <h5><?= $data->number_of_ayah; ?> Ayat <a href="index.php">
                                << Kembali</a>
                        </h5>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="alert alert-info" role="alert">
                                        <p>Murottal by. <?= $data->recitations[0]->name; ?></p>
                                        <audio src="<?= $data->recitations[0]->audio_url; ?>" controls></audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>



            <div class="container">
                <div class="row">


                    <div class="col">
                        <?php foreach($data->verses as $d) : ?>
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title"><?= $d->text; ?></h5>
                                <p class="card-text"><span class="nomor"><?= $d->number; ?></span>
                                    <?= $d->translation_id; ?>
                                </p>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>



                </div>




    </section>




    <section class="footer">

        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Copyright.2020</p>
                </div>
            </div>
        </div>

    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


* {
    font-family: 'Poppins', sans-serif;
}

nav a {
    color: white;
    font-size: 30px;
}

nav a:hover {
    color: whitesmoke;
}




.card {
    border: none;
    border-radius: 0px;
    border-bottom: 2px solid #333;


}


.card h5 {
    float: right;
    font-size: 39px;
}

.card p {
    margin-top: 100px;

}

.atas a {
    text-decoration: none;
    margin-left: 10px;
}


.card .nomor {

    background-color: #041C32;
    color: white;
    padding: 0 10px;
    border-radius: 10px;

}


.footer {

    background-color: #041C32;
    margin-top: 50px;
    color: white;
    text-align: center;
    padding: 10px;

}


@media (max-width: 767.98px) {

    .atas h3 {
        text-align: center;
    }

    .atas h5 {
        text-align: center;
    }

    .atas p {
        text-align: center;
    }

    .atas .alert {
        text-align: center;
    }



}
</style>