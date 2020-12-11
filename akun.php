<?php 
  include 'saguhati.php';
  session_start();
  if (empty($_SESSION['email'])){
 header('location: login.php');
  }
 $getUserLogin = $koneksi->query("SELECT * from data_user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sagu Hati | Account</title>
  <link rel="stylesheet" href="akun.css">
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
            <?php  
               if ($getUserLogin['status'] == 'pembeli'){
              echo '<li><a href="home.php">Home</a></li>';
            }else{
              echo '<li><a href="home2.php">Home</a></li>';
            }
            ?>
           <?php  
               if ($getUserLogin['status'] == 'pembeli'){
              echo '<li><a href="kategori.php">Product</a></li>';
            }else{
              echo '<li><a href="inputproduk.php">Input Product</a></li>';
            }
            ?>
             <li><a href="akun.php">Account</a></li>
             <?php  
               if ($getUserLogin['status'] == 'pembeli'){
              echo '<li><a href="c-pesanan.php">Pesanan Saya</a></li>';
            }
            ?>
             
          </ul>
        </nav>
		<?php  
			if ($getUserLogin['status'] == 'pembeli'){
              echo '<a href="keranjang.php"><img src="images/bag.png" width="50px" height="50px"></a>';
            }
            ?>
        
        </div>

  <div class="wrapper">
    <div class="title">
      PROFILE
    </div>
    <div class="form">
       <form id="regis-form" method="POST">
         
         <div class="inputfield">
            <label>Nama Depan</label>
            <input type="text" name="namadepan" class="input" id="namadepan-input" value="<?= $getUserLogin['nama_depan'];?>" required>
         </div>  
         
         <div class="inputfield">
            <label>Nama Belakang</label>
            <input type="text" class="input" id="namabelakang-input" name="namabelakang" value="<?= $getUserLogin['nama_belakang'];?>" required>
         </div>  
                
          <div class="inputfield">
            <label>Tanggal Lahir</label>
            <input type="date" id="tanggallahir" name="tanggal_lahir" class="input" value="<?= $getUserLogin['tanggal_lahir'];?>"required>
          </div>

          <div class="inputfield">
          <label>Jenis Kelamin</label>
          <?php if($getUserLogin['jenis_kelamin']=='Pria'){
            echo '<input type="radio" id="laki-laki" class="input" value="Pria" name="jenis_kelamin" style="margin-left: 25px"checked>
                  <label>Pria</label><br>
                  <input type="radio" id="perempuan" class="input" value="Wanita" name="jenis_kelamin">
                  <label>Wanita</label><br>';  
          }else{
            echo '<input type="radio" id="laki-laki" class="input" value="Pria" name="jenis_kelamin" style="margin-left: 25px">
                  <label>Pria</label><br>
                  <input type="radio" id="perempuan" class="input" value="Wanita" name="jenis_kelamin"checked>
                  <label>Wanita</label><br>';  
          } ?>
          </div> 
          
          <div class="inputfield">
            <label>Alamat Email</label>
            <input type="email" class="input" id="email-input" name="alamat_email" value="<?= $getUserLogin['email'];?>" required>
         </div> 
        
        <div class="inputfield">
            <label>Nomor Telepon</label>
            <input type="text" class="input" id="nomortelepon-input" name="nomor_telepon" value="<?= $getUserLogin['nomor_telepon'];?>" required>
         </div> 
        
        <div class="inputfield">
            <label>Alamat</label>
            <textarea class="textarea" id="alamat-input" name="alamat" required><?= $getUserLogin['alamat'];?></textarea>
         </div> 
        
        <div class="inputfield">
            <label>Kode Pos</label>
            <input type="text" class="input" id="kodepos-input" name="kode_pos" value="<?= $getUserLogin['kode_pos'];?>"required>
         </div> 
                       
        <div class="inputfield">
        <input type="submit" class="btn" name="input" id="daftar" value="UPDATE">
        </div>

        <center><a href="logout.php" id="signin">LOGOUT</a></center>
  </div>
</form>
</div>
</body>
<?php 
if(isset($_POST['input'])){
  $q = "UPDATE data_user set nama_depan = '".$_POST['namadepan']."', nama_belakang = '".$_POST['namabelakang']."', tanggal_lahir = '".$_POST['tanggal_lahir']."', jenis_kelamin = '".$_POST['jenis_kelamin']."', email = '".$_POST['alamat_email']."', nomor_telepon = '".$_POST['nomor_telepon']."', alamat = '".$_POST['alamat']."', kode_pos = '".$_POST['kode_pos']."' where id = '".$getUserLogin['id']."'";
  $_SESSION['email']=$_POST['alamat_email'];
  $koneksi -> query($q); 
  echo $koneksi -> error;
  header('refresh: 0; url = akun.php');
} ?>
</html>