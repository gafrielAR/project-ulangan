<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

$id = $_POST['id'];

	// ambil data dari formulir
	$mata_ujian		= $_POST['mata_ujian'];
	$nama_ujian		= $_POST['nama_ujian'];
	$prodi 			= $_POST['prodi'];
	$sks 			= $_POST['sks'];
	$biaya_ujian 	= $_POST['biaya_ujian'];
	
	// buat query update
	$sql = "UPDATE ujian
			SET mata_ujian='$mata_ujian', nama_ujian='$nama_ujian', program_studi='$prodi', sks='$sks', biaya_ujian='$biaya_ujian'
			WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: ../ujian?status=berhasil-merubah');
	} else {
		// kalau gagal tampilkan pesan
		header('Location: ../ujian?status=gagal-merubah');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
