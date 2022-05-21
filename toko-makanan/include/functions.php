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

function registrasi($data) {
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_escape_string($conn ,$data["password"]);
    $password2 = mysqli_escape_string($conn, $data["password2"]);
    $nama = htmlspecialchars($data["nama"]);
    $tlp = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);

    if (empty(trim($email))) {
        return false;
    }

    $result = mysqli_query($conn, "SELECT email_pelanggan FROM pelanggan WHERE email_pelanggan = '$email'");

    if (mysqli_fetch_assoc($result)) {
        
echo "<script>Swal.fire({
    icon: 'error',
    title: 'Username sudah terdaftar',
    showConfirmButton: false,
    focusConfirm: false,
  })</script>";
        return false;
    }   

    if ($password !== $password2) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Password tidak sama',
            showConfirmButton: false,
            focusConfirm: false,
          })</script>";
        return false;
    }


    mysqli_query($conn ,"INSERT INTO pelanggan(email_pelanggan, password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
    VALUES('$email','$password','$nama','$tlp','$alamat')");

return mysqli_affected_rows($conn);

}


?>