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
		$title = "| Peserta Ujian ".$ujian['nama_ujian']." | ".$ujian['mata_ujian'];
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

				<h1><?= $ujian['nama_ujian'].' | '.$ujian['mata_ujian'] ?></h1>
				<p>Program study: <?= $ujian['program_studi'] ?></p>
				<p>SKS: <?= $ujian['sks'] ?></p>
				<p>KODE: <?= $ujian['kode_ujian'] ?></p>
				<p>Biaya Ujian: Rp<?= number_format($ujian['biaya_ujian']) ?></p>

				<table class="table table-borderless">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama Peserta</th>
							<th>Hari Ujian</th>
							<th>Jam Ujian</th>
							<th>Kelas</th>
							<th>Nilai</th>
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
										<td>'.$mengikuti['nim'].'</td>
										<td>'.$mengikuti['nama'].'</td>
										<td>'.date('l, d-m-Y', strtotime($mengikuti['hari_ujian'])).'</td>
										<td>'.date('H:i', strtotime($mengikuti['jam_ujian'])).'</td>
										<td>'.$mengikuti['kelas'].'</td>
										<td>'.$mengikuti['nilai_angka'].' | '.$mengikuti['nilai_huruf'].'</td>
										<td>
											<div class="d-flex justify-content-end">
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