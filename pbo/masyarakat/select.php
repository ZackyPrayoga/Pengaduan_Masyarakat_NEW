<?php
include "koneksi.php";
$data = $koneksi->query("SELECT * FROM masyarakat");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center">Data Masyarakat</h1>
    <form action="class.php" method="post">
    <table border="1" cellpadding="5" cellspacing="0" style="width:100%;">
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Telp</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data as $d) {
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $d['nik'] ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['username'] ?></td>
            <td><?= $d['password'] ?></td>
            <td><?= $d['telp'] ?></td>
        </tr>
        <?php
        $i++; // Increment $i for the next row
        }
        ?>
    </table>
    </form>
</body>
</html>
