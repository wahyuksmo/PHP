<?php 

$conn = new mysqli("localhost", "root", "", "coba-cms");


function queryData($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>alert('pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('yang anda upload bukan gambar!');</script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../foto_postingan/' . $namaFileBaru);

    return $namaFileBaru;

}


function tambahPostingan($data) {
    global $conn;
    $id_admin = $data["id_admin"];
    $id_kategori = $data["id_kategori"];
    $judul = htmlspecialchars($data["judul"]);
    $prolog = htmlspecialchars($data["prolog"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambar = upload();
    $tanggal = date("Y-m-d");

    if (!$gambar) {
        return false;
    }


    $query = "INSERT INTO posts VALUES
    ('', '$id_kategori', '$id_admin', '$judul','$prolog','$deskripsi', '$gambar', '$tanggal')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    

}

function ubahPosts($data) {
    global $conn;
    $id = $data["id"];
    $id_admin = $data["id_admin"];
    $id_kategori = $data["id_kategori"];
    $judul = htmlspecialchars($data["judul"]);
    $prolog = htmlspecialchars($data["prolog"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE posts SET
    id_kategori = '$id_kategori',
    judul = '$judul',
    prolog = '$prolog',
    deskripsi = '$deskripsi',
    foto = '$gambar'
    WHERE id_posts = $id
";

mysqli_query($conn, $query);
 
return mysqli_affected_rows($conn);


}


function tambahKategori($data) {
    global $conn;
    $kategori = htmlspecialchars($data["kategori"]);

    $query = "INSERT INTO kategori VALUES ('', '$kategori')";
    mysqli_query($conn, $query);
 
return mysqli_affected_rows($conn);

}




?>