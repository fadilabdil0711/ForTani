<h2>detail pembelian</h2>
<?php include "koneksi.php"; ?>

<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan JOIN ongkir ON pembelian.id_ongkir=ongkir.id_ongkir
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>


<!-- <pre><?php //print_r($detail); ?></pre> -->
 <br>

<div class="row">
	<div class="col-md-4">
		<h3>pembelian</h3>
		Tanggal : <?php echo $detail["tanggal_pembelian"]; ?><br>
		Total Pembelian : Rp. <?php echo number_format($detail["total_pembelian"]); ?>
	</div>
	<div class="col-md-4">
		<h3>pelanggan</h3>
		<strong><?php echo $detail ['nama_pelanggan']; ?></strong><br>
		
		 	Nomor Telp. : <?php echo $detail ['telepon_pelanggan']; ?><br>
		 	Email : <?php echo $detail ['email_pelanggan']; ?>
		 
	</div>
	<div class="col-md-4">
		<h3>pengiriman</h3>
		<strong><?php echo $detail ['nama_kota']; ?></strong><br>
		Tarif : Rp. <?php echo number_format($detail["tarif"]); ?><br>
		Alamat : <?php echo $detail["alamat_pembelian"]; ?>
	</div>
</div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>no</th>
 			<th>nama produk</th>
 			<th>harga</th>
 			<th>jumlah</th>
 			<th>subtotal</th>
 			<th>Total Pembelian</th>
 		</tr>
 	</thead>
 		<tbody>
 			<?php $nomor=1 ?>
 		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk 
 		WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
 		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga_produk']) ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>
 				Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?>
 			</td>
 			<td>
 				Rp. <?php echo number_format($detail['total_pembelian']); ?>
 			</td>
 		</tr>
 		<?php $nomor++ ?>
 		<?php } ?>
 		</tbody>
 	</table>

 </table>