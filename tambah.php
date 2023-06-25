<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "config.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $ttl=input($_POST["ttl"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $no_hp=input($_POST["no_hp"]);
        $email=input($_POST["email"]);
        $alamat=input($_POST["alamat"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (nama,ttl,jenis_kelamin,no_hp,email,alamat) values
		('$nama','$ttl','$jenis_kelamin','$no_hp', '$email','$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:admin.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" />
        </div>
	<div class="form-group">
            <label>TTL:</label>
            <input type="text" name="ttl" class="form-control" placeholder="Masukan TTL" />
        </div>
	<div class="form-group">
	     <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin">
         <option value="Laki-laki">Laki-Laki</option>
         <option value="Perempuan">Perempuan</option>
      </select>
	</div> 
   <div class="form-group">
            <label>No HP:</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukan No HP" />
        </div>
	<div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" />
        </div>
	<div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="2"placeholder="Masukan Alamat" ></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
</body>
</html>