<?php 
session_start() ;
include 'koneksi.php';
 ?>


<html>
	<head>
		<meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Login Pengguna</title>
		<!-- BOOTSTRAP STYLES-->
	    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
	     <!-- FONTAWESOME STYLES-->
	    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
	        <!-- CUSTOM STYLES-->
	    <link href="admin/assets/css/custom.css" rel="stylesheet" />
	     <!-- GOOGLE FONTS-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<title>Login Pelanggan</title>
		<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
		<style>
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
		<nav class="navbar navbar-default">
  <div class="container">
    <div>
        <img align="center" alt="Brand" src="admin/assets/img/logo1.png">
      </a>
    </div>
  </div>
</nav>


		<nav class="navbar navbar-default">
			<div class="container">
				<ul class="nav nav-pills">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Berita</a></li>
					<li><a href="#">Forum</a></li>
					<li><a href="pasar.php">Pasar Tani</a></li>

					<li><a href="keranjang.php">Keranjang</a></li>

					<?php if (isset($_SESSION["pelanggan"])): ?>
					<li><a href="logout.php">Logout</a></li>

					<?php else: ?>
					<li class="active"><a href="login.php">Login</a></li>
					<?php endif ?>
					<li><a href="checkout.php">Checkout</a></li>
					<li><a href="admin/index.php">Admin</a></li>
				</ul>
			</div>
		</nav>


		<center><img align="center" alt="Brand" src="admin/assets/img/User.png"></center>
		 <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
            </div>
        </div>
         <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading"  align="center">
                        <H1><strong>  Login </strong>  </H1>
                            </div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data"><br/>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Alamat Email" name="email"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password" />
                                        </div>

                                        <button class="btn btn-primary" name="login">Login</button>
										Bulum punya akun? <a href="registration.php" >Daftar disini</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>

		<?php 
		
		if (isset($_POST["login"]))
		{
		 	$email=$_POST["email"];
			$password=$_POST["password"];

		 	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' and pass_pelanggan='$password'" );
		 	$akuncocok = $ambil->num_rows;
			 if ($akuncocok==1) 
			 {
			 	$akun = $ambil->fetch_assoc();
			 	$_SESSION["pelanggan"] = $akun;
			 	echo "<script>alert('anda berhasil login')</script>";

			 	if (isset($_SESSION["keranjang"]) OR !empty ($_SESSION["keranjang"])) 
			 	{
			 		
			 		echo "<script>location='checkout.php';</script>";
			 	}
			 	else
			 	{
			 		echo "<script>location='riwayat.php';</script>";

			 	}

			 }
		else
			{
			 	echo "<script>alert('anda gagal login, periksa akun anda')</script>";
			 	echo "<script>location='login.php':</script>";
			}
		}
		?>

		
	</body>
</html>

