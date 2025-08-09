<?php
include '../../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga_barang'];
$stok = $_POST['stok'];

// Update data
mysqli_query($koneksi, "UPDATE product SET nama_barang='$nama', harga_barang='$harga', stok='$stok' WHERE id_barang='$id'");

// Upload gambar jika ada
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  // Hapus gambar lama
  foreach (glob("uploads/$id.*") as $old) {
    unlink($old);
  }

  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $target = "uploads/$id.$ext";
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

// Redirect dengan notifikasi sukses
header("Location: edit.php?id=$id&success=1");
exit;
