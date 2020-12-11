<?php 
  include 'saguhati.php';
  session_start();
	$getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Pesanan Saya</title>
	<link rel="stylesheet" href="halamanpembayaran.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	table{
		margin-top:10px;
		border-right: 2px solid #251300;
		border-left: 2px solid #251300;
		border-collapse: collapse;
		
		text-align:center;
	}
	tr{
		display: table-row;
		    border-color: inherit;
	}
	th, td{
		vertical-align: top;
		padding: 0.75rem;
		border: 2px solid #251300;
	}
	</style>
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
				<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>
			</div>

	<h1>Pesanan Saya</h1>
		<div class="row">
			<div class="col-75">
				<div class="container">
				
				<table style="width:100%;">
				<tr>
				<th>Kode Transaksi</th>
				<th>Qty</th>
				<th>Metode</th>
				<th>Total Harga</th>
				</tr>
				<?php
				$q = $koneksi->query("SELECT jumlah_produk, metode, id_produk, kode_transaksi, sum(total_harga) as t, id_pembeli fROM data_transaksi where id_pembeli='".$getUserLogin['id']."' GROUP BY kode_transaksi");
				while($r = $q->fetch_assoc()){
					echo "<tr>";
					echo "<td><b>#</b> ".$r['kode_transaksi']."</td>";
					echo "<td>".$r['jumlah_produk']."</td>";
					echo "<td>".$r['metode']."</td>";
					echo "<td>Rp ".number_format($r['t'], 0, '', '.')."</td>";
					echo "</tr>";
				}
				?>
				</table>
				<!--<div class="row">
				  <div class="col-50">
					<h3>Alamat Tagihan</h3>
					<br>
					<label for="fname"><i class="fa fa-user"></i>Nama Lengkap</label>
					<input type="text" id="fname" name="firstname" placeholder="Tuliskan Nama Lengkap">
					<label for="nohp"><i class="fa fa-nohp"></i>Nomor HP</label>
					<input type="text" id="nohp" name="nohp" placeholder="Tuliskan Nomor HP">
					<label for="adr"><i class="fa fa-address-card-o"></i>Alamat Lengkap</label>
					<input type="text" id="adr" name="address" placeholder="Tuliskan Alamat Lengkap">
					<label for="adr"><i class="fa fa-address-card-o"></i>Metode Pembayaran</label>
					<div class="custom-select">
					<select>
						<option value="0">Pilih Metode</option>
						<option value="1">Tunai</option>
						<option value="2">Gopay</option>
					</select>
					</div>
					<label for="total"><i class="fa fa-user"></i>Total Tagihan</label>
					<input type="text" id="totsl" name="firstname" placeholder="">
				  </div>!-->
				<br/>
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