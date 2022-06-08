<?php

include("../../partials/config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])) {

	$id_ujian		= $_POST['kode_ujian'];
	$ujian 			= "SELECT * FROM ujian WHERE kode_ujian='$id_ujian'";
	$query_ujian	= mysqli_query($db, $ujian);
	$data_ujian 	= mysqli_fetch_array($query_ujian);

	// ambil data dari formulir
	$peserta_ujian	= $_POST['mahasiswa'];
	$daftar_ujian	= $data_ujian['id'];

	$day			= date("Y-m-d");
	$hour			= date("h:i:s");

	// buat query
	$sql = "INSERT INTO mengikuti (mahasiswa_id, ujian_id, hari_ujian, jam_ujian)
	VALUE ('$peserta_ujian', '$daftar_ujian', '$day', '$hour')";
	// echo $sql;

	$query = mysqli_query($db, $sql);

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
