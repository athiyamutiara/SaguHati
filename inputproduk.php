<?php 
  include 'saguhati.php';
  session_start();
  $getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
  if($getUserLogin['status'] == 'pembeli'){
    header('location: home.php');
  }
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
            <input type="text" name="namaproduk" class="input" id="namaproduk-input" required>
         </div>  
		 <div class="inputfield">
            <label>Kategori</label>
            <select class="input" name="kategori">
			<option value='batik'>Batik</option>
			<option value='mainan'>Mainan</option>
			<option value='makanan'>Makanan</option>
			<option value='rajut'>Rajut</option>
			<option value='rotan'>Rotan</option>
			</select>
         </div> 
		<div id="variant">
		 <div class="inputfield">
            <label id="variants-1">Variant ke-1</label>
            <input type="text" class="input" name="variant[]" id="variant-1" required>
         </div> 
		 </div><br/>
		<div class="inputfield">
			<button class="btn" type="button" onclick="tambahVariant()"name="input" id="tambah">Tambah Variant</button>&nbsp;<button class="btn" type="button" onclick="hapusVariant()" name="input" id="hapus" disabled>Hapus Variant</button> 
        </div>
         <div class="inputfield">
            <label>Harga</label>
            <input type="number" class="input" id="harga-input" name="harga" required>
         </div> 

         <div class="inputfield">
            <label>Lokasi</label>
            <input type="text" class="input" id="alamat-input" name="lokasi" required>
         </div> 

         <div class="inputfield">
            <label>Unggah Gambar Produk</label>
            <input type="file" class="input" id="gambar-input" name="gambar" required>
         </div> 
                         
        <div class="inputfield">
            <label>Deskripsi Produk</label>
            <textarea class="textarea" id="deskripsi-input" name="deskripsi" required></textarea>
         </div> 
                               
        <div class="inputfield">
        <input type="submit" class="btn" name="input" id="tambah" value="TAMBAH PRODUK">
        </div>
       
  </div>
</form>
</div>
<script>
	var i = 1;
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
	$allowed = array('png', 'jpg', 'jpeg', 'jfif');
	$filename = $_FILES['gambar']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if (in_array($ext, $allowed)) {
		if ($_FILES["gambar"]["size"] > 500000) {
		  echo "<script>File maksimal 500kb</script>";
		}else{
			$lok = "images/u".$getUserLogin['id']."".$_FILES["gambar"]["name"];
			if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $lok)){
				 $q = "insert into data_produk(nama_produk, harga, lokasi, gambar, deskripsi, variant, kategori)values('".$_POST['namaproduk']."','".$_POST['harga']."','".$_POST['lokasi']."','".$lok."', '".$_POST['deskripsi']."', '".$v."', '".$_POST['kategori']."')";
				  $sql = $koneksi -> query($q);
				  if ($sql){
					;
					header('location: detailproduct.php?id='.$koneksi->query("SELECT * FROM data_produk ORDER BY id DESC LIMIT 1")->fetch_assoc()['id']);
				  }else {
					echo $koneksi -> error;
				  }
			}
		}
	}else{
		echo "<script>File harus berupa gambar</script>";
	}
  }
  ?>
</html>