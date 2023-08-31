<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id_pengaduan'];
$isi = $_POST['isi_laporan'];
$nama_foto = $_FILES['foto']['name'];
$asal_foto = $_FILES['foto']['tmp_name'];
// update data ke database
$result = $koneksi->query("UPDATE `pengaduan`set isi_laporan='$isi', foto='$nama_foto' WHERE id_pengaduan='$id' ");
if($result){
    move_uploaded_file($asal_foto, "../foto/$nama_foto");
    header("Location:hasil.php");
}
// mengalihkan halaman kembali ke hasil.php
header("location:hasil.php");
 
?>