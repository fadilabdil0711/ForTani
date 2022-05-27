<h3>Data Pelanggan<h3>

<table class="table table-striped" border="7" cellspacing="3" cellpadding="5" align="center">
	<thead>
		<tr align="center" bgcolor="white">
			<td>Nomor</td>
			<td>Email</td>
			<td>Password</td>
			<td>Nama</td>
			<td>No. telepon</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("select * from pelanggan");?>
		<?php while ($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td align="center"><?php echo $nomor; ?></td>
			<td align="center"><?php echo $pecah['email_pelanggan'];?></td>
			<td align="center"><?php echo $pecah['pass_pelanggan'];?></td>
			<td align="center"><?php echo $pecah['nama_pelanggan'];?></td>
			<td align="center"><?php echo $pecah['telepon_pelanggan'];?></td>
			<td align="center">
				<a href="index.php?halaman=hapususer&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn">Blokir</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>