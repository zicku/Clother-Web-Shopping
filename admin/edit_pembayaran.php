<?php
include '../koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID tidak ditemukan.");

$query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);
if (!$data) die("Data tidak ditemukan.");
?>
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <script>
    alert("Data berhasil diperbarui!");
    window.location.href = "pembayaran.php";
  </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Data</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>
  <div class="login-container">
    <form class="login-box" action="prosesEditBayar.php" method="post">
      <h2>Edit Data</h2>
    
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
      <input type="hidden" name="tanggal_pembayaran" value="<?php echo $data['tanggal_pembayaran']; ?>" />

      <div class="input-group">
        <label for="nama_barang">Nama Pembeli</label>
        <input type="text" id="nama_user" name="nama_user" value="<?php echo $data['nama_user']; ?>" required />
      </div>
         <div class="input-group">
        <label for="nama_barang">ID BARANG</label>
        <input type="text" id="id_barang" name="id_barang" value="<?php echo $data['id_barang']; ?>" required />
      </div>
      
      <div class="input-group">
        <label for="harga_barang">Harga Barang</label>
        <input type="text" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required />
      </div>
      
    <div class="input-group">
        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="Belum Bayar" <?php if($data['status'] == 'Belum Bayar') echo 'selected'; ?>>Belum Bayar</option>
            <option value="Sudah Bayar" <?php if($data['status'] == 'Sudah Bayar') echo 'selected'; ?>>Sudah Bayar</option>
            <option value="Pending" <?php if($data['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
        </select>
        </div>
    
      <button type="submit" class="login-button">UPDATE</button>

      <div class="bottom-links">
        <a href="pembayaran.php">Lihat Data</a>
      </div>
    </form>

    <div class="back-admin"><a href="dashboard.php">Back</a></div>
  </div>
</body>
</html>


</body>
</html>






