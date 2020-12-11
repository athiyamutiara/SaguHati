 <?php 
  include 'saguhati.php';
  session_start();

  	$getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
	   if ($getUserLogin['status'] == 'penjual'){
        header('location: home2.php');
	}
	$total = 0;
	foreach($_SESSION['prod'] as $value){
		$total += $koneksi->query("SELECT harga from data_produk where id='".$value['id_produk']."'")->fetch_assoc()['harga']*$value['jumlah'];
	}
	
?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Website</title>
	<link rel="stylesheet" href="halamanpembayaran.css">
</head>
<body>

	<div class="header">
		
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
						<li><a href="c-pesanan.php">Pesanan Saya</a></li>
					</ul>
				</nav>
				<img src="images/bag.png" width="50px" height="50px">
			</div>

	<h1>Pembayaran</h1>
	
	
		<div class="row">
			<div class="col-75">
				<div class="container" style="width:65%;">

				<div class="row">
				  <div class="col-50">
					<h3>Alamat Tagihan</h3>
					<br>
					<form action="" method="POST">
						<label for="fname"><i class="fa fa-user"></i>Nama Lengkap</label>
						<input type="text" id="fname" value="<?= $getUserLogin['nama_depan']." ".$getUserLogin['nama_belakang']; ?>" name="firstname" placeholder="Tuliskan Nama Lengkap" readonly>
						<label for="nohp"><i class="fa fa-nohp"></i>Nomor HP</label>
						<input type="text" id="nohp" value="<?= $getUserLogin['nomor_telepon']; ?>" name="nohp" placeholder="Tuliskan Nomor HP" readonly>
						<label for="adr"><i class="fa fa-address-card-o"></i>Alamat Lengkap</label>
						<input type="text" id="adr" value="<?= $getUserLogin['alamat']; ?>" name="address" placeholder="Tuliskan Alamat Lengkap" readonly>
						<label for="adr"><i class="fa fa-address-card-o"></i>Metode Pembayaran</label>
						<div class="custom-select">
						<select name="metode">
							<option value="0" disabled>Pilih Metode</option>
							<option value="Tunai">Tunai</option>
							<option value="Gopay">Gopay</option>
						</select>
						</div>
						<label for="total"><i class="fa fa-user"></i>Total Tagihan</label>
						<input type="text" value="Rp <?= number_format($total, 0, '', '.'); ?>" id="totsl" name="firstname" placeholder="" readonly>
						
						<input type="submit" style="width:100%;" name='co' value="CHECKOUT" class="btn">
					</form>
				  </div>
					<?php
						if (isset($_POST['co'])){
							$kode = generateRandomString();
							foreach ($_SESSION['prod'] as $value){
								$koneksi->query("INSERT INTO data_transaksi (kode_transaksi, id_produk, metode, jumlah_produk, total_harga, id_pembeli) values ('".$kode."', '".$value['id_produk']."', '".$_POST['metode']."', '".$value['jumlah']."', '".$value['jumlah']*$koneksi->query("SELECT harga from data_produk where id='".$value['id_produk']."'")->fetch_assoc()['harga']."', '".$getUserLogin['id']."')");
							}
							$_SESSION['prod'] = [];
							header('location: c-pesanan.php');
						}
					?>
				</div>
			  </form>
			</div>
		  </div>
		</div>
	</div>
	
	<!--------- footer --------->
	<div class="footer">         <!-- div class container dihapus -->
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
</html> 