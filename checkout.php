<?php
session_start() ;
include 'koneksi.php';
if(!isset($_SESSION['pelanggan']))
{
  echo "<script>alert('Login Dulu ya ciiiin')</script>";
  echo "<script>location='login.php'</script>";
  header('location:login.php');
  exit();
}


if (empty($_SESSION['keranjang']))
{
	echo "<script>alert('Anda Belum Belanja. Silahkan berbelanja di Pasar Tani')</script>";
	echo "<script>location='pasar.php'</script>";
}
 ?>


<html>
	<head>
		<title>Checkout</title>
		<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	</head>
	<body>

		
		<nav class="navbar navbar-default">
			<div class="container" color="blue">
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
					<li><a href="keranjang.php">Keranjang</a></li>

					<?php if (isset($_SESSION["pelanggan"])): ?>
					<li><a href="logout.php">Logout</a></li>

					<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<?php endif ?>
					<li class="active"><a href="checkout.php">Checkout</a></li>
					<li><a href="admin/index.php">Admin</a></li>
				</ul>
			</div>
		</nav>

<section class='konten'>
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja=0; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
				<!-- menampilkan produk yang akan deperulangkan berdasarkan id_produk-->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;
				
						$ambil = $koneksi->query("SELECT * FROM ongkir");
						$perongkir = $ambil->fetch_assoc();
						
				
				 ?>
				
					
				
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk'];?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			
			<tfoot>

				<tr>
					<th colspan="1"></th>
					<th colspan="3">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					

				</tr>	

			</tfoot>


		</table>
		<form method="post">

			
			<div class"row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email_pelanggan'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<!-- tambahan alamat pengiriman pada checkout -->
					<select class="form-control" name="id_ongkir" required>
						<option value="">--Pilih Alamat dan Ongkos kirim--</option>
						<?php
						$ambil = $koneksi->query("SELECT * FROM ongkir");
						while ($perongkir = $ambil->fetch_assoc()){
						?>
						<option value="<?php echo $perongkir['id_ongkir'] ?>">
							<?php echo $perongkir['nama_kota'] ?> -
							<?php echo number_format($perongkir['tarif']) ?> -
						</option>
						<?php } ?>
					</select>
				</div>
			</div><br><br>
			<div class="form-group"><br>
					<label>Alamat Lengkap</label>
					<textarea class="form-control" placeholder="Alamat Tujuan pengiriman" name="alamat" rows="10" cols="10" required></textarea>
				</div>
				
			<br><button class="btn btn-primary" name="checkout">Checkout</button>
		</form>
		<?php 
		$ambilproduk=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$arrayproduk=$ambilproduk->fetch_assoc();


				$nama=$arrayproduk["nama_produk"];
				// print_r($arrayproduk);
		 ?>


		

		<?php
		if (isset($_POST['checkout']))
		{

			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
			$id_ongkir = $_POST["id_ongkir"];
			$tanggal_pembelian = date("y-m-d");

			$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
			$arrayongkir = $ambil->fetch_assoc();
			$tarif = $arrayongkir['tarif'];


			$total_pembelian = $totalbelanja + $tarif;

			

			$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,alamat_pembelian)
				VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$_POST[alamat]')");

			//mendapatkan  id_pembelian yang barusan terjadi
			$id_pembelian_barusan = $koneksi->insert_id;

			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
			{
				//mendapatkan data produk berdasarkan id_produk
				$ambilproduk=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$arrayproduk=$ambilproduk->fetch_assoc();


				$nama=$arrayproduk["nama_produk"];
				$harga=$arrayproduk["harga_produk"];
				$berat=$arrayproduk["berat_produk"];
				$subberat=$arrayproduk["berat_produk"]*$jumlah;
				$subharga=$arrayproduk["harga_produk"]*$jumlah;
				print_r($arrayproduk);


				
				$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,berat,subberat,subharga)
					VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$berat','$subberat','$subharga')");	

				//script update stok produknya
				$koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk'");

				
			}

			//mengosongkan keranjang
			unset($_SESSION["keranjang"]);

			
				echo "<script>alert('pembelian sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";


		}

		?>

	</div>
</section>


	</body>
</html>