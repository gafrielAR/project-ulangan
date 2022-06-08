<?php

include("../../partials/config.php");

if( isset($_GET['id']) ){
	
	// ambil id dari query string
	$id = $_GET['id'];
	
	// buat query hapus
	$sql = "DELETE FROM ujian WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: ../ujian?status=berhasil-menghapus');
	} else {
		header('Location: ../ujian?status=gagal-menghapus');
	}
	
} else {
	die("akses dilarang...");
}

?>
