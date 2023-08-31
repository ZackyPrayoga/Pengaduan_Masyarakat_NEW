<?php
include "../masyarakat/koneksi.php";

session_start();
if (!isset($_SESSION['id_petugas'])) {
    header("Location: login.php");
    exit();
}

// ... kode lainnya ...

// Jika id_pengaduan diberikan melalui query string
if (isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_pengaduan = '$id_pengaduan'");
    $tanggapanData = mysqli_fetch_array($query);

    // Tampilkan tanggapan berdasarkan id_pengaduan
    echo "<p>Tanggapan untuk Pengaduan dengan ID: $id_pengaduan</p>";
    echo "<p>Tanggapan: " . $tanggapanData['tanggapan'] . "</p>";
} else {
    // Jika tidak ada id_pengaduan, tampilkan tabel pengaduan
    // ... kode untuk menampilkan tabel pengaduan ...
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Admin</title>
  
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
  <div class="container">
    <h1 style="margin-top: 30px; text-align: center; color: #C70039; font-weight: bold;">Pengaduan Masyarakat</h1>
    <table class="table" style="margin-top: 50px;">
      <thead style="text-align: center;">
        <tr class="table-dark" >
          <th scope="col">Id_Pengaduan</th>
          <th scope="col">Tanggal_pengaduan</th>
          <th scope="col">NIK</th>
          <th scope="col">Isi_Laporan</th>
          <th scope="col">Foto</th>
          <th scope="col">Tanggapan</th>
          <th scope="col">Status</th>
          <th scope="col">Opsi</th>
        </tr> 
      </thead>
      <tbody style="text-align: center;" >
      <?php
        
        $sql ="SELECT *
        FROM tanggapan
        right JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan";
        // $query = mysqli_query($koneksi, $sql)->fetch_all(MYSQLI_ASSOC);
        // // $pengadu = mysqli_fetch_all($query);
        // echo "<pre>";
        // print_r($query);
        // echo "</pre>";
        // die();

        $dataPengadu = mysqli_query($koneksi, $sql)->fetch_all(MYSQLI_ASSOC);
        foreach ($dataPengadu as $pengadu) {
          // echo $pengadu['nik'];
          // die();
          
          echo "<tr class=table-secondary>";

          echo "<td>" . $pengadu['id_pengaduan'] . "</td>";
          echo "<td>" . $pengadu['tgl_pengaduan'] . "</td>";
          echo "<td>" . $pengadu['nik'] . "</td>";
          echo "<td>" . $pengadu['isi_laporan'] . "</td>"; ?>

            <td><img width="180px" height="120px" src="../foto/<?= $pengadu['foto'] ?>" alt=""></td>

        <?php
            $pengaduan = $pengadu['tanggapan']?$pengadu['tanggapan']:'Belum Di Tanggapi';
            echo "<td>". $pengaduan . "</td>";
            echo "<td>" . $pengadu['status'] . "</td>";
            echo "<td>";
            echo "<div class='btn-group gap-2' role='group' aria-label='Basic example'>";
            echo 
            $pengadu['status']=='proses' || $pengadu['status']=='selesai'?null: 
            "<a href='terima.php?id_pengaduan=" . $pengadu['id_pengaduan'] . "' class='btn btn-primary btn-sm' tabindex='-1' role='button'>Terima</a>"; 
            echo  $pengadu['status']=='selesai' || $pengadu['status']=='0' ?null: 
             "<a href='selesai.php?id_pengaduan=" . $pengadu['id_pengaduan'] . "' class='btn btn-success btn-sm' tabindex='-1' role='button'>Selesai</a>";
             echo "<a href='tanggapan.php?id_pengaduan=" . $pengadu['id_pengaduan'] . "' class='btn btn-warning btn-sm' tabindex='-1' role='button'>Tanggapi</a>";
             echo"<a href='hapus.php?id_pengaduan=" . $pengadu['id_pengaduan'] . "' class='btn btn-danger btn-sm' tabindex>Tolak</a>";

            echo "</td>";
            echo "</div>";
            echo "</td>";
          

          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>