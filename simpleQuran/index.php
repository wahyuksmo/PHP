<?php 



$quran = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";

$data = json_decode(file_get_contents($quran));



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

        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Daftar Surah</h5>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">

                <?php foreach($data as $d) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><span class="nomor"><?= $d->number_of_surah; ?></span>
                                <?= $d->name; ?> <span class="ar">(<?= $d->name_translations->ar; ?>)</span></h5>
                            <p class="arti">"<?= $d->name_translations->id; ?>"</p>
                            <p><?= $d->number_of_ayah; ?> Ayat | <?= $d->type; ?></p>
                            <a href="detail.php?id=<?= $d->number_of_surah; ?>" class="btn">Baca
                                Surah</a>

                        </div>
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
    border: 1px solid black;
}

.card h5 {
    font-weight: bold;
}

.card .arti {
    margin-top: 30px;
    font-weight: bold;
    font-style: italic;
}

.card .nomor {

    background-color: #041C32;
    padding: 15px;
    margin-right: 10px;
    color: white;
}

.card a {
    background-color: #375475;
    color: white;
}

.footer {

    background-color: #041C32;
    margin-top: 50px;
    color: white;
    text-align: center;
    padding: 10px;

}
</style>