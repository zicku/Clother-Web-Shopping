<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Kalau kamu belum pakai password_hash()
    if ($password === $user['password']) {
        $_SESSION['username'] = $user['username']; 

        echo "<script>
            alert('Login berhasil!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Password salah!');
            window.location.href = 'sign-in.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Username tidak ditemukan!');
        window.location.href = 'sign-in.php';
    </script>";
}
?>
