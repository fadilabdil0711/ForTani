<?php
session_start() ;
include 'koneksi.php';
if(!isset($_SESSION['admin']))
{
  echo "<div class='alert alert-danger'>Login gagal</div>";
  echo "<script>location='login.php'</script>";
  header('location:login.php');
  exit();
}
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelompok ForTani</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
      body {
        background: url('assets/img/Frame 2.png') no-repeat center center fixed; 
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
          <div class="navbar-header"><marquee scrollamount="3" behavior="alternate"
              onmouseover="this.stop" onmouseout="this.start" bgcolor="ffffff" width="1350" weight="140">
              <h2><b>Halaman Dashboard Khusus Admin dari Produk Kelompok ForTani<b><h2></marquee>
          </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
          				<li class="text-center">
                    <img src="assets/img/logo1.png" class="user-image img-responsive"/>
          				</li>
				
					
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          					<li><a href="index.php?halaman=produk"><i class="fa fa-cube"></i>Produk</a></li>
          					<li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i>Pembelian</a></li>
          					<li><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i>Pelanggan</a></li>
                    <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i>Laporan</a></li>
                    <li><a href="index.php?halaman=daftar_berita"><i class="fa fa-newspaper-o"></i>Berita</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			<?php
			if (isset($_GET['halaman']))
				{
					if ($_GET['halaman']=="produk")
					{
						include 'produk.php';
					}
					elseif ($_GET['halaman']=="pembelian")
					{
						include 'pembelian.php';
					}
          elseif ($_GET['halaman']=="home")
					{
						include 'home.php';
					}
          elseif ($_GET['halaman']=="editprofil")
					{
						include 'edit_profil.php';
					}
					elseif ($_GET['halaman']=="pelanggan")
					{
						include 'pelanggan.php';
					}
          elseif ($_GET['halaman']=="hapususer")
					{
						include 'hapus_pelanggan.php';
					}
          elseif ($_GET['halaman']=="detail")
          {
            include 'detail.php';
          }
          elseif ($_GET['halaman']=="tambahproduk")
          {
            include 'tambahproduk.php';
          }
          elseif ($_GET['halaman']=="hapusproduk")
          {
            include 'hapusproduk.php';
          }
          elseif ($_GET['halaman']=="ubahproduk")
          {
            include 'ubahproduk.php';
          }
          elseif ($_GET['halaman']=="ubahberita")
          {
            include 'ubahberita.php';
          }
          elseif ($_GET['halaman']=="tambahberita")
          {
            include 'tambahberita.php';
          }
          elseif ($_GET['halaman']=="hapusberita")
          {
            include 'hapusberita.php';
          }
          elseif ($_GET['halaman']=="detailberita")
          {
            include 'detailberita.php';
          }
          elseif ($_GET['halaman']=="pembayaran")
          {
            include 'pembayaran.php';
          }
          elseif ($_GET['halaman']=="laporan_pembelian")
          {
            include 'laporan_pembelian.php';
          }
          elseif ($_GET['halaman']=="daftar_berita")
          {
            include 'daftar_berita.php';
          }
          elseif ($_GET['halaman']=="logout")
          {
            include 'logout.php';
          }
				}
				else
				{
					include 'home.php';
				}
			?>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
