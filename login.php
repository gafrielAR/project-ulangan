<?php 

	session_start();

	include("partials/config.php"); 
	
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($db, $_POST['email']);
			$password = mysqli_real_escape_string($db, hash('md5', $_POST['password']));

			$sql 		= "SELECT * FROM mahasiswa WHERE  email='$username' and password='$password'";
			$query 		= mysqli_query($db, $sql);
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			// echo $sql;

			if ($num_row > 0) {			
				if ($row['peran'] == 'dosen' && $row['terverifikasi'] == 'N') {
					header('location: login?status=akun-belum-terverifikasi');
				} else {
					$_SESSION['id']=$row['id'];
					header('location: index?status=login-berhasil');
				}
			} else {
				header('location: login?status=username-atau-password-salah');
			}
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$title = "| Login";
		include("partials/head.php")
	?>

	<!-- cusom css -->
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>

	<?php
	
	include("partials/navbar.php");
	
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
				<div class="row justify-content-center">

				<div class="menu col-12 col-md-6 p-5 border shadow rounded px-1">
					<?php 
					
						if (isset($_SESSION['id'])) {
							echo '<small class="text-danger">*anda sudah login</small>';
						}
					
					?>
					<form action="" method="POST">
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"required>
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10 d-flex">
								<input type="password" class="form-control col-10" id="password" name="password" minlength="8" required>
								<div class="btn btn-secondary col-2">
									<i class="far fa-eye-slash" id="togglePassword"></i>
								</div>
							</div>
						</div>
						
						<input type="submit" name="login" value="Login" class="btn btn-success">
					</form>
					<br>
					<p><small>Belum Punya Akun? Registrasi <a href="register" class="text-info">disini</a></small></p>
				</div>


				</div>
			</div>
		</section>

	</div>

	<?php include("partials/script.php") ?>

</body>
</html>