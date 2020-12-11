<?php 
  include 'saguhati.php';
  session_start();
  if (!empty($_SESSION['email'])){
	$getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
	if ($getUserLogin['status'] == 'penjual'){
		header('location: home2.php');
	}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Website</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<div class="header">
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
			<div class="row">
				<div class="col-2">
					<h1>Lepaskan Rindumu<br>Kepada Jogja Melalui<br>Sagu Hati</h1>
					<p>Sagu Hati diciptakan untuk memudahkan Kamu dalam mencari dan membeli 
					kenang-kenangan secara online yang bisa diakses dimanapun dan kapanpun!</p>
					<a href="kategori.php" class="btn">Belanja Sekarang &#8594;</a>
				</div>
				<div class="col-2">
					<img src="images/jogja.jpeg" alt="">
				</div>
			</div>
		</div>
	</div>

	<!--------- featured categories --------->
	<div class="categories">
		<div class="small-container">
			<div class="row">
				<div class="col-3">
					<img src="images/kotakpensil.jpg">
				</div>
				<div class="col-3">
					<img src="images/kantong.jpg">
				</div>
				<div class="col-3">
					<img src="images/sandal.jpeg">
				</div>
			</div>
		</div>
	</div>
	
	<!--------- food products --------->
	<div class="small-container">
		<h2 class="title">Food Products</h2>
		<div class="row">
			<?php
				$qs = $koneksi->query("SELECT * FROM data_produk where kategori='makanan' ORDER BY RAND() LIMIT 4");
				while($row = $qs->fetch_assoc()){
					echo '<div class="col-4">
					<a href="detailproduct.php?id='.$row['id'].'"><img src="'.$row["gambar"].'"></a>
					<h4>'.$row["nama_produk"].'</h4>
					<p>Rp'.number_format($row["harga"], 0, ".", ".").'</p>
				</div>';
				}
			?>
		</div>
		
		<h2 class="title">Other Products</h2>
		<?php
		$qs = $koneksi->query("SELECT * FROM data_produk ORDER BY RAND() LIMIT 8");
		$i = 1;
			while($row = $qs->fetch_assoc()){
				if ($i==1 or $i == 5){
					echo '<div class="row">';
				}
					echo '<div class="col-4">
					<a href="detailproduct.php?id='.$row['id'].'"><img src="'.$row["gambar"].'"></a>
					<h4>'.$row["nama_produk"].'</h4>
					<p>Rp'.number_format($row["harga"], 0, ".", ".").'</p>
					</div>';
					if ($i==4 or $i == 8){
						echo '</div>';
					}
				$i++;
				
			}
		?>

	</div>
	
	<!--------- offer --------->
	<div class="offer">
		<div class="small-container">
			<div class="row">
				<div class="col-2">
					<img src="images/u4bakpiatugu.jpeg" class="offer-img">
				</div>
				<div class="col-2">
					<p>Best Seller di Sagu Hati</p>
					<h1>Bakpia Tugu</h2>
					<small>Siapa sih yang gak tau Bakpia Tugu ini. Wajib banget
					buat kamu cobain dan kamu hadiahkan untuk orang tersayangmu!
					Jangan sampai kehabisan ya!</small><br>
					<a href="detailproduct.php?id=2" class="btn">Beli Rp.45.000</a>
				</div>
			</div>
		</div>
	</div>

	<!--------- testimonial --------->
	<div class="testimonial">
		<div class="small-container">
		<h2 class="title">Testimonial</h2>
			<div class="row">
				<div class="col-3">
					<p>Senang banget sama Sagu Hati. Ketika lupa untuk beli oleh-oleh,
					Sagu Hati bisa jadi solusi agar aku tetap bisa 
					beli kenang-kenangan dari Jogja!</p>
					<img src = "images/athiya.png">
					<h3>Athiya Mutiara</h3>
				</div>
				<div class="col-3">
					<p>Aku barusan repurchase Bakpia Panggang dari Sagu Hati.
					Pas banget solusi untuk aku yang mager mau keluar,
					thank you Sagu Hati!</p>
					<img src = "images/anisa.jpg">
					<h3>Anisa Salsabila</h3>
				</div>
				<div class="col-3">
					<p>Bagus banget Baju Batiknya! Makasih ya Sagu Hati, pilihan
					yang tepat banget dan aku seneng sama barang yang aku beli dari
					Market Place ini.</p>
					<img src = "images/sheilla.jpeg">
					<h3>Sheilla Fajria</h3>
				</div>
			</div>
		</div>
	</div>
	
	<!--------- footer --------->
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

	<!--------- js for toggle menu --------->
<script>
	var MenuItems = document.getElementById("MenuItems");
	
	MenuItems.style.maxHeight = "0px";
	
	function menutoggle() {
		if(MenuItems.style.maxHeight == "0px")
			{
				MenuItems.style.maxHeight = "200px";
			}
		else
			{
				MenuItems.style.maxHeight = "0px";
			}
	}
</script>

</body>
<html>