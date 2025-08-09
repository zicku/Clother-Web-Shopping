<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="produk.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="tambah-container">
    <aside class="tambah-sidebar">
      <div class="logo">
        <img src="../image/YouthVibe.png" alt="Logo">
      </div>
      <div class="profile">
        <img src="../image/backadmin.png" alt="Profile" class="profile-img">
      </div>
      <ul class="nav">
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="#">Manajemen</a></li>
        <li><a href="../pesanan.php">Pesanan</a></li>
        <li><a href="../pembayaran.php">Pembayaran</a></li>
      </ul>
      <div class="logout">
        <a href="../login.html">🔓 Logout</a>
      </div>
    </aside>

    <!-- Main content -->
    <main class="manajemen">
      <h2>Manajemen Produk</h2>
      <div class="header">
        <p class="note">Pada bagian ini kamu dapat melihat daftar produk dan menambahkan produk baru.</p>
      </div>

      <div class="card-container">
        <a href="daftar.php" class="card">
          <h2>Daftar<br>Produk</h2>
        </a>
        <a href="#" class="card">
          <h2>Tambah<br>Produk</h2>
        </a>
        <a href="daftar.php" class="card">
          <h2>Edit<br>Produk</h2>
        </a>
      </div>

      <!-- FORM TAMBAH PRODUK -->
      <div class="form-container">
        <div class="form-wrapper">
          <h3>Tambah Produk</h3>
          <form action="createBarang.php" method="POST" enctype="multipart/form-data">
            <!-- Upload Gambar -->
            
            <input type="file" name="image" id="image" accept="image/*" required style="margin-top: 10px;" placeholder="masukan foto barang">
        
            <!-- PREVIEW GAMBAR -->
            <img id="preview" src="#" alt="Preview Gambar" style="display:none; max-height: 150px; margin-top: 10px; border: 1px solid #ccc; border-radius: 8px;">

            <!-- Nama Produk -->
            <input type="text" name="nama_barang" placeholder="Nama" required>

            <!-- Harga Produk -->
            <input type="number" name="harga_barang" placeholder="Harga" required>

            
            <!-- Deskripsi Produk -->
            <textarea name="stok" rows="3" placeholder="stok"></textarea>

            <!-- Deskripsi Produk -->
            <textarea name="deskripsi" rows="3" placeholder="Deskripsi"></textarea>


            <!-- Tombol Submit -->
            <button type="submit" name="submit" id="addButton">ADD</button>
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
