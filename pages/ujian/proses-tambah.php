<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

	// ambil data dari formulir
	$mata_ujian		= $_POST['mata_ujian'];
	$nama_ujian		= $_POST['nama_ujian'];
	$prodi 			= $_POST['prodi'];
	$sks 			= $_POST['sks'];
	$biaya_ujian 	= $_POST['biaya_ujian'];
	$dosen 			= $_POST['dosen'];
	$kode 			= substr(md5(microtime()),rand(0,26),3).'-'.substr(md5(microtime()),rand(0,26),3);

	// buat query
	$sql = "INSERT INTO ujian (mata_ujian, nama_ujian, program_studi, sks, biaya_ujian, dosen, kode_ujian)
	VALUE ('$mata_ujian', '$nama_ujian', '$prodi', '$sks', '$biaya_ujian', '$dosen', '$kode')";
	$query = mysqli_query($db, $sql);

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../ujian?status=berhasil-menambahkan');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: ../ujian?status=gagal-menambahkan');
	}

	// echo $sql;

} else {
	// echo 'gagal';
	die("Akses dilarang...");
}

?>
