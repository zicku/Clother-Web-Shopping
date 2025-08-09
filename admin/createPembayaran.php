<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
  $nama_user = $_POST['nama_penerima'];
  $id_barang = $_POST['id_barang'];
  $harga = $_POST['harga'];
  $status = $_POST['status'];
  $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

  $query = "INSERT INTO pembayaran (nama_user, id_barang, harga, status, tanggal_pembayaran)
            VALUES ('$nama_user', '$id_barang', '$harga', '$status', '$tanggal_pembayaran')";

  if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pembayaran berhasil ditambahkan'); window.location.href='pembayaran.php';</script>";
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
}
?>
