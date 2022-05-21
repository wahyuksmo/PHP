<?php 

$conn = mysqli_connect("localhost", "root", "", "budget-baru");



function registrasi($data) {
    global $conn;

    $nama = htmlspecialchars($data["name"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password1"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if (empty(trim($email))) {
        return false;
    }

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$email'");

    $ambilNama = mysqli_query($conn, "SELECT nama FROM user WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
        return false;
    }

    if (mysqli_fetch_assoc($ambilNama)) {
        echo "<script>
				alert('Nama sudah terdaftar!')
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




    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama','$email', '$password')");

    return mysqli_affected_rows($conn);
}


?>