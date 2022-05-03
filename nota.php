 <?php 
 session_start();
include 'koneksi.php';

 ?>

<!DOCTYPE html>

 <html>
 <head>
 	<title>Nota Belanja</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

	<?php include "navbar.php"; ?>


<section class="conten">
	<div class="container">


		<h2>Detail Pembelian Produk</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan JOIN ongkir ON pembelian.id_ongkir=ongkir.id_ongkir
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<strong>
	<div class="row">
		<div class="col-md-5">
			<div class="alert alert-info">
				<p>
				<h2><b>Kode Pembelian 	: TMS<?php echo $detail ['id_pembelian']; ?></b></h2>
				</p>
			</div>
		</div>
	</div>
	Nama pelanggan   : <?php echo $detail ['nama_pelanggan']; ?></strong><br>
 <p>
 	Telepon pelanggan  	: <?php echo $detail ['telepon_pelanggan']; ?> <br>
 	Email pelanggan 	: <?php echo $detail ['email_pelanggan']; ?><br>
 	Tanggal Pembelian 	: <?php echo $detail ['tanggal_pembelian']; ?><br>
 	Total Pembelian 	: Rp. <?php echo number_format($detail ['total_pembelian']);?><br>
 	<b>Alamat Pengiriman 	: <?php echo $detail ['alamat_pembelian']; ?><br></b>

 </p><br>

<!-- jika  pelanggan yang beli tidak sama dengan pelangan yang login maka dilarikan ke halaman riwayat.php karena pelangan tersebut tidak berhak mengakses nota pelanggan lain -->
<!-- pelanggan yang beli haruslah pelanggan yang login -->

<?php 
// mendapatan id pelanggan yang beli
$idyangbeli = $detail["id_pelanggan"];

// mendapatkan id pelanggan yang login
$idyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idyangbeli != $idyanglogin) 
{
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
 ?>

 <div class="row">
 	<div class="col-md-3">
 		<h3>Pembelian</h3>
 		<strong>
 			No. pembelian : <?php echo $detail ['id_pembelian']; ?><br>
 			tanggal : <?php echo $detail["tanggal_pembelian"]; ?> <br>
 			Total : <?php echo $detail["total_pembelian"]; ?>
 		</strong>
 	</div>
 	<div class="col-md-5">
 		<h3>Pelanggan</h3>
 		<strong>Nama Pelanggan : <?php echo $detail["nama_pelanggan"]; ?></strong><br>
 		<p>
 			telepon pelanggan : <?php echo $detail["telepon_pelanggan"]; ?><br>
 			email pelanggan : <?php echo $detail["email_pelanggan"]; ?>
 		</p>
 	</div>
 	<div class="col-md-4">
 		<h3>Pengiriman</h3>
 		<strong>Nama Kota : <?php echo $detail["nama_kota"] ?></strong><br>
 		<strong>Ongkir : <?php echo $detail["tarif"] ?></strong><br>
 		<p>
 			Alamat : <?php echo $detail["alamat_pembelian"]; ?>
 		</p>


 	</div>
 </div>



 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Subberat</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1 ?>
 		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk
 		 WHERE id_pembelian='$_GET[id]'"); ?>
 		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama'] ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']) ?></td>
 			<td><?php echo $pecah['berat'] ?></td>
 			<td><?php echo $pecah['jumlah'] ?></td>
 			<td><?php echo $pecah['subberat'] ?></td>
 			<td>Rp. <?php echo number_format($pecah['subharga']) ?></td>
 			
 		</tr>
 		<?php $nomor++ ?>
 		<?php } ?>
 			
 	</tbody>

 	<?php 
 	$ambilongkos = $koneksi->query("SELECT * FROM pembelian JOIN ongkir ON pembelian.id_ongkir=ongkir.id_ongkir
 		WHERE pembelian.id_pembelian='$_GET[id]'");
 	$ongkos = $ambilongkos->fetch_assoc();
 	?>


 	<tfoot>

				<tr>
					<th colspan="1"></th>
					<th colspan="5">Total Pembayaran</th>
					<th>Rp. <?php echo number_format($detail ['total_pembelian']);?></th>

				</tr>	

			</tfoot>

			<tfoot>
 			<tr>
 				<th colspan="1"></th>
 				<th colspan="5">Ongkos Kirim</th>
 				<th>Rp. <?php echo number_format($ongkos['tarif']) ?></th>
 			</tr>
 	</tfoot>

 </table>

 	<div class="row">
 		<div class="col-md-6">
 			<div class="alert alert-success">
 				<p>
 					<b>Pembelian Sukses</b><br>
 					Silahkan Melakukan Pembayaran Via Rekening Bank BNI dengan No. Rekening <b>1234567890</b> A.N
 					<b>Fadil Abdillah</b> Sebesar
 					<b>Rp. <?php echo number_format($detail ['total_pembelian']);?></b>
 				</p><br>
 				<div class="alert alert-info">
 					<p>
 						Konfirmasi Pembayaran Melalui Email ke <b>fortani_indonesia@gmail.com</b> Setelah Melakukan Transfer. Dengan Format :<br>
 						Subjek : Konfirmasi Pembayaran <br>
 						Kode Pembelian : <b>misal : TMS16</b> <br>
 						Nama Pengirim Rek. : <b>misal : admin</b><br>
 						Jumlah Transfer : <b>misal : 500000</b><br>
 						Lampiran/attachment : <b>Bukti Pembayaran Transfer</b>

 					</p>
 				</div>
 			</div>
 		</div>
 	</div>

	</div>
</div>


</section>



 </body>
 </html>