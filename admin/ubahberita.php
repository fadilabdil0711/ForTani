<h2>Halaman Ubah Berita</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
// echo "<prev>";
// print_r($pecah);
// echo "</prev>";
 ?>
<br>
 <form method="POST" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Judul</label>
 		<input type="text" name="judul" class="form-control" value="<?php echo $pecah['judul']; ?>">
 	</div>
     <div class="form-group">
		<label>Kategori</label>
		<select class="form-control input-sm" name="kategori">
		<?php $ambil=$koneksi->query("select * from kategori");?>
		<?php while ($kat=$ambil->fetch_assoc()) { ?>
        <option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['kategori']; ?></option>
		<?php } ?>
		</select>
 	<div class="form-group">
 		<img src="../foto_berita/<?php echo $pecah['gambar'] ?>" width="200">
 	</div>
 	<div class="form-group">
 		<label>Ganti foto</label>
 		<input type="file" name="foto" class="form-control">
 	</div>
     <div class="form-group">
		<label>Tanggal Posting</label>
        <div class="form-group">
            <input type="date" class="form-control input-sm" name="tgl_posting" value="<?php echo date('Y-m-d'); ?>" disabled>
	</div>
 	<div class="form-group">
 		<label>Teks Berita</label>
 		<textarea name="teks_berita" class="form-control" rows="15">
 			<?php echo $pecah['teks_berita']; ?>
 		</textarea>
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php
 if (isset($_POST['ubah']))
 {
    $id_admin = $_SESSION["admin"]["id_admin"];
 	$namafoto= $_FILES['foto']['name'];
 	$lokasifoto= $_FILES['foto']['tmp_name'];
 	//jika foto diubah
 	if (!empty($lokasifoto))
 	{
 		move_uploaded_file($lokasifoto, "../foto_berita/$namafoto");

 		$koneksi->query("UPDATE berita SET judul='$_POST[judul]',id_kategori='$_POST[kategori]',gambar='$namafoto', teks_berita='$_POST[teks_berita]',id_admin='$id_admin' WHERE id_berita = '$_GET[id]'");
 	}
 	else
 	{
		$koneksi->query("UPDATE berita SET judul='$_POST[judul]',id_kategori='$_POST[kategori]', teks_berita='$_POST[teks_berita]',id_admin='$id_admin' WHERE id_berita = '$_GET[id]'");
 	}
 	echo "<script>alert ('Data telah diubah'); </script>";
	echo "<div class='alert alert-info'>Data Berhasil diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=daftar_berita'>";
 }


  ?>