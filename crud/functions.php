<?php

$conn = mysqli_connect("localhost", "root", "", "crud");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $kata = htmlspecialchars($data["kata"]);
    $gambar = upload();


    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO konten 
                         VALUES
                ('','$judul', '$kata', '$gambar') 
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM konten WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $kata = htmlspecialchars($data["kata"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);


    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE konten SET    
                judul = '$judul',
                kata = '$kata',
                gambar = '$gambar'
            WHERE id = $id
    ";




    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function cari($keyword)
{
    $query = "SELECT * FROM konten
				WHERE
			  judul LIKE '%$keyword%' OR
			  kata LIKE '%$keyword%' 
			";
    return query($query);
}



function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if (empty(trim($username))) {
        return false;
    }

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }



    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
