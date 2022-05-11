<?php include 'koneksi.php';?>
<?php if (!isset($_GET['id'])) redirect('404');?>

<?php $ambil=$koneksi->query("SELECT * FROM berita LEFT JOIN admin ON berita.id_admin=admin.id_admin LEFT JOIN kategori ON berita.id_kategori=kategori.id_kategori
WHERE id_berita = '$_GET[id]'");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
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
<?php while ($pecah=$ambil->fetch_assoc()){?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-10">
						<div class="post-detail">
                            <div class="row post-title">
								<div class="col-sm-10">
									<h1><?php echo $pecah['judul'];?></h1>
								</div>
							</div>
							<div class="row post-meta">
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo $pecah['nama']; ?></a>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;<?php echo $pecah['tgl_posting']; ?>
								</div>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;<?php echo $pecah['dilihat']+1 ?>x</div>
                                    <?php
                                    $stat = $pecah['dilihat']+1;
                                    $koneksi->query("UPDATE berita SET dilihat = '$stat' WHERE id_berita = '$_GET[id]'");
                                    ?>
								<div class="col-sm-3">
									<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<?php echo $pecah['kategori']; ?></em>
								</div>
							</div>
                            <div class="row post-content">
								<div class="col-sm-10">
									<div class="image wow fadeIn">
										<img id="image" width ="100%" height= "300" style="align:center" src="foto_berita/<?php echo $pecah['gambar']; ?>">
									</div>
									<div class="text">
										<?php echo $pecah['teks_berita']; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
</body>
</html>