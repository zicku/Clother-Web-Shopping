<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = 'sign-in.php';
    </script>";
    exit;
}

// Ambil ID user dari session
$username = $_SESSION['username'];
$getUser = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_assoc($getUser);
$id_user = $user['id_user'];

// Ambil data dari form
$id_produk = $_POST['id_produk'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jumlah = $_POST['jumlah'];
$catatan = $_POST['catatan'];

// Simpan ke database
$query = "INSERT INTO pesanan (id_user, id_produk, nama_penerima, alamat_pengiriman, jumlah, catatan)
          VALUES ('$id_user', '$id_produk', '$nama', '$alamat', '$jumlah', '$catatan')";

if (mysqli_query($koneksi, $query)) {
    $link_wa = "https://wa.me/0895414615887";

    echo "<script>
        alert('Pesanan berhasil dikirim! Anda akan diarahkan ke WhatsApp penjual Untuk Payment.');
        window.location.href = '$link_wa';
    </script>";
} else {
    echo "Gagal menyimpan pesanan: " . mysqli_error($koneksi);
}
?>
