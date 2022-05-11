<h2>Halaman Berita</h2>
	<?php 
	include 'koneksi.php';
	?>

<table class="table table-bordered" align="center">
	<thead>
		<tr align="center" bgcolor="white">
            <td><b>No.</b></td>
			<td><b>Judul</b></td>
			<td><b>Gambar</b></td>
			<td><b>Kategori</b></td>
			<td><b>Tgl. Posting</b></td>
			<td><b>Penulis</b></td>
			<td><b>Pilihan</b></td>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM berita LEFT JOIN admin ON berita.id_admin=admin.id_admin LEFT JOIN kategori ON berita.id_kategori=kategori.id_kategori");?>
		<?php while ($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td align="center" bgcolor="white" width="20"><b><?php echo $nomor; ?>.</b></td>
			<td align="center" bgcolor="white" width="350"><?php echo $pecah['judul'];?></td>
            <td align="center" bgcolor="white" width="200">
				<img src="../foto_berita/<?php echo $pecah['gambar'];?>" width="100">
            </td>
			<td align="center" bgcolor="white"><?php echo $pecah['kategori'];?></td>
            <td align="center" bgcolor="white"><?php echo $pecah['tgl_posting'];?></td>
			<td align="center" bgcolor="white"><?php echo $pecah['nama'];?></td>
			<td align="center" bgcolor="white">
				<a href="index.php?halaman=detailberita&id=<?php echo $pecah['id_berita']; ?>" class="btn btn-success">  Lihat</a>
				<a href="index.php?halaman=hapusberita&id=<?php echo $pecah['id_berita']; ?>" class="btn-danger btn">  Hapus</a>
				<a href="index.php?halaman=ubahberita&id=<?php echo $pecah['id_berita']; ?>" class="btn btn-warning">  Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahberita" class="btn btn-primary">Tambah Berita</a>