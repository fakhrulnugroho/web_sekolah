<?php
$active = 'master'; 

require_once '../../koneksi.php';
$query = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Jurusan - SMK Negeri 1 Wanareja</title>
	<link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
</head>
<body>
	<?php require_once '../navbar.php'; ?>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<div class="card shadow">
					<div class="card-header">
						<div class="clearfix">
							<div class="float-left">
								Tambah Jurusan
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_tambah.php">
							<div class="form-group">
								<label for="nama_jurusan">Nama Jurusan</label>
								<input type="text" class="form-control" id="nama_jurusan" placeholder="nama jurusan" autocomplete="off" required="required" name="nama_jurusan">
							</div>
							<div class="form-group">
								<label for="kaprodi">Kaprodi</label>
								<select name="kaprodi" id="kaprodi" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query)) : ?>
										<option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
									<?php endwhile; ?>	
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
								<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
								<a href="index.php" class="btn btn-sm btn-secondary">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/bootstrap.min.js"></script>
</body>
</html>