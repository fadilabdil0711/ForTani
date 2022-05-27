<h2>Halaman edit Profil</h2>
<?php 
$id_admin = $_SESSION["admin"]["id_admin"];

$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$pecah = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

 ?>
<br>
 <form method="POST" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Username</label>
 		<input type="text" name="user" class="form-control" value="<?php echo $pecah['user']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Password</label>
 		<input type="text" name="pass" class="form-control" value="<?php echo $pecah['pass']; ?>">
 	</div>
 	<div class="form-group">
 		<img src="../foto_profil/<?php echo $pecah['foto'] ?>" width="200">
 	</div>
 	<div class="form-group">
 		<label>Ganti foto</label>
 		<input type="file" name="foto" class="form-control">
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php
 if (isset($_POST['ubah']))
 {
 	$namafoto= $_FILES['foto']['name'];
 	$lokasifoto= $_FILES['foto']['tmp_name'];
 	//jika foto diubah
 	if (!empty($lokasifoto))
 	{
 		move_uploaded_file($lokasifoto, "../foto_profil/$namafoto");

 		$koneksi->query("UPDATE admin SET user='$_POST[user]',pass='$_POST[pass]',nama='$_POST[nama]',
 			foto='$namafoto' WHERE id_admin = '$id_admin'");
 	}
 	else
 	{
        $koneksi->query("UPDATE admin SET user='$_POST[user]',pass='$_POST[pass]',nama='$_POST[nama]' WHERE id_admin = '$id_admin'");
 	}
 	echo "<script>alert ('data telah diubah'); </script>";
	echo "<div class='alert alert-info'>Data Berhasil diubah</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=home'>";
 }


  ?>