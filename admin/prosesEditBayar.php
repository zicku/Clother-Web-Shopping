<?php
include '../koneksi.php'; 

$id = $_POST['id'];
$nama_user = $_POST['nama_user'];
$id_barang = $_POST['id_barang'];
$harga = $_POST['harga'];;
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$status = $_POST['status']; 

// Update data ke database
$query = "UPDATE pembayaran SET 
            nama_user = '$nama_user',
            id_barang = '$id_barang',
            harga = '$harga',
            tanggal_pembayaran = '$tanggal_pembayaran',
            status = '$status'
          WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>
        alert('Data berhasil diupdate');
        window.location.href = 'pembayaran.php';
    </script>";
    exit();
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>
