<?php
    class Masyarakat {
    public $nik;
    public $nama;
    public $username;
    public $password;
    public $telp;

    function __construct($nik, $nama, $username, $password, $telp) {
        $this->nik = $nik;
        $this->nama = $nama;
        $this->username = $username;
        $this->password = $password;
        $this->telp = $telp;
    }

    function tampil() {
         echo $this->nik, "<br>";
         echo $this->nama, "<br>";
         echo $this->username, "<br>";
         echo $this->password, "<br>";
         echo $this->telp;
    }

    function tambah() {
        include "koneksi.php";
        $koneksi->query("INSERT INTO masyarakat VALUES ('$this->nik','$this->nama','$this->username','$this->password','$this->telp')");
    }

    function hapus(){
        include "koneksi.php";
        $koneksi->query("DELETE FROM `masyarakat` WHERE nik='$this->nik'");
    }

    function perbarui($nama, $username, $password, $telp){
        include "koneksi.php";
        $koneksi->query("UPDATE `masyarakat` SET `nama`='$nama',`username`='$username',`password`='$password',`telp`='$telp' WHERE nik='$this->nik'");
    }
    }
    $warga = new Masyarakat('012382130','Abdul', 'Doel', 'sadadsa','08129808');
    //$warga->tampil('1','a','b','c');
