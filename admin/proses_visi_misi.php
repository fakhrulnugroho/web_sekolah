<?php 

require_once '../koneksi.php';
require_once 'cek_session.php';
$visi_misi = mysqli_real_escape_string($koneksi, isset($_POST['visi_misi']) ? $_POST['visi_misi'] : '');
$query = mysqli_query($koneksi, "UPDATE tbl_visi_misi SET visi_misi = '$visi_misi' WHERE id = 1");

if($query){
	$_SESSION['sukses'] = 'Visi Misi Berhasil Diubah!';
	header('Location: visi_misi.php');
} else {
	$_SESSION['gagal'] = 'Visi Misi Gagal Diubah!';
	header('Location: visi_misi.php');
}