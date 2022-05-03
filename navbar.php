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
    </style>
	
<div class="container p-3">
	<nav class="navbar navbar-default">
				<div class="container-fluid" style="color=#9D9191;">
					<ul class="nav nav-pills">
						<li><img align="center" alt="Brand" src="admin/assets/img/logo1.png"></li>
						<li><a href="index.php">Home</a></li>
           				<li><a href="pasar.php">Belanja</a></li>
						<li><a href="keranjang.php">Keranjang</a></li>
						<li><a href="checkout.php">Checkout</a></li>

						<?php if (isset($_SESSION["pelanggan"])): ?>
						<li><a href="riwayat.php">Riwayat</a></li>
						<li><a href="logout.php">Logout</a></li>

						<?php else: ?>
						<li><a href="login.php">Login</a></li>
						<?php endif ?>
					</form>
					</ul>
				</div>
			</nav>
			</div>