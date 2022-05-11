<?php
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoberita = $pecah['gambar'];
if (file_exists("../foto_berita/$fotoberita"))
{
	unlink("../foto_berita/$fotoberita");
}

$koneksi->query("DELETE FROM berita WHERE id_berita='$_GET[id]'");

echo "<script>alert ('berita telah terhapus'); </script>";
echo "<script>location='index.php?halaman=daftar_berita'; </script>";
?>