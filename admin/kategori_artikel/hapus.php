<?php 

if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_kategori_artikel WHERE id = {$id}");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: index.php');
}