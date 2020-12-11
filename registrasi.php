<?php 
include 'saguhati.php';
session_start(); 
if (!empty($_SESSION['email'])){
header('location: home.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sagu Hati | Registrasi</title>
	<link rel="stylesheet" href="registrasi.css">
</head>
<body>
	<div class="wrapper">
    <div class="title">
      REGISTRASI
    </div>
    <div class="form">
       <form id="regis-form" method="POST">
	       
	       <div class="inputfield">
	          <label>Nama Depan</label>
	          <input type="text" name="namadepan" class="input" id="namadepan-input" required>
	       </div>  
	       
	       <div class="inputfield">
	          <label>Nama Belakang</label>
	          <input type="text" class="input" id="namabelakang-input" name="namabelakang" required>
	       </div>  
	       
	       <div class="inputfield">
	          <label>Password</label>
	          <input type="password" class="input" id="password-input" name="password" onkeyup="checkpw()" required>
	       </div>  
	      	
	      	<div class="inputfield">
	          <label>Konfirmasi Password</label>
	          <input type="password" name="konfirmasi_password" class="input" id="konfirmasipassword-input" onkeyup="checkpw()" required>
	          </div> 
	        <p style="color: red; margin-left: 140px; display: none;" id="konfirmasi">Password tidak sesuai. <br><br></p>
	       	
	        <div class="inputfield">
	          <label>Tanggal Lahir</label>
	          <input type="date" id="tanggallahir" name="tanggal_lahir" class="input"required>
	      	</div>

	      	 <div class="inputfield">
	          <label>Status</label>
	          <div class="custom_select">
	            <select id="status-input" name="status">
	              <option value="" disabled>Pilih</option>
	              <option value="penjual" required>Penjual</option>
	              <option value="pembeli" required>Pembeli</option>
	            </select>
	          </div>
	       </div> 

	        <div class="inputfield">
	        <label>Jenis Kelamin</label>
	        <input type="radio" id="laki-laki" class="input" value="Pria" name="jenis_kelamin" style="margin-left: 25px"required>
  				<label>Pria</label><br>
  			<input type="radio" id="perempuan" class="input" value="Wanita" name="jenis_kelamin"required>
  				<label>Wanita</label><br>
	        </div> 
	       	
	        <div class="inputfield">
	          <label>Alamat Email</label>
	          <input type="email" class="input" id="email-input" name="alamat_email" required>
	       </div> 
	      
	      <div class="inputfield">
	          <label>Nomor Telepon</label>
	          <input type="text" class="input" id="nomortelepon-input" name="nomor_telepon" required>
	       </div> 
	      
	      <div class="inputfield">
	          <label>Alamat</label>
	          <textarea class="textarea" id="alamat-input" name="alamat" required></textarea>
	       </div> 
	      
	      <div class="inputfield">
	          <label>Kode Pos</label>
	          <input type="text" class="input" id="kodepos-input" name="kode_pos" required>
	       </div> 
	      
	      <div class="inputfield terms">
	          <label class="check">
	            <input type="checkbox" name="validasi" required>
	            <span class="checkmark"></span>
	          </label>
	          <p>Setuju dengan syarat dan ketentuan.</p>
	       </div> 
	      
	      <div class="inputfield">
	      <input type="submit" class="btn" name="input" id="daftar" value="Daftar">
	      </div>
	      <center><a href="login.php" id="signin">Have account yet?</a></center>
	</div>
</form>
</div>
<script>
	function checkpw(){
		if (document.getElementById("password-input").value !== document.getElementById("konfirmasipassword-input").value){
			document.getElementById("konfirmasi").style.display="block";
			document.getElementById("daftar").disabled=true;
		}else{
			document.getElementById("konfirmasi").style.display="none";
			document.getElementById("daftar").disabled=false;
		}
	}
</script>

</body>
<?php 
if (isset($_POST['input'])){
	if ($koneksi->query("SELECT * FROM data_user where email='".$_POST['alamat_email']."' ")->num_rows > 0){
		echo '<script>alert("Email telah digunakan.");</script>';
	}else{
		$q = "insert into data_user(nama_depan, nama_belakang, password, tanggal_lahir, status, jenis_kelamin, email, nomor_telepon, alamat, kode_pos) values('".$_POST['namadepan']."','".$_POST['namabelakang']."','".$_POST['password']."','".$_POST['tanggal_lahir']."', '".$_POST['status']."','".$_POST['jenis_kelamin']."','".$_POST['alamat_email']."','".$_POST['nomor_telepon']."','".$_POST['alamat']."','".$_POST['kode_pos']."')";
		$sql = $koneksi -> query($q);
		if ($sql){
			header('location: login.php');
		}else {
			echo $koneksi -> error;
		}
	}
}
?>
</html>