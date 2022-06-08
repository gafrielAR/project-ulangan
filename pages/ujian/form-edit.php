<?php 

include("../../partials/config.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM ujian WHERE id=$id";
$query = mysqli_query($db, $sql);
$ujian = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Ubah Ujian";
		include("../../partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

	<?php include("../../partials/navbar.php") ?>

	<div class="wrapper py-5">
		<section id="ujian">
			<div class="container">

			<form action="proses-edit.php" method="POST">
				<div class="form-group row">
					<label for="mata_ujian" class="col-sm-2 col-form-label">Mata Ujian</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="mata_ujian" name="mata_ujian" value="<?php echo $ujian['mata_ujian'] ?>" maxlength="10" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_ujian" class="col-sm-2 col-form-label">Nama Ujian</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="nama_ujian" value="<?php echo $ujian['nama_ujian'] ?>" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="prodi" value="<?php echo $ujian['program_studi'] ?>" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="sks" class="col-sm-2 col-form-label">SKS</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="" name="sks" value="<?php echo $ujian['sks'] ?>" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="biaya_ujian" class="col-sm-2 col-form-label">Biaya Ujian</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="" name="biaya_ujian" value="<?php echo $ujian['biaya_ujian'] ?>" maxlength="11z" required>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $ujian['id'] ?>">
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