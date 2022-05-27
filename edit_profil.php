<?php
session_start() ;
include 'koneksi.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Edit Profil Pengguna</title>
		<!-- BOOTSTRAP STYLES-->
	    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
	     <!-- FONTAWESOME STYLES-->
	    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
	        <!-- CUSTOM STYLES-->
	    <link href="admin/assets/css/custom.css" rel="stylesheet" />
	     <!-- GOOGLE FONTS-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <title>Edit Profil</title>
</head>
<body>
    <?php 
    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    $pecah = $ambil->fetch_assoc();
    // echo "<pre>";
    // print_r($pecah);
    // echo "</pre>";

    ?>
    <br>
    <div class="container">
        <h2>Halaman edit Profil</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="pass" class="form-control" value="<?php echo $pecah['pass_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <img src="foto_pelanggan/<?php echo $pecah['foto_pelanggan'] ?>" width="200">
        </div>
        <div class="form-group">
            <label>Ganti foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button class="btn btn-primary" name="ubah">Ubah</button>
    </form>
</div> 

    <?php
    if (isset($_POST['ubah']))
    {
        $namafoto= $_FILES['foto']['name'];
        $lokasifoto= $_FILES['foto']['tmp_name'];
        //jika foto diubah
        if (!empty($lokasifoto))
        {
            move_uploaded_file($lokasifoto, "foto_pelanggan/$namafoto");

            $koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',pass_pelanggan='$_POST[pass]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telp]'
                foto_pelanggan='$namafoto' WHERE id_pelanggan = '$id_pelanggan'");
        }
        else
        {
            $koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',pass_pelanggan='$_POST[pass]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telp]'
            WHERE id_pelanggan = '$id_pelanggan'");
        }
        echo "<script>alert ('data telah diubah'); </script>";
        echo "<div class='alert alert-info'>Data Berhasil diubah</div>";
        echo "<meta http-equiv='refresh' content='1;url=profil.php'>";
    }
    ?>

</body>
</html>