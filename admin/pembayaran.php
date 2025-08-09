<?php
include '../koneksi.php';

// Setup pagination
$limit = 4; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total data
$total_result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pembayaran");
$total_row = mysqli_fetch_assoc($total_result);
$total_data = $total_row['total'];
$total_pages = ceil($total_data / $limit);

// Ambil data dengan limit dan offset
$query = "
  SELECT pembayaran.*, pesanan.id_pesanan
  FROM pembayaran
  JOIN pesanan ON pembayaran.id_barang = pesanan.id_produk
  ORDER BY pembayaran.id DESC
  LIMIT $start, $limit
";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="admin.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container" >
  <aside class="sidebar">
    <div class="logo">
      <img src="image/YouthVibe.png" alt="">
    </div>
    <div class="profile">
      <img src="image/backadmin.png" alt="Profile" class="profile-img">
    </div>
    <ul class="nav">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="manajemen.php">Manajemen</a></li>
      <li><a href="pesanan.php">Pesanan</a></li>
      <li><a href="#">Pembayaran</a></li>
    </ul>
    <div class="logout">
      <a href="../logout.php">🔓 Logout</a>
    </div>
  </aside>

  <div class="pesanan">
    <div class="header-pesanan">
      <h2 style="margin: 0;">Pembayaran Produk</h2>
      <a href="tambah_pembayaran.php" class="tambah-btn" style="margin:0">tambah</a>
    </div>

    <div class="table-container">
      <!-- Kolom NO -->
      <div class="column-judul">
        <div class="box-judul"><p>ID</p></div>
       <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-judul"><?= htmlspecialchars($row['id']) ?></div>
        <?php endwhile; ?>
      </div>
      <!-- Kolom TANGGAL -->
      <?php mysqli_data_seek($result, 0); ?>
      <div class="column">
        <div class="box-besar">TANGGAL ORDER</div>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-besar"><?= date('d/m/Y', strtotime($row['tanggal_pembayaran'])) ?></div>
        <?php endwhile; ?>
      </div>

      <!-- Kolom ID PESANAN -->
      <?php mysqli_data_seek($result, 0); ?>
      <div class="column">
        <div class="box-besar">ID PESANAN</div>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-besar"><?= htmlspecialchars($row['id_pesanan']) ?></div>
        <?php endwhile; ?>
      </div>

      <!-- Kolom STATUS -->
      <?php mysqli_data_seek($result, 0); ?>
      <div class="column">
        <div class="box-besar">Status</div>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-besar"><?= htmlspecialchars($row['status']) ?></div>
        <?php endwhile; ?>
      </div>

      <!-- Kolom AKSI -->
      <?php mysqli_data_seek($result, 0); ?>
      <div class="column">
        <div class="box-besar">Aksi</div>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <div class="box-besar">
            <a href="edit_pembayaran.php?id=<?= $row['id'] ?>" title="Edit">✏️</a>
            <a href="deletePembayaran.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus produk?')" title="Hapus">🗑️</a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">« Prev</a>
      <?php endif; ?>
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
      <?php endfor; ?>
      <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>">Next »</a>
      <?php endif; ?>
    </div>

  </div>
</div>
</body>
</html>
