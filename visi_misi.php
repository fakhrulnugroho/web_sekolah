<?php 

require_once 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM tbl_visi_misi WHERE id = 1");
$visi_misi = mysqli_fetch_assoc($query);
$aktif = 'visi_misi'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detail Artikel - SMK Negeri 1 Wanareja</title>
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<img src="resources/images/logo.png" alt="Logo Sekolah" width="70px" class="float-left mr-3">
				<div class="text float-right">
					<span class="smk">SMK Negeri 1 Wanareja</span><br>
					<span class="visi">Mewujudkan SMK Berkarakter, Berkompeten dan Unggul.</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>

		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Visi dan Misi SMK Negeri 1 Wanareja
				</div>
				<div class="artikel">
					<?= $visi_misi['visi_misi'] ?>
				</div>
			</div>
			<?php require_once 'sidebar.php'; ?>
		</div>
		<div class="text-white footer">
			2019 © Copyright by Fakhrul Fanani Nugroho.
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
</body>
</html>