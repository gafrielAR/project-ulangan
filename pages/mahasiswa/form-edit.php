<?php 

include("../../partials/config.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM mahasiswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$mahasiswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Ubah data Mahasiswa";
		include("../../partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

	<?php include("../../partials/navbar.php") ?>

	<div class="wrapper py-5">
		<section id="mahasiswa">
			<div class="container">

			<form action="proses-edit.php" method="POST">
				<div class="form-group row">
					<label for="nim" class="col-sm-2 col-form-label">NIM</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $mahasiswa['nim'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="nama" value="<?php echo $mahasiswa['nama'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="prodi" value="<?php echo $mahasiswa['program_studi'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-10">
						<select class="custom-select" name="jenis_kelamin" id="" >
							<option value="" selected disabled>-- Pilih --</option>
							<option <?php echo ($mahasiswa['jenis_kelamin'] == 'L') ? "selected": "" ?> value="L">Laki-Laki</option>
							<option <?php echo ($mahasiswa['jenis_kelamin'] == 'P') ? "selected": "" ?> value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
				<label for="agama" class="col-sm-2 col-form-label">Agama</label>
					<div class="col-sm-10">
						<select class="custom-select" name="agama" id="" >
							<option value="" selected disabled>-- Pilih --</option>
							<option  <?php echo ($mahasiswa['agama'] == 'islam') ? "selected": "" ?> value="islam">Islam</option>
							<option  <?php echo ($mahasiswa['agama'] == 'kristen') ? "selected": "" ?> value="kristen">Kristen</option>
							<option  <?php echo ($mahasiswa['agama'] == 'hindu') ? "selected": "" ?> value="hindu">Hindu</option>
							<option  <?php echo ($mahasiswa['agama'] == 'budha') ? "selected": "" ?> value="budha">Budha</option>
							<option  <?php echo ($mahasiswa['agama'] == 'atheis') ? "selected": "" ?> value="atheis">Atheis</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-10">
						<textarea id="" name="alamat" cols="" rows="5" class="form-control"><?php echo $mahasiswa['alamat'] ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="kota" class="col-sm-2 col-form-label">Kota</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="kota" value="<?php echo $mahasiswa['kota'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="provinsi" value="<?php echo $mahasiswa['provinsi'] ?>">
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $mahasiswa['id'] ?>">
				<div class="d-flex justify-content-end">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				</div>
			</form>
				</br>
				<a href="index.php" class="d-flex justify-content-end">
					<but[ton class="btn btn-secondary">Batal</button>
				</a>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>