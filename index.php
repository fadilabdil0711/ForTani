<?php
session_start() ;
include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			ForTani
		</title>
			<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
        <style>
            .nav-item a {
                color: white;
                font-size: 15pt;
            }

            body {
                background: url('assets/Frame 2.png') no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                overflow-x: hidden;
                font-family: 'Roboto', sans-serif;
                font-size: 16px;
            }
            .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            }

            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
            }

            .sidenav a:hover {
            color: #f1f1f1;
            }

            .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
            #box {
                position:relative;
                }
            #gambar {
                position: absolute;
                }
            #judul {
                position: relative;
                padding-left: 300px;
                padding-top: 100px;
                padding-right: 250px;
                    }
    </style>
	</head>
<body>
	<?php include "koneksi.php"; ?>
    <div class="container p-3">
    <div class="container p-3">
	<nav class="navbar navbar-default">
		<div class="container-fluid" style="color=#9D9191;">
			<ul class="nav nav-pills">
                <li><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></li>
				<li><img align="center" alt="Brand" src="admin/assets/img/logo1.png"></li>
				<li><a href="#">Berita</a></li>
				<li><a href="#">Forum</a></li>
				<li><a href="pasar.php">Pasar Tani</a></li>
			</ul>
			</div>
			</nav>
			</div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <?php if (isset($_SESSION["pelanggan"])): ?>
      <a href="logout.php">Logout</a></li>
      <?php else: ?>
      <a href="login.php">Login</a></li>
      <?php endif ?>
      <a href="admin/index.php">Admin</a>
      <a href="#">Contact</a>
      <a href="#">Bantuan</a>
      <a href="#">Tentang Kami</a>
    </div>

    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
      </script>
    <div id="box" class="container p-3">
        <img id="gambar" src="admin/assets/img/home.png" style="max-width:100%;">
        <h3 id="judul" >Website forum diskusi para petani untuk memudahkan petani dalam mencari informasi seputar pertanian.</h3>
    </div>
</body>
</html>