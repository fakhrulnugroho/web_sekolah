<?php 

session_start();

$active = 'dashboard';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Admin - SMK Negeri 1 Wanareja</title>
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header bg-primary text-white">Login!</div>
					<div class="card-body">
						<?php if(isset($_SESSION['sukses'])) : ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Berhasil!</strong> <?= $_SESSION['sukses'] ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php unset($_SESSION['sukses']) ?>
						<?php elseif(isset($_SESSION['gagal'])) : ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Gagal!</strong> <?= $_SESSION['gagal'] ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php unset($_SESSION['gagal']) ?>
						<?php endif; ?>
						<form action="proses_login.php" method="POST">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="username" autocomplete="off" required="required">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password" autocomplete="off" required="required">
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="btn btn-sm btn-block btn-primary">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
</body>
</html>