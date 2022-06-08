<?php include("../../partials/config.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Tambah Peserta Ujian";
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
					<label for="peserta_ujian" class="col-sm-2 col-form-label">Peserta Ujian</label>
					<div class="col-sm-10">
						<select name="peserta_ujian" id="peserta_ujian" class="form-control">
							<option value="" selected disabled>-- Pilih Peserta --</option>
							<?php
								$sql = "SELECT * FROM mahasiswa";
								$query = mysqli_query($db, $sql);
								
								while ($mahasiswa = mysqli_fetch_assoc($query)) {
									echo '
										<option value="'.$mahasiswa['id'].'">'.$mahasiswa['nama'].'</option>
									';
								}
	
							?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="daftar_ujian" class="col-sm-2 col-form-label">Nama Ujian</label>
					<div class="col-sm-10">
						<select name="daftar_ujian" id="daftar_ujian" class="form-control">
						<option value="" selected disabled>-- Pilih Ujian --</option>
							<?php
								$sql = "SELECT * FROM ujian";
								$query = mysqli_query($db, $sql);
								
								while ($ujian = mysqli_fetch_assoc($query)) {
									echo '
										<option value="'.$ujian['id'].'">'.$ujian['mata_ujian'].' | '.$ujian['nama_ujian'].'</option>
									';
								}
	
							?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="hari_ujian" class="col-sm-2 col-form-label">Hari Ujian</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="hari_ujian" name="hari_ujian" maxlength="45" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="jam_ujian" class="col-sm-2 col-form-label">Jam Ujian</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" id="jam_ujian" name="jam_ujian"maxlength="11" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="kelas" name="kelas"maxlength="11" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nilai" name="nilai"maxlength="11" required>
					</div>
				</div>
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