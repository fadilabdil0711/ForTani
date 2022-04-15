<?php
session_start() ;
include 'koneksi.php';
 ?>

 <!DOCTYPE html>
<html>
	<head>
		<title>
			ForTani
		</title>
			<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
		<style>
			#judul,{
				position: relative;
				padding-left: 300px;
				padding-top: 100px;
				padding-right: 250px;
					}
			body {
				background: url('admin/assets/img/Frame 2.png') no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				overflow-x: hidden;
				font-family: 'Roboto', sans-serif;
				font-size: 16px;
        }
		</style>
	</head>
<body>
	<?php include "navbar.php"; ?>
	<?php include "koneksi.php"; ?>

	<div class="container p-3">
		<div>
			<h1>Produk Terbaru</h1>
		</div>
		<div class="row">

			<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>

			<?php while ($perproduk=$ambil->fetch_assoc()){ ?>

			<div class="col-sm-6 col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" width="150">
						<div class="caption">
						<h3><?php echo $perproduk['nama_produk'] ?></h3>
						<h5> Rp <?php echo number_format ($perproduk['harga_produk']) ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
						</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>

	</body>
</html>