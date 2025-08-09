<?php
include '../koneksi.php';

$pesanan_result = mysqli_query($koneksi, "SELECT id_produk, nama_penerima FROM pesanan ORDER BY id_pesanan DESC");
$pesanan_data = [];
while ($row = mysqli_fetch_assoc($pesanan_result)) {
    $pesanan_data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="./daftar-manaj/produk.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    select {
      width: 100%;
      padding: 10px 14px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
      transition: all 0.2s ease;
      appearance: none; /* Hilangkan style default select */
    }
  </style>
</head>
<body>
  <div class="tambah-container">
    <aside class="tambah-sidebar">
      <div class="logo">
        <img src="./image/YouthVibe.png" alt="Logo">
      </div>
      <div class="profile">
        <img src="./image/backadmin.png" alt="Profile" class="profile-img">
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
    <main class="manajemen">
      <h2>Manajemen Produk</h2>
      <div class="header">
        <p class="note">Pada bagian ini kamu dapat melihat daftar pembayaran dan menambahkan pembayaran baru.</p>
      </div>

     <div class="card-container">
        <a href="pembayaran.php" class="card">
          <h2>Daftar<br>Pembayaran</h2>
        </a>
        <a href="tambah_pembayaran.php" class="card">
          <h2>Tambah<br>Pembayaran</h2>
        </a>
        <a href="pembayaran.php" class="card">
          <h2>Edit<br>pembayaran</h2>
        </a>
      </div>
      <!-- FORM TAMBAH PRODUK -->
      <div class="form-container">
        <div class="form-wrapper">
          <h3>Tambah Pembayaran </h3>
           <form action="createPembayaran.php" method="POST">

      <!-- Tanggal Pembayaran -->
      <input type="date" name="tanggal_pembayaran" required>


        <select name="id_barang" required>
            <option value="">-- ID Barang--</option>
            <?php foreach ($pesanan_data as $row) : ?>
                <option value="<?= $row['id_produk'] ?>"><?= htmlspecialchars($row['id_produk']) ?></option>
            <?php endforeach; ?>
        </select>

        <select name="nama_penerima" required>
            <option value="">-- Nama Pemesan --</option>
            <?php foreach ($pesanan_data as $row) : ?>
                <option value="<?= $row['nama_penerima'] ?>"><?= htmlspecialchars($row['nama_penerima']) ?></option>
            <?php endforeach; ?>
        </select>

      <input type="int" name="harga" placeholder="harga" required>

      <!-- Status Pembayaran -->
      <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="Belum Dibayar">Belum Dibayar</option>
        <option value="Sudah Dibayar">Sudah Dibayar</option>
        <option value="Pending">Pending</option>
      </select>

      <!-- Tombol Submit -->
      <button type="submit" name="submit" id="addButton"style="margin-top: 20px;">Tambah</button>
    </form>
        </div>
      </div>
    </main>
  </div>

  <!-- SCRIPT PREVIEW GAMBAR -->
  <script>
    document.getElementById("image").addEventListener("change", function(event) {
      const preview = document.getElementById("preview");
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = "block";
        };
        reader.readAsDataURL(file);
      } else {
        preview.style.display = "none";
      }
    });
  </script>
</body>
</html>
