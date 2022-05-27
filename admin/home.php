<h2>Selamat Datang, <?php echo $_SESSION["admin"]["nama"]; ?></h2>
<?php 
$id_admin = $_SESSION["admin"]["id_admin"];

$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$pecah = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

 ?>

 <div class="row">
 	<div class="col-md-6">
        <div class="col-md-6">
            <img src="../foto_profil/<?php echo $pecah["foto"] ?>" alt="" class="user-image img-responsive">
 	    </div>
 		<table class='table table-striped'>
 			<tr>
 				<th>nama</th>
 				<td><?php echo $pecah["nama"] ?></td>
 			</tr>
 			<tr>
 				<th>username</th>
 				<td><?php echo $pecah["user"] ?></td>
 			</tr>
 			<tr>
 				<th>password</th>
 				<td><?php echo $pecah["pass"] ?></td>
 			</tr>
 		</table>
        <a href="index.php?halaman=editprofil" class="btn btn-primary">Edit Profil</a>
 	</div>
 </div>
