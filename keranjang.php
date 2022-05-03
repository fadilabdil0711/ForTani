<?php 
session_start();

include 'koneksi.php';

if (empty($_SESSION['keranjang']))
{
	echo "<script>alert('Silahkan berbelanja Terlebih dahulu')</script>";
	echo "<script>location='pasar.php'</script>";
}
 ?>

 <!DOCTYPE html>

 <html>
 <head>
 	<title>keranjang Belanja</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<style>
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
 	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
        <img alt="Brand" src="admin/assets/img/logo1.png">
      </a>
    </div>
  </div>
</nav>


 	<nav class="navbar navbar-default">
			<div class="container" color="blue">
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
					<!-- <li><a href="pasar.php">Belanja</a></li> -->
					<li class="active"><a href="keranjang.php">Keranjang</a></li>
					<!-- <li><a href="checkout.php">Checkout</a></li> -->

					<?php if (isset($_SESSION["pelanggan"])): ?>
					<li><a href="logout.php">Logout</a></li>

					<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<?php endif ?>
				</ul>
			</div>
		</nav>

<section class='konten'>
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>produk</th>
					<th>harga</th>
					<th>jumlah</th>
					<th>subharga</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
				<!-- menampilkan produk yang akan deperulangkan berdasarkan id_produk-->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;
				/*echo "<pre>";
print_r($pecah);
echo "</pre>";*/
				 ?>
				
					
				
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk'];?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="pasar.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>
<?php /*echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";*/
 ?>
 </body>
 	
 </html>