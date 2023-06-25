<?php
include "config.php";

$username=$_POST["username"];
$ttl=$_POST["ttl"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$no_hp=$_POST["no_hp"];
$email=$_POST["email"];
$alamat=($_POST["alamat"]);


  $sql="insert into peserta (nama,ttl,jenis_kelamin,no_hp,email,alamat) values
		('$username','$ttl','$jenis_kelamin','$no_hp','$email','$alamat')";

  $hasil=mysqli_query($conn,$sql);

  if ($hasil) {
    $message = "Pendaftaran berhasil!";
    echo "<script>alert('$message');</script>";
	exit;
  }
else {
    $message2 = "Pendaftaran Gagal!";
    echo "<script>alert('$message2');</script>";
	exit;
}  

?>
