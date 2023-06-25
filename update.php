<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    include "config.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
  
    if (isset($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta=$id_peserta";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_peserta=htmlspecialchars($_POST["id_peserta"]);
        $nama=input($_POST["nama"]);
        $ttl=input($_POST["ttl"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $no_hp=input($_POST["no_hp"]);
        $email=input($_POST["email"]);
        $alamat=input($_POST["alamat"]);

        $sql="update peserta set
			nama='$nama',
			ttl='$ttl',
			jenis_kelamin='$jenis_kelamin',
			no_hp='$no_hp',
            email='$email',
			alamat='$alamat'
			where id_peserta=$id_peserta";

        $hasil=mysqli_query($conn,$sql);

        if ($hasil) {
            header("Location:admin.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
        <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>