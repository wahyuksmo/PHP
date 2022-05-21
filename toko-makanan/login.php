<?php include('include/header.php') ?>
<?php  

$conn = new mysqli("localhost","root","","toko-makanan");


if(isset($_POST["submit"])) {

   $username = htmlspecialchars($_POST["email"]);
   $password = mysqli_escape_string($conn, $_POST["password"]);

  $result =  $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan ='$username' AND password_pelanggan = '$password'");


  $row = $result->num_rows;

  if($row == 1) {

    $akun = $result->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('Anda Sukses login');</script>";
    
    //jika sudah belanja
    if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
    echo "<script>location='checkout.php';</script>";
}else {
    echo "<script>location='index.php';</script>";
}

  }else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Anda Gagal Login',
        showConfirmButton: false,
        focusConfirm: false,
        footer: '<a href=login.php style=color:#0099CC;text-decoration:none;>Silahkan Login Kembali</a>'
      })</script>";
  }

}



?>


<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Silahkan Login </h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<section class="login py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-warning" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('include/footer.php') ?>