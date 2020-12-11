<?php 
  include 'saguhati.php';
  session_start();
	$getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
	if($getUserLogin['status'] == 'pembeli'){
		header('location: home.php');
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
						<li><a href="home2.php">Home</a></li>
						<li><a href="inputproduk.php">Input Product</a></li>
						<?php  
						if (!empty($_SESSION['email'])){
 							echo '<li><a href="akun.php">Account</a></li>';
 						}else{
 							echo '<li><a href="login.php">Account</a></li>';
 						}
						?>
					</ul>
				</nav>
				</div>
		</div>
	</div>

	
	<!--------- food products --------->
	<div class="small-container">
	<br/>
		<h2 class="title">Your Product(s)</h2>
<?php
		$qs = $koneksi->query("SELECT * FROM data_produk where id_penjual='".$getUserLogin['id']."' ORDER BY rand()");
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