<?php 
session_start();


if (!isset($_SESSION['id_petugas'])) {
    header("Location: login.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/home.css">
  <title>Pengaduan Masyarakat</title>
</head>
<body>
  <header>
    <nav>
      <div class="logo">Pengaduan Masyarakat</div>
      <ul class="nav-links">  
        <li><a href="home.php">Home</a></li>
        <li><a href="hasil.php">Verifikasi Laporan</a></li> 
        <li><a href="logout.php">Log Out</a></li> 
      </ul>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>Selamat Datang Petugas</h1>
    </div>
    </section>
</html>
