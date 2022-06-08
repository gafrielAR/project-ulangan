<?php include("partials/config.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$title = "| Login";
		include("partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>

	<?php include("partials/navbar.php") ?>

	<div class="wrapper py-5">

		<section id="main-menu">
				<p class="text-danger">
					<small>
					<?php
						if(isset($_GET['status'])){
							echo '
								<div class="col-12 text-center alert alert-danger alert-dismissible fade show" role="alert" id="alert">
									<strong>'.str_replace('-', ' ', $_GET['status']).'</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							';
						}
					?>
					</small>
				</p>
			<div class="container">
				<div class="row justify-content-center">

				<div class="menu col-12 col-md-10 p-5 border shadow rounded px-1">
					<form action="proses-registrasi.php" method="POST">
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"required>
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10 d-flex">
								<input type="password" class="form-control col-10" id="password" name="password" minlength="8" required>
								<div class="btn btn-secondary col-2">
									<i class="far fa-eye-slash" id="togglePassword"></i>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<label for="nim" class="col-sm-2 col-form-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nim" name="nim" maxlength="10" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="nama" maxlength="45" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="prodi" maxlength="45" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="tempat_lahir" maxlength="45" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="" name="tanggal_lahir" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-10">
								<select class="custom-select" name="jenis_kelamin" id=""  maxlength="2" required>
									<option value="" selected disabled>-- Pilih --</option>
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						
						<div class="form-group row">
						<label for="agama" class="col-sm-2 col-form-label">Agama</label>
							<div class="col-sm-10">
								<select class="custom-select" name="agama" id="" maxlength="45" required>
									<option value="" selected disabled>-- Pilih --</option>
									<option value="islam">Islam</option>
									<option value="kristen">Kristen</option>
									<option value="hindu">Hindu</option>
									<option value="budha">Budha</option>
									<option value="atheis">Atheis</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col-sm-10">
								<textarea id="" name="alamat" cols="" rows="5" class="form-control"  maxlength="45" required></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label for="kota" class="col-sm-2 col-form-label">Kota</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="kota" maxlength="45" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="provinsi" maxlength="45" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="status" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<select class="custom-select" name="status" id="status" maxlength="45" required>
									<option value="mahasiswa" Selected>Mahasiswa</option>
									<option value="dosen">Dosen</option>
								</select>
								<small class="text-danger">*jika anda adalah dosen maka anda harus nenunggu verifikasi sebelum bisa login</small>
							</div>
						</div>

						<div class="d-flex justify-content-end">
							<input type="submit" name="register" value="Tambah" class="btn btn-success">
						</div>
					</form>
					<p><small>Sudah Punya Akun? Login <a href="login" class="text-info">disini</a></small></p>
				</div>

				</div>
			</div>
		</section>

	</div>

	<?php include("partials/script.php") ?>

</body>
</html>