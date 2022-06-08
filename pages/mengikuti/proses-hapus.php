<?php

include("../../partials/config.php");

if( isset($_GET['id']) ){
	
	// ambil id dari query string
	$id = $_GET['id'];
	
	// buat query hapus
	$sql = "DELETE FROM mengikuti WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: ../ujian/index.php?status=berhasil-menghapus');
	} else {
		header('Location: ../ujian/index.php?status=gagal-menghapus');
	}
	
} else {
	die("akses dilarang...");
}

?>
