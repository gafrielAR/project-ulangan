<?php

include("partials/config.php");
include("partials/sessions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$title = "";
		include("partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>

	<?php include("partials/navbar.php") ?>

	<?php
		if(isset($_GET['status'])){
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

	<div class="wrapper py-5">

		<section id="main-menu">
			<div class="container">
				<div class="row justify-content-between">

					<?php
					
						if ($user['peran'] == 'dosen') {
							echo '
								<a href="pages/ujian" class="menu col-12 col-md-5 text-center p-5 border shadow rounded px-1">
									<i class="fas fa-file-alt" style="font-size: 3em"></i>
									<h2>UJIAN</h2>
								</a>
							';
						} elseif ($user['peran'] == 'mahasiswa') {
							echo '
								<a href="pages/mahasiswa" class="menu col-12 col-md-5 text-center p-5 border shadow rounded px-1">
									<i class="fas fa-user-graduate" style="font-size: 3em"></i>
									<h2>MAHASIWA</h2>
								</a>
							';
						} else {
							echo '
								<a href="pages/ujian" class="menu col-12 col-md-5 text-center p-5 border shadow rounded px-1">
									<i class="fas fa-file-alt" style="font-size: 3em"></i>
									<h2>UJIAN</h2>
								</a>

								<a href="pages/mahasiswa" class="menu col-12 col-md-5 text-center p-5 border shadow rounded px-1">
									<i class="fas fa-user-graduate" style="font-size: 3em"></i>
									<h2>MAHASIWA</h2>
								</a>
							';
						}
					
					?>

				</div>
			</div>
		</section>

	</div>

	<?php include("partials/script.php") ?>

</body>
</html>