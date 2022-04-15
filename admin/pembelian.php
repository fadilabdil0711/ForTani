<h3>Data pembelian<h3>

<table class="table table-bordered table-striped table-responsive table-hover">
	<thead class="thead-inverse">
		<tr align="center" bgcolor="white">
			<td>nomor</td>
			<td>nama pelanggan</td>
			<td>tanggal</td>
			<td>Status pembayaran</td>
			<td>total</td>
			<td>Resi Pembelian</td>
			<td>aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
		<?php while ($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td align="center"><?php echo $nomor; ?></td>
			<td align="center"><?php echo $pecah['nama_pelanggan'];?></td>
			<td align="center"><?php echo $pecah['tanggal_pembelian'];?></td>
			<td align="center"><?php echo $pecah['status_pembelian'];?></td>
			<td align="center"><?php echo $pecah['total_pembelian'];?></td>
			<td align="center"><?php echo $pecah['resi_pengiriman'];?></td>
			<td align="center">
				<a href="index.php?halaman=detail&id=<?php echo $pecah ['id_pembelian']; ?>" class="btn-info btn">detail</a>

				<?php if ($pecah["status_pembelian"]!=="pending"): ?>
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Lihat Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>