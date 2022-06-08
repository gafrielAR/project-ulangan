<?php 

include("../../partials/role_validation.php");

dosen()

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Tambah Ujian";
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

			<form action="proses-tambah.php" method="POST">
				<div class="form-group row">
					<label for="mata_ujian" class="col-sm-2 col-form-label">Mata Ujian</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="mata_ujian" name="mata_ujian" maxlength="10" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_ujian" class="col-sm-2 col-form-label">Nama Ujian</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama_ujian" name="nama_ujian" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="prodi" name="prodi" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="sks" class="col-sm-2 col-form-label">SKS</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="sks" name="sks" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="biaya_ujian" class="col-sm-2 col-form-label">Biaya Ujian</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="biaya_ujian" name="biaya_ujian"maxlength="11" required>
					</div>
				</div>

				<input type="hidden" name="dosen" value="<?= $user['nama'] ?>">
				
				<div class="d-flex justify-content-end">
					<input type="submit" name="tambah" value="Tambah" class="btn btn-success">
				</div>
			</form>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>