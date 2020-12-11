<?php 
  include 'saguhati.php';
  session_start();
?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Keranjang</title>
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
							echo '<li><a href="c-pesanan.php">Pesanan Saya</a></li>';
 						}else{
 							echo '<li><a href="login.php">Account</a></li>';
 						}
						?>
					</ul>
				</nav>
				<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>
			</div>

	<h1>Keranjang Produk</h1>
	
	
		<div class="row">
			<div class="col-75">
				<div class="container">
				<?php
					if (isset($_POST['hapus-keranjang'])){
						foreach($_SESSION['prod'] as $i => $v){
							if ($v['id_produk'] == $_POST['id_produk']){
								unset($_SESSION['prod'][$i]);
								echo '<br/><center><font color=\'green\'>Keranjang berhasil diubah!</font></center>';
								break;
							}
						}
					}
				?>
				
				<table style="width:100%;">
				<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Variant</th>
				<th>Qty</th>
				<th>Total Harga</th>
				<th>Aksi</th>
				</tr>
				<?php
				$j = 0;
				foreach ($_SESSION['prod'] as $value){
					$j++;
					echo "<tr>";
					echo "<td>".$j."</td>";
					echo "<td>".$koneksi->query("SELECT nama_produk from data_produk where id='".$value['id_produk']."'")->fetch_assoc()['nama_produk']."</td>";
					echo "<td>".$value['variant']."</td>";
					echo "<td>".$value['jumlah']."</td>";
					echo "<td>Rp ".number_format($koneksi->query("SELECT harga from data_produk where id='".$value['id_produk']."'")->fetch_assoc()['harga']*$value['jumlah'], 0, '', '.')."</td>";
					echo "<td><form action='' method='post' style='all: none;' >
					<input type='hidden' name='id_produk' value='".$value['id_produk']."'/>
					<input type='hidden' name='variant' value='".$value['variant']."'/>
					<input type='hidden' name='jumlah' value='".$value['jumlah']."'/>
					<button type='submit' name='hapus-keranjang' style='height:40px;font-size:15px;' class='btn'>
					<span class='fa fa-trash'></span></input></form></td>";
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
				<?php
					if (count($_SESSION['prod']) > 0){
						if (empty($_SESSION['email'])){
							echo '<center><a href="login.php"><button class="btn"> Lanjutkan Pembayaran </button></a></center>';
						}else{
							echo '<center><a href="halamanpembayaran.php"><button class="btn"> Lanjutkan Pembayaran </button></a></center>';
						}
					}else{
						echo '<br/>';
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