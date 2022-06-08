<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

$id = $_POST['id'];

	// ambil data dari formulir
	$nim 			= $_POST['nim'];
	$nama 			= $_POST['nama'];
	$prodi 			= $_POST['prodi'];
	$tempat_lahir 	= $_POST['tempat_lahir'];
	$tanggal_lahir 	= $_POST['tanggal_lahir'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$agama 			= $_POST['agama'];
	$alamat 		= $_POST['alamat'];
	$kota 			= $_POST['kota'];
	$provinsi 		= $_POST['provinsi'];
	
	// buat query update
	$sql = "UPDATE mahasiswa
			SET nim='$nim', nama='$nama', program_studi='$prodi', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', kota='$kota', provinsi='$provinsi'
			WHERE id=$id";
	$query = mysqli_query($db, $sql);

	// echo $sql;
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: ../mahasiswa?status=berhasil-merubah');
	} else {
		// kalau gagal tampilkan pesan
		header('Location: ../mahasiswa?status=gagal-merubah');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
