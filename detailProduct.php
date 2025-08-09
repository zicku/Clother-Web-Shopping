<?php
// echo "ID dari URL: " . $_GET['id'] . "<br>";
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM product WHERE id_barang = $id";
$result = mysqli_query($koneksi, $query);

$produk = mysqli_fetch_assoc($result);

if (!$produk) {
  echo "Produk tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Produk - <?= htmlspecialchars($data['nama_barang']) ?></title>
<link rel="stylesheet" href="admin/daftar-manaj/produk.css">

</head>
<body>

<h1>Detail Produk</h1>

<div class="detail-container">
    <img src="admin/image/<?= htmlspecialchars($produk['image']) ?>" alt="<?= htmlspecialchars($produk['nama_barang']) ?>" class="detail-img">
    <div class="detail-info">
        <h2><?= htmlspecialchars($produk['nama_barang']) ?></h2>
        <div class="harga">Rp <?= number_format($produk['harga_barang'], 0, ',', '.') ?></div>
        <p><?= htmlspecialchars($produk['deskripsi']) ?></p>
       <div class="button-group">
            <?php if (isset($_SESSION['username'])): ?>
                <!-- Jika sudah login -->
                <a href="formPemesanan.php?id=<?= $produk['id_barang'] ?>" class="buy-button">Beli Sekarang</a>
            <?php else: ?>
                <!-- Jika belum login -->
                <a href="sign-in.php" class="buy-button" onclick="return confirm('Silakan login terlebih dahulu untuk memesan produk.');">Beli Sekarang</a>
            <?php endif; ?>
            <a href="produk.php" class="buy-button" style="background-color: #10101055;">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
