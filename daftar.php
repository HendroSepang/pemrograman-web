<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h2>Form Pendaftaran</h2>
    <form action="simpan.php" method="post">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Nama Lengkap" />
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

        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>

    </form>
    <a style="float:right; background:blue; color:white; padding: 10px 20px; border-radius: 3px;" href="index.html" class="btn">Back</a>
</div>
</body>
</html>