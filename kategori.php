<?php 
  include 'saguhati.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Kategori</title>
	<link rel="stylesheet" href="kategori.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="container">
		<div class="navbar">
		<div class="logo">
			<img src="images/logo.png" width="250px">
		</div>
		<nav>
			<ul id="MenuItems">
				<li><a href="home.php">Home</a></li>
				<li><a href="kategori.php">Products</a></li>
				<?php  
						if (!empty($_SESSION['email'])){
 							echo '<li><a href="akun.php">Account</a></li>';
							echo '<li><a href="c-pesanan.php">Pesanan Saya</a></li>';
 						}else{
 							echo '<li><a href="login.php">Account</a></li>';
 						}
						?>
			</ul>
		</nav>
		<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>
	</div>
	
	</div>


<!---------- categories -------->
<h1>Shop by Categories</h1>
<br>
<div class="container">
	
	<div class="card">
		<a href="penjabarankategori.php?k=makanan"><img src="images/gudeg.png"></a>
		<h2>Makanan</h2>
	</div>
	<div class="card">
		<a href="penjabarankategori.php?k=batik"><img src="images/batik-pria.png"></a>
		<h2>Batik</h2>
	</div>
	<div class="card">
		<a href="penjabarankategori.php?k=rotan"><img src="images/tasrotan.jpeg"></a>
		<h2>Rotan</h2>
	</div>
	<div class="card">
		<a href="penjabarankategori.php?k=rajut"><img src="images/rajut.jpg"></a>
		<h2>Rajut</h2>
	</div>
	<div class="card">
		<a href="penjabarankategori.php?k=mainan"><img src="images/toy.jpg"></a>
		<h2>Mainan</h2>
	</div>
</div>

<!---------------- footer ---------------->
		<div class="footer">
			<div class="container">
				<div class= "row">
					<div class="footer-col-1">
						<h3>Information</h3>
						<ul>
							<li>About Us</li>
							<li>Contact Us</li>
							<li>Privacy Policy</li>
						</ul>
					</div>
					<div class="footer-col-2">
						<h3>Follow Us</h3>
						<ul>
							<li>Instagram</li>
							<li>Youtube</li>
							<li>LINE</li>
						</ul>
					</div>
				</div>
				<hr>
				<p class="copyright">Copyright 2020 - Sagu Hati</p>
			</div>
		</div>
</body>
</html>

