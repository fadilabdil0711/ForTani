<?php 

$semuadata=array();
$tgl_mulai="-";
$tgl_sampaii="-";
if (isset($_POST["kirim"])) 
{
	$tgl_mulai=$_POST["tglm"];
	$tgl_sampaii=$_POST["tgls"];

	$ambil= $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
		WHERE tanggal_pembelian 
		BETWEEN '$tgl_mulai' AND '$tgl_sampaii'");
	while ($pecah= $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}

	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";

}

 ?>



<h2>Laporan Pembelian dari <b><?php echo $tgl_mulai ?></b> sampai <b><?php echo $tgl_sampaii  ?></b></h2>
<hr>

<form action="" method="POST">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="">tanggal mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="">tanggal sampai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_sampai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label for="">&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">kirim</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>pelanggan</th>
			<th>tanggal</th>
			<th>jumlah</th>
			<th>status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value["total_pembelian"]; ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"]; ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td><?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>