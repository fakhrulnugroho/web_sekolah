<?php 

if(!isset($_POST['ubah'])) header('Location: ubah.php');


require_once '../../koneksi.php';
$nama = mysqli_real_escape_string($koneksi, isset($_POST['nama']) ? $_POST['nama'] : '');
$nis = mysqli_real_escape_string($koneksi, isset($_POST['nis']) ? $_POST['nis'] : '');
$jenis_kelamin = mysqli_real_escape_string($koneksi, isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '');
$no_hp = mysqli_real_escape_string($koneksi, isset($_POST['no_hp']) ? $_POST['no_hp'] : '');
$tempat_lahir = mysqli_real_escape_string($koneksi, isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '');
$tanggal_lahir = mysqli_real_escape_string($koneksi, isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '');
$id_jurusan = mysqli_real_escape_string($koneksi, isset($_POST['id_jurusan']) ? $_POST['id_jurusan'] : '');
$alamat = mysqli_real_escape_string($koneksi, isset($_POST['alamat']) ? $_POST['alamat'] : '');
$id = $_GET['id'];

// persiapan upload foto

if($_FILES['foto']['error'] == 0){
	$ekstensi = $_FILES['foto']['name'];
	$ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

	$nama_foto = strtolower($nama);
	$nama_foto = str_replace(' ', '-', $nama_foto) . '.' . $ekstensi;

	$asal = $_FILES['foto']['tmp_name'];
} else {
	// hapus foto sebelumnya
	$query_siswa = mysqli_query($koneksi, "SELECT foto FROM tbl_siswa WHERE id = $id");
	$row = mysqli_fetch_assoc($query_siswa);
	
	$nama_foto = $row['foto'];
}

$tujuan = '../../images/siswa/';
		
if($_FILES['foto']['error'] == 0){
	if($_FILES['foto']['size'] < 1000000){
		if (file_exists('../../images/siswa/' . $nama_foto)) unlink('../../images/siswa/' . $nama_foto);
		if(file_exists('../../images/siswa/' . $nama_foto)) unlink('../../images/siswa/' . $nama_foto);
		move_uploaded_file($asal, $tujuan . $nama_foto) or die('gagal upload foto');

		// ubah data
		$query = mysqli_query($koneksi, "UPDATE tbl_siswa SET nama = '$nama', nis = $nis, jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', foto = '$nama_foto', id_jurusan = $id_jurusan WHERE id = $id") or die(mysqli_error($koneksi));
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
	$query = mysqli_query($koneksi, "UPDATE tbl_siswa SET nama = '$nama', nis = $nis, jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', foto = '$nama_foto', id_jurusan = $id_jurusan WHERE id = $id") or die(mysqli_error($koneksi));

	if($query){
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			header('Location: index.php');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			header('Location: index.php');
		}
}