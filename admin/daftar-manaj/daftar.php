<?php include '../../koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Produk</title>
  <link rel="stylesheet" href="daftar.css" />
</head>
<body>
  <div class="container">
    <div class="top-bar">
      <div class="back"><a href="../manajemen.php">«</a></div>
      <div class="add"><a href="tambah.php">Tambah</a></div>
    </div>

    <div class="card-header">
      <div class="card-item box1">ID</div>
      <div class="card-item box">NAMA BARANG</div>
      <div class="card-item box">HARGA</div>
      <div class="card-item box5">GAMBAR</div>
      <div class="card-item box5">AKSI</div>
    </div>

    <div class="card-container" id="cardContainer">
      <?php
      // Pagination setup
      $rowsPerPage = 5;
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      if ($page < 1) $page = 1;
      $offset = ($page - 1) * $rowsPerPage;

      // Total data
      $totalQuery = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM product");
      $totalData = mysqli_fetch_assoc($totalQuery)['total'];
      $totalPages = ceil($totalData / $rowsPerPage);

      // Ambil data untuk halaman ini
      $no = $offset + 1;
      $result = mysqli_query($koneksi, "SELECT * FROM product ORDER BY id_barang DESC LIMIT $rowsPerPage OFFSET $offset");
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card'>";
          echo "<div class='card-item box1'>{$row['id_barang']}</div>";
          echo "<div class='card-item box'>{$row['nama_barang']}</div>";
          echo "<div class='card-item box'>Rp " . number_format($row['harga_barang'], 0, ',', '.') . "</div>";
           echo "<div class='card-item box'>{$row['stok']}</div>";
          echo "<div class='card-item box5'>
                  <a href='edit.php?id={$row['id_barang']}'>✏️</a>
                  <a href='hapus.php?id={$row['id_barang']}' onclick='return confirm(\"Yakin ingin hapus produk?\")'>🗑️</a>
                </div>";
          echo "</div>";
          $no++;
      }
      ?>
    </div>

    <!-- Tombol navigasi -->
    <div class="nav-buttons">
      <?php if ($page > 1): ?>
        <div><a href="?page=<?php echo $page - 1; ?>">Kembali</a></div>
      <?php else: ?>
        <div style="visibility:hidden;">Kembali</div>
      <?php endif; ?>

      <div class="produk"><a href="produk.php">Tampilkan daftar</a></div>

      <?php if ($page < $totalPages): ?>
        <div><a href="?page=<?php echo $page + 1; ?>">Next</a></div>
      <?php else: ?>
        <div style="visibility:hidden;">Next</div>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
