<?php
session_start() ;
include 'koneksi.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Profil Pengguna</title>
		<!-- BOOTSTRAP STYLES-->
	    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
	     <!-- FONTAWESOME STYLES-->
	    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
	        <!-- CUSTOM STYLES-->
	    <link href="admin/assets/css/custom.css" rel="stylesheet" />
	     <!-- GOOGLE FONTS-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <title>Profil</title>
</head>
<body>
    <center><h2>Selamat Datang, <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h2></center>
    <?php 
    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    $pecah = $ambil->fetch_assoc();
    // echo "<pre>";
    // print_r($pecah);
    // echo "</pre>";
    ?>

    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="col-md-6">
                <img src="foto_pelanggan/<?php echo $pecah["foto_pelanggan"] ?>" alt="" class="user-image img-responsive">
            </div>
            <table class='table table-striped'>
                <tr>
                    <th>nama</th>
                    <td><?php echo $pecah["nama_pelanggan"] ?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><?php echo $pecah["email_pelanggan"] ?></td>
                </tr>
                <tr>
                    <th>password</th>
                    <td><?php echo $pecah["pass_pelanggan"] ?></td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td><?php echo $pecah["telepon_pelanggan"] ?></td>
                </tr>
            </table>
            <a href="edit_profil.php" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>

</body>
</html>