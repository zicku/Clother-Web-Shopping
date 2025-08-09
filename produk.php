<?php
session_start();
include 'koneksi.php';

$query = "SELECT * FROM product"; 
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Produk</title>
  <link rel="stylesheet" href="admin/daftar-manaj/produk.css" />

</head>
<body>
  <div class="daftar-container">
    <h1>Daftar Produk</h1>

    <!-- Login Info -->
    <?php if (isset($_SESSION['username'])): ?>
      <div style="text-align: right; padding: 10px 20px;">
        Hai, <strong><?= $_SESSION['username'] ?></strong> |
        <a href="logout.php">Logout</a>
      </div>
    <?php else: ?>
      <div style="text-align: right; padding: 10px 20px;">
        <a href="sign-in.php">Login</a>
      </div>
    <?php endif; ?>

    <!-- Produk Grid -->
    <div class="produk-wrapper">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="produk-item">
          <!-- Gambar + Overlay -->
          <div class="produk-image-wrapper">
            <img src="admin/image/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['nama_barang']) ?>">
            <div class="overlay">
              <a href="detailProduct.php?id=<?= urlencode($row['id_barang']) ?>" class="overlay-text">Lihat Detail</a>
            </div>
          </div>

          <!-- Info Produk -->
          <div class="nama-produk"><?= htmlspecialchars($row['nama_barang']) ?></div>
          <div class="harga-produk">Rp <?= number_format($row['harga_barang'], 0, ',', '.') ?></div>
          <div class="kode-produk"><?= htmlspecialchars($row['deskripsi']) ?></div>

          <!-- Tombol Buy -->
          <?php if (isset($_SESSION['username'])): ?>
            <a href="formPemesanan.php?id=<?= urlencode($row['id_barang']) ?>" class="btn-buy">Buy</a>
          <?php else: ?>
            <a href="sign-in.php" class="btn-buy" onclick="return confirm('Silakan login terlebih dahulu untuk memesan produk.');">Buy</a>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>

    <!-- Tombol Kembali -->
    <div class="back">
      <a href="index.php">Back</a>
    </div>
  </div>
</body>
</html>
