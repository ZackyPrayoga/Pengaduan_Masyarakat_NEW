<?php
include "../masyarakat/koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if (isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    
    $update_query = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'";
    
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
