<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['nik'])) {
    header('location:login.php');
    exit(); // Make sure to exit after redirecting
}

$id = $_GET['id_pengaduan'];

// Use prepared statements to prevent SQL injection
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    // Handle invalid or non-existing id_pengaduan here
    header('location:home.php');
    exit();
}

$d = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Buat Laporan</title>
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
    <div class="container" style="padding: 30px; background-color: transparent; margin-top: 50px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2) 0 6px rgba(0, 0, 0, 0.19);">
    
	<?php
	include 'koneksi.php';
	$id = $_GET['id_pengaduan'];
	$data = mysqli_query($koneksi,"select * from pengaduan where id_pengaduan='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
        <form action="proses_update.php" method="POST" enctype="multipart/form-data">
            <h1 style="margin-top: 30px; text-align: center; color: white;">Buat Laporan</h1>
            <div class="container">
                <div class="mb-3">
                    <label for="isi_laporan" class="form-label" style="color: white;">Laporan Kalian</label>
                    <textarea class="form-control" id="isi_laporan" name="isi_laporan" required><?php echo $d['isi_laporan']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label" style="color: white;">Bukti Foto</label>
                    <input type="file" class="form-control" id="foto" value="<?php echo $d['foto'];?>" name="foto">
                </div>
                <div class="mb-3">
                <input type="hidden" name="id_pengaduan" value="<?php echo $d['id_pengaduan']; ?>">
                </div>
                <button class="btn btn-danger" type="submit">Kirim</button>
            </div>
        </form>
        <?php 
	}
	?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
