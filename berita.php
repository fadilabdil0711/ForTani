<?php
session_start() ;
include 'koneksi.php';
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
     <title>Berita Tani</title>
     <style>
			#judul,{
				position: relative;
				padding-left: 300px;
				padding-top: 100px;
				padding-right: 250px;
					}
			body {
				background: url('admin/assets/img/Frame 2.png') no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				overflow-x: hidden;
				font-family: 'Roboto', sans-serif;
				font-size: 16px;
        }
		</style>
 </head>
 <body>
<div class='col md 6'>
	 <nav class="navbar navbar-default">
			<div class="container">
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
                    <li><a href="berita.php">Berita</a></li>
					<?php if (isset($_SESSION["pelanggan"])): ?>
					<li><a href="logout.php">Logout</a></li>
					<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<?php endif ?>
					<li><a href="admin/index.php">Admin</a></li>
				</ul>
			</div>
		</nav>
		</div>
	<?php include "koneksi.php"; ?>
<div class='container p-3'>
    <div>
        <h1>Berita Terkini</h1>
    </div>
	<?php include 'koneksi.php';?>
	<?php $ambil=$koneksi->query("SELECT * FROM berita LEFT JOIN admin ON berita.id_admin=admin.id_admin LEFT JOIN kategori ON berita.id_kategori=kategori.id_kategori");?>
	<div class="container-fluid">
		<div class="row">
			<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
					<?php while ($index = $ambil->fetch_array()) { ?>
						<div class="post">
							<div class="row post-title">
								<div class="col-sm-14">
									<a href="<?php echo $base_url."detail.php?id=".$index['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-",$index['judul'])); ?>">
										<h2><?php echo strtoupper($index['judul']); ?></h2>
									</a>
								</div>
							</div>
							<div class="row post-meta">
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;
										<?php echo $index['nama']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;
									<?php echo $index['tgl_posting']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;
									<?php echo $index['dilihat']; ?>x
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;
									<em><?php echo $index['kategori']; ?></em>
								</div>
							</div>
							<div class="row post-content">
								<div class="col-sm-12">
								<img id="image" width ="100%" height= "300" style="align:center" src="foto_berita/<?php echo $index['gambar']; ?>">
									<?php echo substr($index['teks_berita'], 0,200); ?>...
									<a href="detail_berita.php?&id=<?php echo $index['id_berita']; ?>">
										Selengkapnya <i class="glyphicon glyphicon-chevron-right"></i>
									</a>
								</div>
							</div>
						</div>
						<?php } ?>
</div>
 </body>
 </html>