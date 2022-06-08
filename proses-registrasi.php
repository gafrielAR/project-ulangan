<?php

include("partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['register'])){

	// ambil data dari formulir
	$email 			= $_POST['email'];
	$password 		= hash('md5', $_POST['password']);
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
	$status 		= $_POST['status'];

	// Validate Data
	$emailValidation = "SELECT * FROM mahasiswa WHERE email='$email'";

	$emailQuery = mysqli_query($db, $emailValidation);

	if(mysqli_num_rows($emailQuery) >= 1) {
		header('location: register?status=email-sudah-ada');
	} else {
		// buat query
		$sql = "INSERT INTO mahasiswa (email, password, nim, nama, program_studi, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, kota, provinsi, peran)
		VALUE ('$email', '$password', '$nim', '$nama', '$prodi', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$kota', '$provinsi', '$status')";
		$query = mysqli_query($db, $sql);
	
		// echo $sql;
	
		// apakah query simpan berhasil?
		if( $query ) {
			// kalau berhasil alihkan ke halaman index.php dengan status=sukses
			header('Location: login?status=berhasil-register');
		} else {
			// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
			header('Location: login?status=gagal-register');
		}
	}

} else {
	die("Akses dilarang...");
}

?>
