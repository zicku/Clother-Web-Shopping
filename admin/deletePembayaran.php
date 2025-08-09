<?php
include '../koneksi.php'; 

// Cek apakah parameter id tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus
    $query = "DELETE FROM pembayaran WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect setelah berhasil hapus
        header("Location: pembayaran.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
