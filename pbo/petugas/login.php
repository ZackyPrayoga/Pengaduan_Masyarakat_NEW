<?php
include "../masyarakat/koneksi.php";
session_start();

if (isset($_SESSION['id_petugas'])) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is a "admin"
    $admin_sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='petugas'";
    $admin_result = mysqli_query($koneksi, $admin_sql);

    if ($admin_result->num_rows > 0) {
        $row = mysqli_fetch_assoc($admin_result);
        $_SESSION['id_petugas'] = $row['id_petugas'];
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Login Form Petugas</title>
</head>
<body>
  <div class="login-container">
    <form id="loginForm" action="" method="POST">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="logo"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>      <div class="form-group">
    <h2 style="color:#ffffff;">Login</h2>  
    <label for="username"></label>
        <input type="text" placeholder="Username" name="username" required>
      </div>
      <div class="form-group">
      <label for="password"></label>
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>
