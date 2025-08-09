<?php
include '../koneksi.php';

// Ambil total pesanan dari tabel pesanan
$queryPesanan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pesanan");
$dataPesanan = mysqli_fetch_assoc($queryPesanan);
$totalPesanan = $dataPesanan['total'];

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
  <script defer src="main.js"></script>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
        <div class="logo">
            <img src="image/YouthVibe.png" alt="">
        </div>
        <div class="profile">
            <img src="image/backadmin.png" alt="Profile" class="profile-img">
        </div>
        <ul class="nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="manajemen.php">Manajemen</a></li>
            <li><a href="pesanan.php">Pesanan</a></li>
            <li><a href="pembayaran.php">Pembayaran</a></li>
        </ul>
        <div class="logout">
            <a href="../logout.php">🔓 Logout</a>
        </div>
    </aside>
    
    <!-- Main content -->
    <main class="dashboard">
        <h1>Halo, Admin! 🔔 </h1>
        <div class="header">
            <p class="note">Laporan penjualan saat ini stabil, jangan lupa untuk memeriksa secara berkala pada fitur manajemen dan pesanan</p>
            <p class="date"><?= date('d F Y') ?></p>
        </div>
        <div class="summary">
            <div class="box-dash">
                <h2>+1,3K</h2>
                <p>Add to chart</p>
            </div>
               <div class="box-dash">
                <h2><?= $totalPesanan ?></h2>
                <p>Orders</p>
            </div>
        </div>

      <h3 class="recent-title">Baru saja terjual</h3>
      <div class="recent-sold">
        <div class="item">
            <img src="image/model2.png" alt="produk">
        </div>
        <div class="item">
            <img src="image/model6.png" alt="produk">
        </div>
        <div class="item">
            <img src="image/model3.png" alt="produk">
        </div>
        <div class="item">
            <img src="image/model1.png" alt="produk">
        </div>
      </div>
    </main>
  </div>
</body>
</html>
