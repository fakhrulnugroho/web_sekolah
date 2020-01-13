<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
$query = mysqli_query($koneksi, "UPDATE tbl_kategori_artikel SET nama_kategori = '$nama_kategori' WHERE id = $id");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Diubah!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Diubah!';
	header('Location: index.php');
}

?>