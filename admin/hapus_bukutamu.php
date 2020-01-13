<?php 


if(!isset($_GET['id']) || $_GET['id'] == '') header('Location: index.php');

require_once '../koneksi.php';
require_once 'cek_session.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_bukutamu WHERE id = {$id}");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';
	header('Location: bukutamu.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: bukutamu.php');
}