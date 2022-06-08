<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

$id = $_POST['id'];

	// ambil data dari formulir
	$peserta_ujian	= $_POST['peserta_ujian'];
	$daftar_ujian	= $_POST['daftar_ujian'];
	$hari_ujian		= $_POST['hari_ujian'];
	$jam_ujian		= date('Y-m-d H:i:s', strtotime($_POST['jam_ujian']));
	$kelas 			= $_POST['kelas'];
	$nilai 			= $_POST['nilai'];
	if ($nilai <= 59) {
		$nilai_huruf = 'E';
	} elseif ($nilai <= 69) {
		$nilai_huruf = 'D';
	} elseif ($nilai <= 79) {
		$nilai_huruf = 'C';
	} elseif ($nilai <= 89) {
		$nilai_huruf = 'B';
	} elseif ($nilai <= 100) {
		$nilai_huruf = 'A';
	}
	
	// buat query update
	$sql = "UPDATE mengikuti
			SET mahasiswa_id='$peserta_ujian', ujian_id='$daftar_ujian', hari_ujian='$hari_ujian', jam_ujian='$jam_ujian', kelas='$kelas', nilai_angka='$nilai', nilai_huruf='$nilai_huruf'
			WHERE id=$id";
			// echo $sql;
			
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: ../ujian/index.php?status=berhasil-merubah');
	} else {
		// kalau gagal tampilkan pesan
		header('Location: ../ujian/index.php?status=gagal-merubah');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
