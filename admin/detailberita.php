<?php include 'koneksi.php';?>

<?php $ambil=$koneksi->query("SELECT * FROM berita LEFT JOIN admin ON berita.id_admin=admin.id_admin LEFT JOIN kategori ON berita.id_kategori=kategori.id_kategori
WHERE id_berita = '$_GET[id]'");?>
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
										<img id="image" width ="100%" height= "300" style="align:center" src="../foto_berita/<?php echo $pecah['gambar']; ?>">
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