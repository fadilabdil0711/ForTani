<?php 
	include 'koneksi.php';
?>

<h2>Form Tambah Berita</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul</label>
		<input type="text" class="form-control" name="judul">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control input-sm" name="kategori">
		<option value="">Pilih Kategori</option>
		<?php $ambil=$koneksi->query("select * from kategori");?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<option value="<?php echo $pecah['id_kategori']; ?>"><?php echo $pecah['kategori']; ?></option>
		<?php } ?>
		</select>
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Tanggal Posting</label>
        <div class="form-group">
            <input type="date" class="form-control input-sm" name="tgl_posting" value="<?php echo date('Y-m-d'); ?>" disabled>
	</div>
	<div class="form-group">
		<label>Teks Berita</label>
		<textarea class="form-control input-sm" name="teks_berita" rows="15" id="editor"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{	
	$tgl_posting = date('Y-m-d H:i:s');
    $id_admin = $_SESSION["admin"]["id_admin"];
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES ['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_berita/".$nama);
	$koneksi->query("INSERT INTO berita (judul,id_kategori,gambar,teks_berita,tgl_posting,id_admin)
		VALUES ('$_POST[judul]','$_POST[kategori]','$nama','$_POST[teks_berita]','$tgl_posting','$id_admin')");

	echo "<script>alert ('berita telah ditambahkan'); </script>";
	echo "<div class='alert alert-info'>Data Berhasil ditambahkan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=daftar_berita'>";
}
?>
