<?php
session_start();

if (!isset($_SESSION['id_petugas'])) {
    header("Location: login.php");
    exit();
}

include "../masyarakat/koneksi.php";

if (isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    
    // Verify ownership of the report before deleting
    if (isset($_GET['id_pengaduan'])) {
        $id_pengaduan = $_GET['id_pengaduan'];
        
        // Verify ownership of the report before deleting
        $verify_query = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
        $verify_result = mysqli_query($koneksi, $verify_query);
    
        if ($verify_result->num_rows > 0) {
            // Get the photo name associated with the report
            $photo_query = "SELECT foto FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
            $photo_result = mysqli_query($koneksi, $photo_query);
            $photo_row = mysqli_fetch_assoc($photo_result);
            $nama_foto = $photo_row['foto'];
            
            // Perform the deletion
            $delete_query = "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'";
            if (mysqli_query($koneksi, $delete_query)) {
                // Delete the associated photo from the directory
                unlink("../foto/{$nama_foto}");
                header("Location: hasil.php");
                exit();
            } else {
                echo "Error deleting report: " . mysqli_error($koneksi);
            }
        } else {
            echo "You do not have permission to delete this report.";
        }
    } else {
        echo "Invalid report ID.";
    }
}
?>
