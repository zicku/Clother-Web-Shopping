<?php
include 'koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
$result = mysqli_query($koneksi, $query);

if ($result) {
     echo "<script>
        alert('User berhasil dibuat');
        window.location.href = 'sign-in.php';
    </script>";
} else {
    echo "Gagal daftar: " . mysqli_error($koneksi);
}
?>