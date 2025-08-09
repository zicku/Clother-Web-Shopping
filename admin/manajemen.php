<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
                <li><a href="dashboard.php">Dashboard</a></li>
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
            <h1>Manajemen Produk</h1>
            <div class="header">
                <p class="note">Pada bagian ini kamu dapat melihat daftar produk  dan mengedit daftar produk</p>
            </div>

            <div class="card-container">
                <a href="daftar-manaj/daftar.php" class="card">
                    <h2>Daftar<br>Produk</h2>
                </a>
                <a href="daftar-manaj/tambah.php" class="card">
                    <h2>Tambah<br>Produk</h2>
                </a>

                <a href="daftar-manaj/daftar.php" class="card">
                    <h2>Edit<br>Produk</h2>
                </a>
            </div>
        </main>
    </div>
</body>
</html>
