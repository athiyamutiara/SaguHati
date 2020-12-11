<?php 
  include 'saguhati.php';
  session_start();
  if(empty($_GET['id'])){
	  header('location: home.php');
  }
  $pen=false;
  $getProductInfo = $koneksi->query("SELECT * FROM data_produk where id='".$_GET['id']."'")->fetch_assoc();
  if(!empty($_SESSION['email'])){
	$getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sagu Hati | Detail Product</title>
	<link rel="stylesheet" href="detailproduct.css">
	<!-- buat panggil ikon bintang!-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
						<?php
						if(!empty($_SESSION['email'])){
							if ($getUserLogin['status'] == 'pembeli'){
								echo '<li><a href="kategori.php">Product</a></li>';
							}else{
								echo '<li><a href="inputproduk.php">Input Product</a></li>';
							}
							echo '<li><a href="akun.php">Account</a></li>';
						}else{
							echo '<li><a href="login.php">Account</a></li>';
						}
						?>
						<?php  
               if ($getUserLogin['status'] == 'pembeli'){
              echo '<li><a href="c-pesanan.php">Pesanan Saya</a></li>';
            }
            ?>
				</ul>
				</nav>
				<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>
			</div>
		</div>

	<!---------------- single product details ---------------->
		<div class="small-container single-product">
			<div class="row">
				<div class="col-2">
				<img src="<?= $getProductInfo['gambar']; ?>" width="100%" id="ProductImg">
					<!--<div class="small-img-row">
						<div class="small-img-col">
							<img src="images/isibakpia.png" width="100%" class="small-img">
						</div>
						<div class="small-img-col">
							<img src="images/isibakpia2.jpg" width="100%" class="small-img">
						</div>
						<div class="small-img-col">
							<img src="images/bakpiatugu.jpeg" width="100%" class="small-img">
						</div>
					</div>-->
					<h3>Penilaian Produk</h3>
					<br>
							<!--<h5>Susan</h5> 
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>       4.6/5 </i>
							<p>Bakpia ini enak, lembut, banyak varian rasanya jadi sangat cocok untuk dijadikan oleh-oleh.</p>
							
							<br>
							
							<h5>Ari</h5> 
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>       3.5/5 </i>
							<p>Pengirimannya cepat, barang sampai dengan keadaan baik. Sangat memudahkan untuk mencari oleh-oleh khas Jogja.</p>
							
							<br>
							
							<h5>Rita</h5> 
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>      4.5/5 </i>
							<p>Seneng banget karna barang sesuai dengan yang ada digambar, enak dan banyak pilihan rasanya jadi gak bakal bosen, harganya juga terjangkau.</p>!-->

							<?php 
$a = array(
	'Anisa',
	'Alma',
	'Ghazy',
	'Addhy',
	'Bagas',
	'Naufal',
	'Fariz',
	'Athiya',
	'Mutiara',
	'Bintang',
	'Indah',
	'Ray',
	'Wahyu',
	'Lendy',
	'Fahlian',
	'Arfan',
	'Dede',
	'Fakhrul',
	'Abdullah',
	'Ilyas',
	'Julian',
	'Andhika',
	'Fajri',
	'Abdul',
	'Achmad',
	'Adrian',
	'Yosafat',
	'Alrendy',
	'Ario',
	'Rifqy',
	'Ari',
	'Farqy',
	'Emir',
	'Herdaru',
	'Andriawan',
	'Allen',
	'Dhika',
	'Sebastian',
	'Alrendy',
	'Sugraha',
	'Deka',
	'Fandy',
	'Emir',
	'Ariyadi',
	'Rinaldy',
	'Andhicha',
	'Fakhrul',
	'Kevin',
	'Permana',
	'Priyohadi',
	'Nauval',
	'Nicolas',
	'Ilham',
	'Juno',
	'Joseph',
	'Ario',
	'Adhim',
	'Sutrisno',
	'Vito',
	'Devito',
	'Farqy',
	'Fajar',
	'Derilandry',
	'Bony',
	'Pratama',
	'Sujendro',
	'Radja',
	'Mohammad',
	'Ariyadi',
	'Andrie',
	'Ryan',
	'Izhar',
	'Revi',
	'Cardito',
	'Sebastian',
	'Juno',
	'Sutrisno',
	'Finaldi',
	'Ferhat',
	'Elvin',
	'Fajri',
	'Ilyas',
	'Maruto',
	'Ressy',
	'Tubagus',
	'Syahdian',
	'Deka',
	'Jova',
	'Rizki',
	'Imam',
	'Tubagus'
	);
$b = array(
						'<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>       4/5 </i>',

							'<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>       3.5/5 </i>',

							'<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>      4.5/5 </i>',

							'<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i></i>      5/5 </i>');
$c = array(
	'Suka sama produknya karena gambarnya lucu-lucu.',
	'Pengirimannya cepat, barang sampai dengan keadaan baik.',
	'Produk bagus sesuai dengan yang ada difoto, harganya juga sesuai dengan dompet.',
	'Seneng banget belanja di Sagu Hati. Semoga semakin lebih baik kedepannya ya!.',
	'Terima kasih Sagu Hati, produknya bagus banget!',
	'Next time bakal pesan lagi di Sagu Hati, thank you!'
);
for ($i=0; $i <3 ; $i++) { 
$d = "<h5>".$a[rand(0,count($a)-1)]." ".$a[rand(0,count($a)-1)]."</h5>"; 
$d .= $b[rand(0,count($b)-1)];
$d .= "<p>".$c[rand(0,count($c)-1)]."</p>";
echo $d;
echo "<br>";
} 
?>
				</div>
				<div class="col-2">
					<br><br>
					<form action="" method="POST">
					<input type="hidden" value="<?= $getProductInfo['harga']; ?>" name="number"/>
					<h1><?= $getProductInfo['nama_produk']; ?></h1>
					<h3>Rp <span id="harga"><?= number_format($getProductInfo['harga'], 0, '', '.'); ?></span></h3>
					<br>
					<h5><i class="fa fa-map-pin "></i> <?= $getProductInfo['lokasi']; ?></i></h5>
					<br/>
					<h5 style="margin-bottom:-10px;margin-top:5px;">Variant(s)</h5>
					<select name="variant">
						<?php
							$var = explode('|', $getProductInfo['variant']);
							echo "<option disabled>== Pilih variant ==</option>";
							foreach ($var as $k){
								echo "<option value='".$k."'>".$k."</option>";
							}
						?>
					</select>
					<input type="number" value="1" name="qty" <?php if($pen){ echo 'disabled'; } ?>>
<?php
						if (!empty($_SESSION['email'])){
	if ($getUserLogin['status'] == 'penjual'){
		echo '<a href="editproduk.php?id='.$getProductInfo['id'].'" style="font-size:15px;padding-right:12px;width:140px;" class="btn">Edit Produk</a>';
	}else{
		echo '<input type="submit" name="tambah" style="font-size:15px;padding-right:12px;width:140px;" value="Tambah Produk" class="btn">';
	}
		
	}else{
		echo '<input type="submit" name="tambah" style="font-size:15px;padding-right:12px;width:140px;" value="Tambah Produk" class="btn">';
	}
					
?>
<br/>
					<br/>
					<?php
						if(isset($_POST['tambah'])){
							$keranjang = ["id_produk" => $getProductInfo['id'], "variant" => $_POST['variant'], "jumlah" => $_POST['qty']];
							if (empty($_SESSION['prod'])){
								$_SESSION['prod'][0] = $keranjang;
							}else{
								$j=0;
								foreach($_SESSION['prod'] as $i => $v){
									$dapat = false;
									if ($v['id_produk'] == $getProductInfo['id'] && $v['variant'] == $_POST['variant']){
										$dapat = true;
										$j = $i;
										break;
									}
								}
								if ($dapat){
									$_SESSION['prod'][$j]['jumlah'] += $_POST['qty'];
								}else{
									$_SESSION['prod'][count($_SESSION['prod'])] = $keranjang;
								}
							}
							echo '<font size="3">Produk telah ditambahkan kedalam keranjang!';
						}
					?>
					<br/><br/>
					</form>
					<h3>Detail Produk <i class="fa fa-indent"></i></h3>
					<br>
					<p><?= $getProductInfo['deskripsi']; ?></p>
				</div>
			</div>
		</div>
	
	
	<br><br>

	<!---------------- title ---------------->
	

	
	<!---------------- related products ---------------->
		<?php
		if (!empty($_SESSION['email'])){
			if ($getUserLogin['status'] == 'pembeli'){
				?>
				<div class="small-container">
			<div class="row row-2">
				<h2>Related Products</h2>
				<a href="kategori.php"><p>View More</p></a>
			</div>
		</div>
			<div class="small-container">
			<div class="row">
				<?php
				$qs = $koneksi->query("SELECT * FROM data_produk where kategori='".$getProductInfo['kategori']."' ORDER BY RAND() LIMIT 4");
				while($row = $qs->fetch_assoc()){
					echo '<div class="col-4">
					<a href="detailproduct.php?id='.$row['id'].'"><img src="'.$row["gambar"].'"></a>
					<h4>'.$row["nama_produk"].'</h4>
					<p>Rp'.number_format($row["harga"], 0, ".", ".").'</p>
				</div>';
				}
				?>
				
			</div>
		</div>
			<?php
			}
		}else{
			?>
			<div class="small-container">
			<div class="row row-2">
				<h2>Related Products</h2>
				<p>View More</p>
			</div>
		</div>
		<div class="small-container">
			<div class="row">
				<?php
				$qs = $koneksi->query("SELECT * FROM data_produk where kategori='".$getProductInfo['kategori']."' ORDER BY RAND() LIMIT 4");
				while($row = $qs->fetch_assoc()){
					echo '<div class="col-4">
					<a href="detailproduct.php?id='.$row['id'].'"><img src="'.$row["gambar"].'"></a>
					<h4>'.$row["nama_produk"].'</h4>
					<p>Rp'.number_format($row["harga"], 0, ".", ".").'</p>
				</div>';
				}
				?>
				
			</div>
		</div>
		<?php
		}
		?>
	
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

<!---------------- js for toggle menu ---------------->
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

<!---------------- js for galeri ---------------->

<script>
	var ProductImg = document.getElementById("ProductImg");
	var SmallImg = document.getElementByClassName("small-img");

	SmallImg[0].onclick = function()
	{
		ProductImg.src = SmallImg[0].src;
	}
	SmallImg[1].onclick = function()
	{
		ProductImg.src = SmallImg[1].src;
	}
	SmallImg[2].onclick = function()
	{
		ProductImg.src = SmallImg[2].src;
	}
	SmallImg[3].onclick = function()
	{
		ProductImg.src = SmallImg[3].src;
	}
</script>

</body>
<html>