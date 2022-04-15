<?php
$koneksi = new mysqli ("localhost","root","","toko");

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
