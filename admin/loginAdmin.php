<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if ($password === $user['password']) {
        $_SESSION['username'] = $user['username']; 

        // Cek apakah username diawali dengan "admin"
        if (substr($user['username'], 0, 5) !== "admin") {
            echo "<script>
                alert('Kamu bukan admin, Masuk Sebagai User!!!');
                window.location.href = '../sign-in.php';
            </script>";
        } else {
            echo "<script>
                alert('Login berhasil sebagai Admin!');
                window.location.href = 'dashboard.php';
            </script>";
}
    } else {
        echo "<script>
            alert('Password salah!');
            window.location.href = 'login.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Username tidak ditemukan!');
        window.location.href = 'login.php';
    </script>";
}
?>
