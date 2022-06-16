<h2>Halaman Produk</h2>
	<?php 
	include 'koneksi.php';
	?>

<table class="table table-bordered" align="center">
	<thead>
		<tr align="center" bgcolor="white">
			<td><b>Nomor</b></td>
			<td><b>Nama</b></td>
			<td><b>Harga</b></td>
			<td><b>Berat (gr)</b></td>
			<td><b>Foto</b></td>
			<td><b>Deskripsi</b></td>
			<td><b>Stok</b></td>
			<td><b>Aksi</b></td>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("select * from produk");?>
		<?php while ($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td align="center" bgcolor="white" width="20"><b><?php echo $nomor; ?>.</b></td>
			<td align="center" bgcolor="white" width="350"><?php echo $pecah['nama_produk'];?></td>
			<td align="center" bgcolor="white" width="150">Rp <?php echo number_format($pecah['harga_produk']);?></td>
			<td align="center" bgcolor="white" width="80"><?php echo $pecah['berat_produk'];?></td>
			<td align="center" bgcolor="white" width="120">
				<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
			</td>
			<td align="center" bgcolor="white"><?php echo $pecah['deskripsi_produk'];?></td>
			<td align="center" bgcolor="white"><?php echo $pecah['stok_produk'];?></td>
			<td align="center" bgcolor="white">
				<!-- <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">  Hapus</a> -->
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">  Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>