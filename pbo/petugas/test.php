<?php
include "../masyarakat/koneksi.php";

session_start();
if(!isset($_SESSION['id_petugas'])) {
  header("Location: login.php");
}

if (isset($_GET['id_pengaduan'])) {
  $id_pengaduan = $_GET['id_pengaduan'];
  $tanggapan = $_POST['tanggapan'];
  $tanggal = date("Y-m-d");
  $id_petugas = $_SESSION['id_petugas'];
    
  $update_query = "INSERT INTO `tanggapan`(tgl_tanggapan, tanggapan, id_petugas, id_pengaduan) VALUES ('$tanggal','$tanggapan','$id_petugas','$id_pengaduan')";
  
  if (mysqli_query($koneksi, $update_query)) {
      header("Location: hasil.php");
      exit();
  } else {
      echo "Error updating status: " . mysqli_error($koneksi);
  }
} else {
  echo "Invalid report ID.";
}


?>