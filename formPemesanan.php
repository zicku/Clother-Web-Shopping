<?php
// echo "ID dari URL: " . $_GET['id'] . "<br>";

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
  <title>Pemesanan Produk - <?= htmlspecialchars($produk['nama_barang']) ?></title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
    }
  </style>
</head>
<body>

<div class="form-wrapper">
  <h2>Form Pemesanan</h2>
  <div class="product-preview">
    <img src="admin/image/<?= htmlspecialchars($produk['image']) ?>" alt="<?= htmlspecialchars($produk['nama_barang']) ?>">
    <div class="product-info">
      <h3><?= htmlspecialchars($produk['nama_barang']) ?></h3>
      <p>Harga: <strong>Rp <?= number_format($produk['harga_barang'], 0, ',', '.') ?></strong></p>
      <p><?= htmlspecialchars($produk['deskripsi']) ?></p>
    </div>
  </div>

  <form action="prosesPemesanan.php" method="post">
    <input type="hidden" name="id_produk" value="<?= $produk['id_barang'] ?>">
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="text" name="alamat" placeholder="Alamat Pengiriman" required>
    <input type="number" name="jumlah" placeholder="Jumlah" min="1" required>
    <textarea name="catatan" placeholder="Catatan (opsional)"></textarea>
    <button type="submit">Kirim Pesanan</button>
  </form>

  <a class="back-link" href="produk.php">← Kembali ke Produk</a>
</div>

</body>
</html>
