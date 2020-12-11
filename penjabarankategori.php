<?php 
  include 'saguhati.php';
  session_start();
  if(empty($_GET['k'])){
	header('location: kategori.php');
  }
$kat = strtoupper(substr($_GET['k'],0,1)).substr($_GET['k'],1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Kategori Produk <?= $kat; ?></title>
	<link rel="stylesheet" href="penjabarankategori.css">
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
				            }else{
				              echo '<li><a href="login.php">Account</a></li>';
				            }
				            ?>
					</ul>
				</nav>
				<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>
			</div>
			
			<div class="category">
				<nav>
					<ul id="CategoryMenu">
						<?php
							$a = $koneksi->query("SELECT distinct kategori FROM data_produk");
							while($r = $a->fetch_assoc()){
								echo '<li><a href="penjabarankategori.php?k='.$r['kategori'].'">'.strtoupper(substr($r['kategori'],0,1)).substr($r['kategori'],1).'</a></li>';
							}
						?>	
					</ul>
				</nav>
			</div>
			<br/>
			<h1><?= $kat; ?></h1>
			<?php
		$qs = $koneksi->query("SELECT * FROM data_produk where kategori='".$_GET['k']."' ORDER BY rand()");
		$i = 1;
			while($row = $qs->fetch_assoc()){
				if ($i==1 or ($i-1) %4  ==0){
					echo '<div class="row">';
				}
					echo '<div class="col-4">
					<a href="detailproduct.php?id='.$row['id'].'"><img src="'.$row["gambar"].'"></a>
					<h4>'.$row["nama_produk"].'</h4>
					<p>Rp'.number_format($row["harga"], 0, ".", ".").'</p>
					</div>';
					if ($i %4==0){
					echo '</div>';
					}
				$i++;
				
			}
		?>
			
			
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
		
</body>
</html>
