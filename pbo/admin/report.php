<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Pengaduan Masyarakat</title>
<link rel="stylesheet" href="style.css"> <!-- Ganti dengan link ke file CSS Anda -->
<style>
    @media print{
        .print-button {
            display: none;
        }
    }
</style>
</head>
<body>
    <?php
    // ... kode lainnya ...
    include "../masyarakat/koneksi.php";
    $sql = "SELECT *
    FROM pengaduan
    right JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE pengaduan.id_pengaduan=$_GET[id_pengaduan]";
        
    $query = mysqli_query($koneksi, $sql);
    $pengadu = mysqli_fetch_array($query);
    // echo "<pre>";
    //     print_r($pengadu);
    //     echo "</pre>";
    //     die();

    // Isi laporan yang ingin ditampilkan
    $nama = "John Doe";
    $nik = $pengadu['nik'];
    $nomor_telepon = $pengadu['telp'];
    $isi_pengaduan = $pengadu['isi_laporan'];
    $foto = $pengadu['foto'];

    // Tanggal cetak
    $tanggal_cetak = date("d F Y");
    ?>

    <div class="header">
        <h1 style="text-align:center;">Laporan Pengaduan Masyarakat</h1>
    </div>
    <div class="report">
        <div class="report-field">
            <label>Nama:</label>
            <span><?php echo $nama; ?></span>
        </div>
        <div class="report-field">
            <label>Nik:</label>
            <span><?php echo $nik; ?></span>
        </div>
        <div class="report-field">
            <label>Nomor Telepon:</label>
            <span><?php echo $nomor_telepon; ?></span>
        </div>
        <div class="report-field">
            <label>Pengaduan:</label>
            <p><?php echo $isi_pengaduan; ?></p>
        </div>
        <div class="report-field">
            <label>foto:</label>
            <p><img width="180px" height="120px" src="../foto/<?= $pengadu['foto'] ?>"></p>
        </div>
    </div>
    <!-- <div class="footer">
        <p>Tanggal Cetak: <?php echo $tanggal_cetak; ?></p>
        <button onclick="printReport()" id="cetak-laporan">Cetak Laporan</button>
    </div> -->
    
    <script>

        window.print()
        // function printReport() {
        //     const buttonPrint = document.getElementById('cetak-laporan')
        //     buttonPrint.style.display = 'none'
        //     window.print();
        //     buttonPrint.style.display = 'block'
        // }
    </script>
</body>
</html>
