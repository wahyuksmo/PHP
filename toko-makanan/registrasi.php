<?php include('include/header.php') ?>

<?php 

if (isset($_POST["submit"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Akun anda berhasil di daftarkan',
            showConfirmButton: false,
            focusConfirm: false,
          })</script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>


<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Silahkan Registrasi </h1>
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
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Masukan email anda ....">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Masukan nama anda...">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Telepon Pelanggan</label>
                        <input type="number" style="width: 400px;" min="1" class="form-control" id="exampleInputPassword1" name="telepon" placeholder="Masukan telepon anda...">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat Pelanggan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="Masukan alamat anda..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-warning" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('include/footer.php') ?>