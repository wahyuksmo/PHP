<?php 


$conn = new mysqli("localhost", "root", "", "toko-makanan");


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
        echo "<script> Swal.fire(
            'Opsss..',
            'Pilih Gambar Terlebih Dahulu',
            'info' )</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> Swal.fire(
            'Opsss..',
            'Pilih Gambar Terlebih Dahulu',
            'danger' )</script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../foto_produk/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambahProduk($data) {

     global $conn;

     $nama = htmlspecialchars($data["nama"]);
     $kategori = $data["id_kategori"];
     $stock = htmlspecialchars($data["stock"]);
     $harga = htmlspecialchars($data["harga"]);
     $deskripsi =htmlspecialchars($data["deskripsi"]);
     $foto = upload();

     if(!$foto) {
        return false;
    }

    $query = "INSERT INTO produk VALUES
    ('', '$kategori', '$nama', '$harga','$stock','$foto', '$deskripsi')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}

function ubahProduk($data) {
    global $conn;
 
    $id = $data["id"];
     $nama = htmlspecialchars($data["nama"]);
      $harga = htmlspecialchars($data["harga"]);
      $stock = htmlspecialchars($data["stock"]);
      $deskripsi = htmlspecialchars($data["deskripsi"]);
      $kategori = $data["id_kategori"];
      $gambarLama =htmlspecialchars($data['gambarLama']);
 
      if ($_FILES['foto']['error'] === 4) {
         $gambar = $gambarLama;
     } else {
         $gambar = upload();
     }
     
 
     $query = "UPDATE produk SET
     id_kategori = '$kategori',
     nama_produk = '$nama',
     harga_produk = '$harga',
     stock_produk = '$stock',
     foto_produk = '$gambar',
     deskripsi_produk = '$deskripsi'
     WHERE id_produk = $id
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