<?php 

include("../../partials/config.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM mengikuti WHERE id=$id";
$query = mysqli_query($db, $sql);
$mengikuti = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Ubah Detail Ujian";
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
					<label for="peserta_ujian" class="col-sm-2 col-form-label">Peserta Ujian</label>
					<div class="col-sm-10">
						<select name="peserta_ujian" id="peserta_ujian" class="form-control" disabled>
							<option value="" selected disabled>-- Pilih Peserta --</option>
							<?php
								$sql = "SELECT * FROM mahasiswa";
								$query = mysqli_query($db, $sql);
								
								while ($mahasiswa = mysqli_fetch_assoc($query)) {
									echo '
										<option value="'.$mahasiswa['id'].'" '.(($mahasiswa['id']==$mengikuti['mahasiswa_id'])?'selected':"").'>'.$mahasiswa['nama'].'</option>
									';
								}
	
							?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="daftar_ujian" class="col-sm-2 col-form-label">Nama Ujian</label>
					<div class="col-sm-10">
						<select name="daftar_ujian" id="daftar_ujian" class="form-control" disabled>
						<option value="" selected disabled>-- Pilih Ujian --</option>
							<?php
								$sql = "SELECT * FROM ujian";
								$query = mysqli_query($db, $sql);
								
								while ($ujian = mysqli_fetch_assoc($query)) {
									echo '
										<option value="'.$ujian['id'].'" '.(($ujian['id']==$mengikuti['ujian_id'])?'selected':"").'>'.$ujian['mata_ujian'].' | '.$ujian['nama_ujian'].'</option>
									';
								}
	
							?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="hari_ujian" class="col-sm-2 col-form-label">Hari Ujian</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="hari_ujian" name="hari_ujian" required value="<?= $mengikuti['hari_ujian'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="jam_ujian" class="col-sm-2 col-form-label">Jam Ujian</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="jam_ujian" name="jam_ujian" required value="<?= date('d-m-Y H:i:s', strtotime($mengikuti['jam_ujian'])) ?>" step="1">
					</div>
				</div>
				<div class="form-group row">
					<label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="kelas" name="kelas"maxlength="11" required value="<?= $mengikuti['kelas'] ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="nilai" name="nilai"maxlength="11" required value="<?= $mengikuti['nilai_angka'] ?>">
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $mengikuti['id'] ?>">
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