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
		$title = "| Peserta Ujian ".$mahasiswa['nim']." | ".$mahasiswa['nama'];
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

				<h1><?= $mahasiswa['nim'].' | '.$mahasiswa['nama'] ?></h1>
				<p>Program study: <?= $mahasiswa['program_studi'] ?></p>
				<p>TTL: <?= $mahasiswa['tempat_lahir'].', '. $mahasiswa['tanggal_lahir'] ?></p>
				<p>Jenis Kelamin: <?= (($mahasiswa['jenis_kelamin']=='L')?'laki-laki':"perempuan") ?></p>
				<p>Agama: <?= $mahasiswa['agama'] ?></p>
				<p>Alamat: <?= $mahasiswa['alamat'] ?></p>
				<p>Kota: <?= $mahasiswa['kota'] ?></p>
				<p>Provinsi: <?= $mahasiswa['provinsi'] ?></p>

				<div class="d-flex justify-content-end">
					<a href="form-tambah" class="btn btn-success">
						<i class="fas fa-plus-circle"></i>
						tambah
					</a>
				</div>
				<table class="table table-borderless">
					<thead>
						<tr>
							<th>No</th>
							<th>Mata Kuliah</th>
							<th>Jenis Tes</th>
							<th>Hari Ujian</th>
							<th>Jam Ujian</th>
							<th>Kelas</th>
							<th>Nilai</th>
							<th>Biaya Tes</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php

							$sql = "SELECT * FROM mahasiswa ST, ujian SB, `mengikuti` STSB WHERE STSB.mahasiswa_id=ST.id AND STSB.ujian_id=SB.id";
							$query = mysqli_query($db, $sql);
							$i = 1;

							while ($mengikuti = mysqli_fetch_array($query)) {
								echo '
									<tr>
										<td>'.$i++.'</td>
										<td>'.$mengikuti['mata_ujian'].'</td>
										<td>'.$mengikuti['nama_ujian'].'</td>
										<td>'.date('l, d-m-Y', strtotime($mengikuti['hari_ujian'])).'</td>
										<td>'.date('H:i', strtotime($mengikuti['jam_ujian'])).'</td>
										<td>'.$mengikuti['kelas'].'</td>
										<td>'.$mengikuti['nilai_angka'].' | '.$mengikuti['nilai_huruf'].'</td>
										<td>Rp'.number_format($mengikuti['biaya_ujian']).'</td>
										<td>
											<div class="d-flex justify-content-end">
												<a href="form-edit.php?id='.$mengikuti['id'].'" class="px-1">
													<button class="btn btn-info">
														<i class="fas fa-edit"></i>
													</button>
												</a>
												<a href="proses-hapus.php?id='.$mengikuti['id'].'" class="px-1">
													<button class="btn btn-danger">
														<i class="fas fa-trash"></i>
													</button>
												</a>
											</div>
										</td>
									</tr>
								';
							}

						?>
					</tbody>
				</table>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>