<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM konten
WHERE
judul LIKE '%$keyword%' OR
kata LIKE '%$keyword%' 
";
$orang = query($query);


if (empty($orang)) {
    echo "data tidak ditemukan";
}

?>


<div class="row">
    <?php $i = 1; ?>
    <?php foreach ($orang as $row) : ?>
        <div class="col">



            <div class="card mt-5" style="width: 18rem">
                <img src="img/<?= $row["gambar"]; ?>" class="card-img-top" alt="..." />
                <div class="card-body">
                    <p hidden> <?= $i; ?> </p>
                    <h5 class="card-title"><?= $row["judul"]; ?></h5>
                    <p class="card-text"><?= $row["kata"]; ?></p>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" class=" btn btn-danger" onclick="return confirm('yakin?');">Hapus Data</a>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-success">Ubah Data</a>
                </div>
            </div>

        </div>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>