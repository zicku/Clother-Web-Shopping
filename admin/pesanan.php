<?php
include '../koneksi.php';

// Pagination setup
$rowsPerPage = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $rowsPerPage;

// Total data
$totalQuery = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pesanan");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalPages = ceil($totalData / $rowsPerPage);

// Ambil data untuk halaman ini
$query = mysqli_query($koneksi, "
    SELECT p.*, pr.nama_barang
    FROM pesanan p
    JOIN product pr ON p.id_produk = pr.id_barang
    ORDER BY p.tanggal_pesan DESC
    LIMIT $rowsPerPage OFFSET $offset
");



?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script defer src="admin.js"></script>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">
        <img src="./image/YouthVibe.png" alt="">
      </div>
      <div class="profile">
        <img src="image/backadmin.png" alt="Profile" class="profile-img">
      </div>
      <ul class="nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="manajemen.php">Manajemen</a></li>
        <li><a href="#">Pesanan</a></li>
        <li><a href="pembayaran.php">Pembayaran</a></li>
      </ul>
      <div class="logout">
        <a href="../logout.php">🔓 Logout</a>
      </div>
    </aside>

    <!-- Main content -->
    <div class="pesanan">
      <div class="top-bar">
        <h2>Pesanan Produk</h2>
      </div>

      <div class="table-container">
       <!-- Kolom NO -->
        <div class="column-judul">
          <div class="box-judul">NO</div>
          <?php
          $no = $offset + 1; 
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
              echo "<div class='box-judul'>{$no}</div>";
              $no++;
          }
          ?>
        </div>

        <!-- Kolom TANGGAL -->
        <div class="column">
          <div class="box">TANGGAL ORDER</div>
          <?php
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='box'>" . date("d/m/Y", strtotime($row['tanggal_pesan'])) . "</div>";
          }
          ?>
        </div>

        <!-- Kolom ID PESANAN -->
        <div class="column">
          <div class="box">ID PESANAN</div>
          <?php
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='box'>{$row['id_pesanan']}</div>";
          }
          ?>
        </div>
          
        <!-- Kolom ID BARANG -->
        <div class="column">
          <div class="box">ID BARANG</div>
          <?php
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='box'>{$row['id_produk']}</div>";
          }
          ?>
        </div>
      
        <!-- Kolom ID NAMA BARANG -->
        <div class="column">
          <div class="box">NAMA BARANG</div>
          <?php
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='box'>{$row['nama_barang']}</div>";
          }
          ?>
        </div>
        
        <!-- Kolom Nama PEMESAN -->
        <div class="column">
          <div class="box">NAMA PEMESAN</div>
          <?php
          mysqli_data_seek($query, 0);
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='box'>{$row['nama_penerima']}</div>";
          }
          ?>
        </div>
      </div>              

      <!-- Tombol Navigasi -->
      <!-- Pagination -->
<div class="pagination">
  <?php if ($page > 1): ?>
    <a href="?page=<?= $page - 1 ?>">« Prev</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
  <?php endfor; ?>

  <?php if ($page < $totalPages): ?>
    <a href="?page=<?= $page + 1 ?>">Next »</a>
  <?php endif; ?>
</div>

    </div>
  </div>
</body>
</html>
