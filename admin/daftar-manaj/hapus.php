<?php
include '../../koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  die("ID tidak ditemukan.");
}

// Hapus gambar terkait
$found = false;
foreach (glob("../image/product/$id.*") as $file) {
  unlink($file);
  $found = true;
}

// Hapus data dari database
mysqli_query($koneksi, "DELETE FROM product WHERE id_barang = '$id'");

// Redirect kembali ke daftar
header("Location: daftar.php");
exit;
