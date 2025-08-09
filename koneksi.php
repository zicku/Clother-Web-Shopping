<?php
$host     = "localhost";     // atau 127.0.0.1
$username = "root";          // default username XAMPP
$password = "";              // default password XAMPP kosong
$database = "db_youthvibe";  // nama database kamu

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
