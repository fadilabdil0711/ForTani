<h2>data pembayaran</h2>

<?php 

//mendapatkan id pembelian dari url

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran  WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();
echo "<pre>";
print_r($pecah);
echo "</pre>";

 ?>

 <div class="row">
 	<div class="col-md-6">
 		<table class='table table-striped'>
 			<tr>
 				<th>nama</th>
 				<td><?php echo $pecah["nama"] ?></td>
 			</tr>
 			<tr>
 				<th>bank</th>
 				<td><?php echo $pecah["bank"] ?></td>
 			</tr>
 			<tr>
 				<th>jumlah</th>
 				<td><?php echo $pecah["jumlah"] ?></td>
 			</tr>
 			<tr>
 				<th>tanggal</th>
 				<td><?php echo $pecah["tanggal"] ?></td>
 			</tr>
 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $pecah["bukti"] ?>" alt="" class="img-responsive">
 	</div>
 	<form method="post">
 		<div class="form-group">
 			<label> resi pengiriman</label>
 			<input type="text" name="resi" class="form-control">
 		</div>
 		<div class="form-group">
 			<label for="">status</label>
 			<select name="status" id="" class="form-control">
 				<option value="">--pilih status--</option>
 				<option value="lunas">lunas</option>
 				<option value="barang_dikirim">barang dikirim</option>
 				<option value="batal">batal</option>
 			</select>
 		</div>
 		<button class="btn btn-primary" name="proses">Proses</button>
 	</form>
 </div>

 <?php 

 if (isset($_POST["proses"])) 
 {
 	$resi=$_POST["resi"];
 	$status=$_POST["status"];
 	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
 		WHERE id_pembelian='$id_pembelian'");

 	echo "<script>alert('data terupdate');</script>";
 	echo "<script>location='index.php?halaman=pembelian';</script>";
 }

  ?>