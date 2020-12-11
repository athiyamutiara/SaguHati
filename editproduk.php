<?php 
  include 'saguhati.php';
  session_start();
  error_reporting(0);
  $getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
  if($getUserLogin['status'] == 'pembeli'){
    header('location: home.php');
  }
    if(empty($_GET['id'])){
	  header('location: home.php');
  }
    $getProductInfo = $koneksi->query("SELECT * FROM data_produk where id='".$_GET['id']."'")->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sagu Hati | Input Product</title>
  <link rel="stylesheet" href="inputproduk.css">
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
            <li><a href="akun.php">Account</a></li>
          </ul>
        </nav>
        </div>

  <div class="wrapper">
    <div class="title">
      Input Product
    </div>
    <div class="form">
       <form id="input-form" method="POST" enctype="multipart/form-data">
         
         <div class="inputfield">
            <label>Nama Produk</label>
            <input type="text" name="namaproduk" class="input" value="<?= $getProductInfo['nama_produk']; ?>" id="namaproduk-input" required>
         </div>  
		 <div class="inputfield">
            <label>Kategori</label>
            <select class="input" name="kategori">
			<?php
				if ($getProductInfo['kategori'] == 'batik'){
					echo "<option value='batik' selected>Batik</option>";
				}else{
					echo "<option value='batik'>Batik</option>";
				}
				if ($getProductInfo['kategori'] == 'mainan'){
					echo "<option value='mainan' selected>Mainan</option>";
				}else{
					echo "<option value='mainan'>Mainan</option>";
				}
				if ($getProductInfo['kategori'] == 'makanan'){
					echo "<option value='makanan' selected>Makanan</option>";
				}else{
					echo "<option value='makanan'>Makanan</option>";
				}
				if ($getProductInfo['kategori'] == 'rajut'){
					echo "<option value='rajut' selected>Rajut</option>";
				}else{
					echo "<option value='rajut'>Rajut</option>";
				}
				if ($getProductInfo['kategori'] == 'rotan'){
					echo "<option value='rotan' selected>Rotan</option>";
				}else{
					echo "<option value='rotan'>Rotan</option>";
				}
			?>
			</select>
         </div> 
		<div id="variant">
		<?php
		$a = explode('|', $getProductInfo['variant']);
		$j = 0;
		foreach($a as $i => $o){
			$i++;
			echo '		 <div class="inputfield" id="variant-'.$i.'">
            <label >Variant ke-'.$i.'</label>
            <input type="text" value="'.$o.'" class="input" name="variant[]" required>
         </div>';
			$j = $i;
		}
		?> 
		 </div><br/>
		<div class="inputfield">
			<button class="btn" type="button" onclick="tambahVariant()"name="input" id="tambah">Tambah Variant</button>&nbsp;<button class="btn" type="button" onclick="hapusVariant()" name="input" id="hapus" >Hapus Variant</button> 
        </div>
         <div class="inputfield">
            <label>Harga</label>
            <input type="number" value="<?= $getProductInfo['harga']; ?>" class="input" id="harga-input" name="harga" required>
         </div> 

         <div class="inputfield">
            <label>Lokasi</label>
            <input type="text" class="input" value="<?= $getProductInfo['lokasi']; ?>" id="alamat-input" name="lokasi" required>
         </div> 

         <div class="inputfield">
            <label>Unggah Gambar Produk</label>
            <input type="file" class="input" id="gambar-input" name="gambar">
         </div> 
                         
        <div class="inputfield">
            <label>Deskripsi Produk</label>
            <textarea class="textarea" id="deskripsi-input" name="deskripsi" required><?= $getProductInfo['deskripsi']; ?></textarea>
         </div> 
                               
        <div class="inputfield">
        <input type="submit" class="btn" name="input" id="tambah" value="EDIT PRODUK">
        </div>
       
  </div>
</form>
</div>
<script>
	var i = <?= $j; ?>;
	function tambahVariant(){
		i++;
		var div = document.createElement("div");
		div.setAttribute("class", "inputfield");
		div.setAttribute("id", "variant-"+i);
		var element = document.createElement("input");
		element.setAttribute("name", "variant[]");	
		element.setAttribute("type", "text");	
		element.setAttribute("class", "input");		
		var label = document.createElement("label");
		var labeltext = document.createTextNode("Variant ke-"+i);    
		label.appendChild(labeltext);
		div.appendChild(label);
		div.appendChild(element);
		document.getElementById("variant").appendChild(div);
		if (i > 1){
			document.getElementById("hapus").disabled = false;
		}
	}
	function hapusVariant(){
		document.getElementById("variant-"+i).remove();

		i--;
		if (i < 2){
			document.getElementById("hapus").disabled = true;
		}
	}
</script>
</body>
<?php 
if(isset($_POST['input'])){
	$v = "";
	foreach ($_POST['variant'] as $i => $value){
		if ($i+1 == count($_POST['variant'])){
			$v .= $value;
		}else{
			$v .= $value."|";
		}
	}
	if(empty($_FILES['gambar']['name'])){
		$q = $koneksi->query("UPDATE data_produk set nama_produk='".$_POST['namaproduk']."',
		harga='".$_POST['harga']."',
		lokasi='".$_POST['lokasi']."',
		deskripsi='".$_POST['deskripsi']."',
		variant='".$v."',
		kategori='".$_POST['kategori']."' where id='".$getProductInfo['id']."'");
	}else{
		$allowed = array('png', 'jpg', 'jpeg', 'jfif');
		$filename = $_FILES['gambar']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
			if ($_FILES["gambar"]["size"] > 500000) {
			  echo "<script>File maksimal 500kb</script>";
			}else{
				$lok = "images/u".$getUserLogin['id']."".$_FILES["gambar"]["name"];
				if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $lok)){
					$q = $koneksi->query("UPDATE data_produk set nama_produk='".$_POST['namaproduk']."',harga='".$_POST['harga']."',lokasi='".$_POST['lokasi']."', deskripsi='".$_POST['deskripsi']."',variant='".$v."',kategori='".$_POST['kategori']."',gambar='".$lok."' where id='".$getProductInfo['id']."'");
				}
			}
		}else{
			echo "<script>File harus berupa gambar</script>";
		}
	}
	if ($q){				
		return header('refresh: 1');
	}else {
		return header('refresh: 1');
	}
  }
  
  ?>
</html>