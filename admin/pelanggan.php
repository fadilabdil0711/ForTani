<h3>Data pelanggan<h3>

<table width="1000" border="7" cellspacing="3" cellpadding="5" align="center">
	<thead>
		<tr align="center" bgcolor="white">
			<td>nomor</td>
			<td>email</td>
			<td>password</td>
			<td>nama</td>
			<td>telepon</td>
			<td>aksi</td>
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
				<a href="" class="btn-danger btn">hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>