<html>
<head>
    <title>Add Users</title>
    <link rel="stylesheet" href="../style/insert.css">
</head>
 
<body>
    <a href="select.php">Go to Home</a>
    <br/><br/>
 
    <form action="" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nik</td>
                <td><input type="number" name="nik"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td>Telp</td>
                <td><input type="number" name="telp"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
    if(isset($_POST['Submit'])) {
        // Sanitize and validate user inputs
        $nik = intval($_POST['nik']);
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = intval($_POST['telp']);

        // include database connection file
        include("class.php");

        $masyarakat = new Masyarakat($nik,$nama,$username,$password,$telp);
        $masyarakat->tambah();
        // // Insert user data into table
        // $data = mysqli_query($koneksi, "INSERT INTO `masyarakat`(`nik`, `nama`, `username`, `password`, `telp`) VALUES ('$nik','$nama','$username','$password','$telp')");
        
        // if ($data) {
        //     // Show message when user added
        //     echo "User added successfully. <a href='select.php'>View Users</a>";
        // } else {
        //     // Show an error message if the insertion fails
        //     echo "Error: " . mysqli_error($koneksi);
        // }
    }
    ?>
</body>
</html>
