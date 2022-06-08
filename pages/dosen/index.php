<?php 

include("../../partials/role_validation.php");

dosen()

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$title = "| Ujian";
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
					<div class="text-center alert alert-info alert-dismissible fade show" role="alert" id="alert">
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
		<section id="ujian">
			<div class="container">

				<div class="d-flex justify-content-end">
					<a href="form-tambah.php">
						<button class="btn btn-success">
							<i class="fas fa-plus-circle"></i>
							tambah
						</button>
					</a>
				</div>
				
				<table class="table table-borderless">
					<thead>
						<tr>
							<th class="col-1">No</th>
							<th class="col-9">Ujian</th>
							<th class="col-2"></th>
						</tr>
					</thead>
					<tbody>
						<?php

							$dosen = $user['nama'];

							$sql = "SELECT * FROM ujian WHERE dosen='$dosen'";
							$query = mysqli_query($db, $sql);
							$i = 1;

							while ($ujian = mysqli_fetch_array($query)) {
								echo '
									<tr>
										<td>'.$i++.'</td>
										<td>
											<a href="../mengikuti/peserta-ujian.php?id='.$ujian['id'].'">'.$ujian['mata_ujian'].'-'.$ujian['nama_ujian'].'</a>
										</td>
										<td>
											<div class="d-flex justify-content-end">
												<a href="form-edit.php?id='.$ujian['id'].'" class="px-1">
													<button class="btn btn-info">
														<i class="fas fa-edit"></i>
													</button>
												</a>
												<a href="proses-hapus.php?id='.$ujian['id'].'" class="px-1">
													<button class="btn btn-danger">
														<i class="fas fa-trash"></i>
													</button>
												</a>
											</div>
										</td>
									</tr>
								';
							}

						?>
					</tbody>
				</table>
				
			</div>
		</section>
	</div>

	<?php include("../../partials/script.php") ?>

</body>
</html>