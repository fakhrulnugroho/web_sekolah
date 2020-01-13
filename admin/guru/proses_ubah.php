<?php 

if(!isset($_POST['ubah'])) header('Location: ubah.php');


require_once '../../koneksi.php';
$nama = mysqli_real_escape_string($koneksi, isset($_POST['nama']) ? $_POST['nama'] : '');
$nip = mysqli_real_escape_string($koneksi, isset($_POST['nip']) ? $_POST['nip'] : '');
$jenis_kelamin = mysqli_real_escape_string($koneksi, isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '');
$no_hp = mysqli_real_escape_string($koneksi, isset($_POST['no_hp']) ? $_POST['no_hp'] : '');
$tempat_lahir = mysqli_real_escape_string($koneksi, isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '');
$tanggal_lahir = mysqli_real_escape_string($koneksi, isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '');
$mata_pelajaran = mysqli_real_escape_string($koneksi, isset($_POST['mata_pelajaran']) ? $_POST['mata_pelajaran'] : '');
$alamat = mysqli_real_escape_string($koneksi, isset($_POST['alamat']) ? $_POST['alamat'] : '');
$id = $_GET['id'];

// persiapan upload foto

if($_FILES['foto']['error'] == 0){
	$ekstensi = $_FILES['foto']['name'];
	$ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

	$nama_foto = strtolower($judul);
	$nama_foto = str_replace(' ', '-', $nama_foto) . '.' . $ekstensi;

	$asal = $_FILES['foto']['tmp_name'];
} else {
	// hapus foto sebelumnya
	$query_guru = mysqli_query($koneksi, "SELECT foto FROM tbl_guru WHERE id = $id");
	$row = mysqli_fetch_assoc($query_guru);
	
	$nama_foto = $row['foto'];
}

$tujuan = '../../images/guru/';
		
if($_FILES['foto']['error'] == 0){
	if($_FILES['foto']['size'] < 1000000){
		if (file_exists('../../images/guru/' . $nama_foto)) unlink('../../images/guru/' . $nama_foto . '.' . $ekstensi);
		if(file_exists('../../images/guru/' . $row['foto'])) unlink('../../images/guru/' . $row['foto']);
		move_uploaded_file($asal, $tujuan . $nama_foto) or die('gagal upload foto');

		// ubah data
		$query = mysqli_query($koneksi, "UPDATE tbl_guru SET nama = '$nama', nip = $nip, jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', mata_pelajaran = '$mata_pelajaran', alamat = '$alamat', foto = '$nama_foto' WHERE id = $id") or die(mysqli_error($koneksi));
		if($query){
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			header('Location: index.php');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			header('Location: index.php');
		}
	} else {
		$_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
		header('Location: index.php');
	}
} else {
	$query = mysqli_query($koneksi, "UPDATE tbl_guru SET nama = '$nama', nip = $nip, jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', mata_pelajaran = '$mata_pelajaran', alamat = '$alamat', foto = '$nama_foto' WHERE id = $id") or die(mysqli_error($koneksi));

	if($query){
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			header('Location: index.php');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			header('Location: index.php');
		}
}