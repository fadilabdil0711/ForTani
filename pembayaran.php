<?php session_start(); ?>
<?php include "koneksi.php"; 

// jika tidak ada session pelanggan maka halaman riwayat tidak dapat diakses dan dilarikan ke halaman login

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='login.php'</script>";
}

//mendapatkan id pembelian dari url

$id_pembelian=$_GET["id"];

$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian=$id_pembelian");
$detail_pembelian = $ambil->fetch_assoc();

$id_pelanggan_beli = $detail_pembelian["id_pelanggan"];


$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_beli !== $id_pelanggan_login) 
{
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>pembayaran</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container">
		<h2>konfirmasi pembayaran</h2>
		<p>kirim bukti pembayaran anda disini</p>
		<div class="alert alert-info"> <h2>total tagihan anda adalah <b>Rp. <?php echo number_format($detail_pembelian["total_pembelian"]) ?></b></h2></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label for="">bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label for="">Jumlah</label>
				<input type="number" class="form-control" name="jumlah">
			</div>
			<div class="form-group">
				<label for="">Foto bukti</label>
				<input type="file" class="form-control" name="foto_bukti">
				<p class="text-danger">Foto bukti harus JPG ukuran maksimal 2Mb</p>
			</div>
			<button class="btn btn-primary" name="kirim">kirim</button>
		</form>
	</div>
<?php 

if (isset($_POST["kirim"])) 
{
	$namabukti=$_FILES["foto_bukti"]["name"];
	$lokasibukti=$_FILES["foto_bukti"]["tmp_name"];
	$namafiks= date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("d-m-y");

	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$id_pembelian'");

	echo "<script>alert('Terimakasih telah mengirim bukti pembayaran');</script>";
	echo "<script>location='riwayat.php'</script>";
}

 ?>




</body>
</html>