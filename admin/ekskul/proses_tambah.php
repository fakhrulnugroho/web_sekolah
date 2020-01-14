<?php 

if(!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$nama_ekskul = mysqli_real_escape_string($koneksi, isset($_POST['nama_ekskul']) ? $_POST['nama_ekskul'] : '');
$pembina = mysqli_real_escape_string($koneksi, isset($_POST['pembina']) ? $_POST['pembina'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_ekskul (nama_ekskul, pembina) VALUES ('$nama_ekskul', '$pembina')");
if($query){
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: index.php');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: index.php');
}