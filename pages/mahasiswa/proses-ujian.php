<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

	// ambil data dari formulir
	$hardware		= $_POST['hardware'];
	$software		= $_POST['software'];

	if ($hardware == 'hardware' && $software == 'software') {
		$nilai = '100';
	} elseif ($hardware == 'hardware' && $software == 'hardware' || $hardware == 'software' && $software == 'software') {
		$nilai = '50';
	} elseif ($hardware == 'software' && $software == 'hardware') {
		$nilai = '0';
	}

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

	$day			= date("Y-m-d");
	$hour			= date("h:i:s");
	$kelas			= $_POST['kelas'];
	$id 			= $_POST['id'];

	// echo $kelas;

	// buat query
	$sql = "UPDATE `mengikuti` SET hari_ujian='$day', jam_ujian='$hour', kelas='$kelas', nilai_angka='$nilai', nilai_huruf='$nilai_huruf' WHERE id=$id;";
	$query = mysqli_query($db, $sql);

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../mahasiswa?status=berhasil-menyimpan');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: ../mahasiswa?status=gagal-menyimpan');
	}

	// echo $sql;

} else {
	// echo 'gagal';
	die("Akses dilarang...");
}

?>
