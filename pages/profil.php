<?php 

include("../partials/config.php");
include("../partials/sessions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Profil";
		include("../partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="../assets/style.css">
</head>
<body>

	<?php include("../partials/navbar.php") ?>
	<?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			if($_GET['status']){
				echo '
					<div class="text-center alert alert-success alert-dismissible fade show" role="alert" id="alert">
						<strong>'.str_replace('-', ' ', $_GET['status']).'</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				';
			}
		?>
	</p>
	<?php endif; ?>
	<div class="wrapper py-5">
		<section id="user">
			<div class="container">

				<h1><?= $user['nim'].' | '.$user['nama'] ?></h1>
				<p>Program study: <?= $user['program_studi'] ?></p>
				<p>TTL: <?= $user['tempat_lahir'].', '. $user['tanggal_lahir'] ?></p>
				<p>Jenis Kelamin: <?= (($user['jenis_kelamin']=='L')?'laki-laki':"perempuan") ?></p>
				<p>Agama: <?= $user['agama'] ?></p>
				<p>Alamat: <?= $user['alamat'] ?></p>
				<p>Kota: <?= $user['kota'] ?></p>
				<p>Provinsi: <?= $user['provinsi'] ?></p>
				<p>Jabatan: <?= $user['peran'] ?></p>
				
			</div>
		</section>
	</div>

	<?php include("../partials/script.php") ?>

</body>
</html>