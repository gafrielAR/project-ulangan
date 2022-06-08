<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

	// ambil data dari formulir
	$peserta_ujian	= $_POST['peserta_ujian'];
	$daftar_ujian	= $_POST['daftar_ujian'];
	$hari_ujian		= $_POST['hari_ujian'];
	$jam_ujian		= $_POST['jam_ujian'];
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

	// buat query
	$sql = "INSERT INTO mengikuti (mahasiswa_id, ujian_id, hari_ujian, jam_ujian, kelas, nilai_angka, nilai_huruf)
	VALUE ('$peserta_ujian', '$daftar_ujian', '$hari_ujian', '$jam_ujian', '$kelas', '$nilai', '$nilai_huruf')";
	$query = mysqli_query($db, $sql);

	// echo $sql;

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=berhasil-menambahkan');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal-menambahkan');
	}

} else {
	die("Akses dilarang...");
}

?>
