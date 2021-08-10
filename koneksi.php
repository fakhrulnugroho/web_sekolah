<?php 
session_start();

$db_host = getenv("SEKOLAH_DB_HOST");
$db_user = getenv("SEKOLAH_DB_USER");
$db_pass = getenv("SEKOLAH_DB_PASS");
$db_name = getenv("SEKOLAH_DB_NAME");

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('gagal konek');

?>