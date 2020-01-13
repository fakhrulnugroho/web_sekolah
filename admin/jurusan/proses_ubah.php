<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$nama_jurusan = mysqli_real_escape_string($koneksi, $_POST['nama_jurusan']);
$kaprodi = mysqli_real_escape_string($koneksi, $_POST['kaprodi']);
$query = mysqli_query($koneksi, "UPDATE tbl_jurusan SET nama_jurusan = '$nama_jurusan', ka_prodi = '$kaprodi' WHERE id = $id");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Diubah!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Diubah!';
	header('Location: index.php');
}

?>