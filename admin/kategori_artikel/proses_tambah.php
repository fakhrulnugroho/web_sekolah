<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$nama_kategori = mysqli_real_escape_string($koneksi, isset($_POST['nama_kategori']) ? $_POST['nama_kategori'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_kategori_artikel (nama_kategori) VALUES ('$nama_kategori')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}