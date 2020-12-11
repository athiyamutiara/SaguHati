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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SAGU HATI | Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 </head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form" name="formlogin">
        <label for="user-email" style="padding-top:22px">
            &nbsp;Email
        </label>

       <input id="user-email" class="form-content" type="email" name="email" required />
        <div class="form-border"> </div>
        
        <label for="user-password" style="padding-top:22px">&nbsp;Password </label>

        <input id="user-password" class="form-content" type="password" name="password" required />

        <div class="form-border"></div>

        <input id="submit-btn" type="submit" name="submit" value="LOGIN"/>

        <a href="registrasi.php" id="signup">Don't have account yet?</a>

      </form>
    </div>
  </div>
</div>
</body>

  <?php 
  if (isset($_POST['submit'])){
    $q = $koneksi->query("select * from data_user where email = '".$_POST['email']."' ");
    if($q -> num_rows > 0){
		$qq = $q->fetch_assoc();
      if($qq['password']==$_POST['password']){
          $_SESSION['email']=$_POST['email'];
          if($qq['status'] == 'penjual'){
            header('location: home2.php');
          }else{
          header('location: home.php');}
      }else{
        echo "<script> alert('Username atau Password salah') </script>";
      }
    }else{
        echo "<script> alert('Username atau Password salah') </script>";
    }
  }
?>
</html>