<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan WHERE id = $id");
$jurusan = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

$active = 'master';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Jurusan - SMK Negeri 1 Wanareja</title>
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
								Ubah Jurusan
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $jurusan['id'] ?>">
							<div class="form-group">
								<label for="nama_jurusan">Nama Jurusan</label>
								<input type="text" value="<?= $jurusan['nama_jurusan'] ?>" class="form-control" id="nama_jurusan" placeholder="nama jurusan" autocomplete="off" required="required" name="nama_jurusan">
							</div>
							<div class="form-group">
								<label for="kaprodi">Kaprodi</label>
								<select name="kaprodi" id="kaprodi" class="form-control">
									<?php while($row = mysqli_fetch_assoc($query_guru)) : ?>
										<option value="<?= $row['id'] ?>" <?= $jurusan['ka_prodi'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
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