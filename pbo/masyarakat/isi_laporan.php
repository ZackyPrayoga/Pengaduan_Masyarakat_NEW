<?php
session_start();
if(!isset($_SESSION['nik'])) {
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">Pengaduan Masyarakat</div>
            <ul class="nav-links">  
        <li><a href="home.php">Home</a></li>
        <li><a href="isi_laporan.php">Buat Laporan</a></li>
        <li><a href="hasil.php">Hasil Laporan</a></li> 
        <li><a href="logout.php">Log Out</a></li> 
            </ul>
          </nav>
    </header>
    <div class="container" style="padding: 30px; background-color: transparent; margin-top: 50px; box-shadow: 0 4px 8px 0rgba(0,0,0,0.2) 0 6px rgba(0, 0, 0, 0.19);">
    <form action="test.php" method="POST" enctype="multipart/form-data">
    <h1 style="margin-top: 30px; text-align: center; color: white;">Buat Laporan</h1>
    <div class="container">
      <div class="mb-3">
        <label for="isi_laporan" class="form-label" style="color: white;">Laporan Kalian</label>
        <textarea class="form-control" id="isi_laporan" name="isi_laporan" required></textarea>
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label" style="color:  white;">Bukti Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" required>
      </div>
      <button class="btn btn-danger" type="submit">Kirim</button>
    </div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>