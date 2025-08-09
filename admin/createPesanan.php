<?php
include '../koneksi.php'; 

// Aktifkan error reporting biar kelihatan kalau ada yang salah
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['nama_barang'])) {
    $nama_barang   = $_POST['nama_barang'];
    $harga_barang  = $_POST['harga_barang'];
    $stok          = $_POST['stok'];
    $deskripsi     = $_POST['deskripsi'];

    // Pastikan folder 'images/' sudah ada
    $target_dir = "../image/product/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;

    // Cek apakah file dipilih
    if ($_FILES["image"]["error"] === 0) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Simpan data ke database
            $sql = "INSERT INTO product (nama_barang, harga_barang, deskripsi,stok, image) 
                    VALUES ('$nama_barang', '$harga_barang', '$deskripsi','$stok','$image_name')";

            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Barang berhasil ditambahkan!'); window.location.href='daftar.php';</script>";
            } else {
                echo "❌ Gagal menambahkan ke database: " . mysqli_error($koneksi);
            }
        } else {
            echo "❌ Gagal mengupload gambar ke folder.";
        }
    } else {
        echo "❌ Gambar belum dipilih atau terjadi error saat upload.";
    }
}
?>
