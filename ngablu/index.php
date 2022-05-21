<?php 

$api_url = "https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json";
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



    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Arti nama</th>
                            <th scope="col">Ayat</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($data as $d ) : ?>
                        <tr>
                            <td><?= $d->name; ?></td>
                            <td><?= $d->name_translations->en; ?></td>
                            <td><?= $d->number_of_ayah; ?></td>
                            <td><a href="detail.php?id=<?= $d->number_of_surah; ?>">Detail Surat</a></td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>