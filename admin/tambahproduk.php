<h2>form tambah produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>harga(Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>berat(gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES ['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk)
		VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]')");

	echo "<script>alert ('produk telah ditambahkan'); </script>";
	echo "<div class='alert alert-info'>Data Berhasil ditambahkan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
