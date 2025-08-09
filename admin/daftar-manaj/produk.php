<?php
include '../../koneksi.php'; 

$query = "SELECT * FROM product"; 
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Produk</title>
  <link rel="stylesheet" href="produk.css" />
</head>
<body>
  <div class="daftar-container">
    <h1>Daftar Produk</h1>
    <div class="produk-wrapper">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="produk-item">
          <img src="../image/<?= $row['image'] ?>" alt="<?= $row['image'] ?>">
          <div class="nama-produk"><?= $row['nama_barang'] ?></div>
          <div class="harga-produk">Rp <?= number_format($row['harga_barang'], 0, ',', '.') ?></div>
          <div class="kode-produk"><?= $row['deskripsi'] ?></div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="back">
      <a href="daftar.php">Back</a>
    </div>
  </div>
</body>
</html>
