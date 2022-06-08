<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

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

	// buat query
	$sql = "INSERT INTO mahasiswa (nim, nama, program_studi, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, kota, provinsi)
	VALUE ('$nim', '$nama', '$prodi', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$kota', '$provinsi')";
	$query = mysqli_query($db, $sql);

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../mahasiswa?status=berhasil-menambahkan');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: ../mahasiswa?status=gagal-menambahkan');
	}

} else {
	die("Akses dilarang...");
}

?>
