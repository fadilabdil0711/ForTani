<?php 

session_start();
include 'koneksi.php';
$id_pembelian=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembayaran.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

//jika belum ada pembayaran
if (empty($detbay)) 
{
	echo "<script>alert('belum ada pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
}

//jika pelanggan yang login tidak sesuai dengan yang bayar

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) 
{
	echo "<script>alert('anda tidak berhak')</script>";
	echo "<script>location='riwayat.php';</script>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>lihat Pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container">
		<center><h2>Lihat Pembayaran</h2></center>
		<div>
			<div class="col-md-3">
				<table class="table table-striped">
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay["nama"] ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay["bank"] ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $detbay["tanggal"] ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo $detbay["jumlah"] ?></td>
					</tr>
					<!-- <tr>
						<th>Bukti Pembayaran</th>
						<td><img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" width=200%></td>
					</tr> -->
				</table>
			</div>
		<div class="col-md-3">
			<img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
		</div>
		</div>
	</div>
</body>
</html>