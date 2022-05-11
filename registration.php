<?php
include 'koneksi.php';

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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


    <!-- <nav class="navbar navbar-default">
            <div class="container" color="blue">
                <ul class="nav nav-pills">
                    <li><a href="index.php">Home</a></li>
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
        </nav> -->



    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2> Pendaftaran Akun User ForTani</h2>
               
                <h5>( Registrasi terlebih dahulu untuk mendapatkan akses )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           <center><img align="center" alt="Brand" src="admin/assets/img/key.png" width=20%></center>
                            </div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Nama Anda" name="nama" required />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" id="email" class="form-control" placeholder="Alamat Email" name="email" required/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Masukkan Password" name="pass" required />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Masukkan Ulang Password" name="pass2" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" placeholder="Telepon Anda" name="telepon" required/>
                                        </div>

                                        <button class="btn btn-success" name="registrasi">Registrasi</button>

                                        <?php 
                                        if (isset($_POST['registrasi']))
                                        {
                                            if ('$_POST[nama]')
                                            {
                                                echo "<div class='alert alert-info'>Lengkapi form pendaftaran</div>";
                                                echo "<meta http-equiv='refresh' content='1;url=registration.php'>";
                                            }
                                            $koneksi->query("INSERT INTO pelanggan (email_pelanggan,pass_pelanggan,nama_pelanggan,telepon_pelanggan)
                                                VALUES ('$_POST[email]','$_POST[pass]','$_POST[nama]','$_POST[telepon]')");

                                            echo "<script>alert ('Regiistrasi Akun Berhasil'); </script>";
                                            echo "<div class='alert alert-info'>Akun Berhasil ditambahkan</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }
                                        ?>


                                    Sudah Punya Akun ?  <a href="login.php" >Login disini</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
