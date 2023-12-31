<?php
@include 'config.php';

session_start();

$error = array();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:index.html');
      }
   }else{
      $error[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
   <form action="index.php" method="post">
      <h3>LOGIN</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="LOGIN" class="form-btn">
      <p>Belum Memiliki Akun? <a href="registrasi.php">Registrasi Disini</a></p>
   </form>
</div>
</body>
</html>
