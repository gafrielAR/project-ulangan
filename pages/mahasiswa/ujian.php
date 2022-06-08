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

			<form action="proses-ujian.php" method="POST">

				<h3>keyboard Termasuk Dalam Komponen ...?</h3>
				<input type="radio" id="hardware" name="hardware" value="hardware">
				<label for="hardware">Hardware</label><br>
				<input type="radio" id="software" name="hardware" value="software">
				<label for="software">Software</label><br>

				<br>

				<h3>MS WORD Termasuk Dalam Komponen ...?</h3>
				<input type="radio" id="hardware" name="software" value="hardware">
				<label for="hardware">Hardware</label><br>
				<input type="radio" id="software" name="software" value="software">
				<label for="software">Software</label><br>
				
				<br>

				<div class="col-6 form-group row">
					<label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas..." required>
					</div>
				</div>
				
				<br>

				<input type="hidden" name="id" value="<?php echo $mengikuti['id'] ?>">
				<div class="d-flex">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
				</div>
			</form>
				</br>
				<a href="index.php" class="d-flex">
					<but[ton class="btn btn-secondary">Batal</button>
				</a>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>