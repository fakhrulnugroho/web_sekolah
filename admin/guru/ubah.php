<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = $id");
$guru = mysqli_fetch_assoc($query);

$active = 'master'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Guru - SMK Negeri 1 Wanareja</title>
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
								Ubah Guru
							</div>
							<div class="float-right">
								<a href="index.php">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $guru['id'] ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" value="<?= $guru['nama'] ?>" class="form-control" id="nama" placeholder="nama" autocomplete="off" required="required" name="nama">
							</div>
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="number" value="<?= $guru['nip'] ?>" class="form-control" id="nip" placeholder="nip" autocomplete="off" required="required" name="nip">
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="jenis_kelamin">Jenis Kelamin</label>
										<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
											<option value="L" <?= $guru['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki Laki</option>
											<option value="P" <?= $guru['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="no_hp">No HP</label>
										<input type="text" value="<?= $guru['no_hp'] ?>" class="form-control" id="no_hp" placeholder="no hp" autocomplete="off" required="required" name="no_hp">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="tempat_lahir">Tempat Lahir</label>
										<input type="text" value="<?= $guru['tempat_lahir'] ?>" class="form-control" id="tempat_lahir" placeholder="tempat lahir" autocomplete="off" required="required" name="tempat_lahir">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="tanggal_lahir">Tanggal Lahir</label>
										<input type="date" value="<?= $guru['tanggal_lahir'] ?>" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir" autocomplete="off" required="required" name="tanggal_lahir">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="foto">Foto</label>
										<input type="file" class="form-control-file mb-2" id="foto" autocomplete="off" name="foto">
									</div>
									*foto sebelumnya <br>
									<img src="../../images/guru/<?= $guru['foto'] ?>" alt="" width="20%" class="img-thumbnail mt-2">
								</div>
								<div class="col">
									<div class="form-group">
										<label for="mata_pelajaran">Guru Mapel</label>
										<input type="text" value="<?= $guru['mata_pelajaran'] ?>" class="form-control" id="mata_pelajaran" placeholder="mata pelajaran" autocomplete="off" required="required" name="mata_pelajaran">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"><?= $guru['alamat'] ?></textarea>
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
	<script src="../../resources/ckeditor/ckeditor.js"></script>
</body>
</html>