<?php session_start(); ?>
<?php include "koneksi.php"; 

// jika tidak ada session pelanggan maka halaman riwayat tidak dapat diakses dan dilarikan ke halaman login

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='login.php'</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Riwayat belanja</title>
			<link rel="stylesheet" href="admin/assets/css/bootstrap.css">

</head>
<body>
	<nav class="navbar navbar-default" align="center">
  		<div class="container">
    		<div class="navbar-header">
       			<!-- <img alt="Brand" src="admin/assets/img/logo1.png"> -->
   			</div>
  		</div>
	</nav>
		
	<?php include "navbar.php"; ?>

	<section class="riwayat">
		<div class="container">
			<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>nomor</th>
						<th>tanggal</th>
						<th>status</th>
						<th>total</th>
						<th>opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
					while( $pecah = $ambil->fetch_assoc()){
					 ?>
					
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
						<td>
							<?php echo $pecah["status_pembelian"]; ?>
							<br>
							<?php if (!empty($pecah["resi_pengiriman"])): ?>
							Resi : <?php echo $pecah["resi_pengiriman"]; ?>		
							<?php endif ?>	
						</td>
						<td>Rp <?php echo number_format($pecah["total_pembelian"]); ?></td>
						<td>
							<a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">nota</a>
							<?php if ($pecah["status_pembelian"]=="pending"): ?>
								
							<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">pembayaran</a>
							<?php else: ?>
								<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-warning">Lihat Pembayaran</a>
							<?php endif ?>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>