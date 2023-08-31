<?php
include "../masyarakat/koneksi.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    $tanggapan = $_POST['tanggapan'];
    $tanggal = date("Y-m-d");
    $id_petugas = $_SESSION['id_petugas'];

    // Sanitize and validate the input
    $tanggapan = mysqli_real_escape_string($koneksi, $tanggapan);

    // Check if a record exists for the given id_pengaduan
    $check_query = "SELECT * FROM `tanggapan` WHERE id_pengaduan='$id_pengaduan'";
    $check_result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Update existing record
        $update_query = "UPDATE `tanggapan` SET tgl_tanggapan='$tanggal', tanggapan='$tanggapan', id_petugas='$id_petugas' WHERE id_pengaduan='$id_pengaduan'";
    } else {
        // Insert new record
        $update_query = "INSERT INTO `tanggapan` (tgl_tanggapan, tanggapan, id_petugas, id_pengaduan) VALUES ('$tanggal', '$tanggapan', '$id_petugas', '$id_pengaduan')";
    }

    if (mysqli_query($koneksi, $update_query)) {
        header("Location:hasil.php");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid report ID.";
}
?>
