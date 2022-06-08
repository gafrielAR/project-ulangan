<?php 

include("../../partials/role_validation.php");

mahasiswa()

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Mahasiswa";
		include("../../partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

	<?php include("../../partials/navbar.php") ?>
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
		<section id="mahasiswa">
			<div class="container">

				<div class="row">
					
					<?php 

						$mahasiswa = $user['id'];

						$sql = "SELECT *
								FROM ujian
								LEFT JOIN mengikuti ON ujian.id = mengikuti.ujian_id
								WHERE mengikuti.mahasiswa_id='$mahasiswa'";
						$query = mysqli_query($db, $sql);
						$i = 1;

						while ($mengikuti = mysqli_fetch_array($query)) {

					?>

					<a href="ujian?id=<?= $mengikuti['id'] ?>" class="menu col-12 col-md-5 col-lg-3 my-4">
						<div class="col-10 rounded shadow rounded text-center p-5">
							<i class="fas fa-file-alt mb-3" style="font-size: 3em"></i>
							<h6 class="text-left"><?= $mengikuti['mata_ujian'] ?></h6>
							<h6 class="text-left"><?= $mengikuti['nama_ujian'] ?></h6>
						</div>
					</a>

					<?php } ?>
					
					<button type="button" class="menu col-12 col-md-5 col-lg-3 my-4 border-0" data-toggle="modal" data-target="#staticBackdrop">
						<div class="col-12 rounded shadow rounded text-center p-5">
							<i class="fas fa-plus" style="font-size: 3em"></i>
							<h2>tambah</h2>
						</div>
					</button>

					<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Masukkan Kode Ujian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="ikut-ujian" method="POST">
										<div class="form-group row">
											<label for="kode_ujian" class="col-sm-2 col-form-label">Kode Ujian</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="kode_ujian" name="kode_ujian" maxlength="10" required>
											</div>
										</div>
										<input type="hidden" name="mahasiswa" value="<?= $user['id'] ?>">

										<input type="submit" name="tambah" value="Tambah" class="btn btn-success">
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>