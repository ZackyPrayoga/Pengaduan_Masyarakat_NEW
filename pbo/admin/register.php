<?php 
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Register Form</title>
</head>
<body>
  <div class="login-container">
    <form id="loginForm" method="POST" action="">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="logo"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>      <div class="form-group">
    <h2 style="color: #ffffff;">Register</h2>
    <div class="form-group">
        <input type="text" id="nama_petugas" placeholder="Nama" name="nama_petugas" required>
        <label for="nama_petugas"></label>
      </div>      <div class="form-group">
        <input type="text" id="username" placeholder="username" name="username" required>
        <label for="username"></label>
      </div>
      <div class="form-group">
        <input type="password" id="password" placeholder="password" name="password" required>
        <label for="password"></label>
      </div>
      <div class="form-group">
        <input type="number" id="telp" placeholder="telp" name="telp" required>
        <label for="telp"></label>
      </div>
      <div class="form-group">
      <input type="hidden" name="level">
      </div>

      <button type="submit" name="Submit">Register</button>
      <a href="login.php">Udah Punya Akun?</a> <a href="#" style="float: right;">Lupa Password?</a>
    </form>
  </div>
  <?php
include "../masyarakat/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = 'admin';

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM petugas WHERE username = '$username'";
    $check_username_result = mysqli_query($koneksi, $check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo "<script>alert('Username already taken. Please choose a different username.')</script>";
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES ('$nama_petugas', '$username', '$password', '$telp', '$level')";
        
        if (mysqli_query($koneksi, $insert_query)) {
            echo "<script>alert('Registration successful. You can now log in with your username and password.')</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

</body>
</html>