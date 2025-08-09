<?php
include '../../koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID tidak ditemukan.");

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE id_barang = '$id'");
$data = mysqli_fetch_assoc($query);
if (!$data) die("Data tidak ditemukan.");
?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <script>
    alert("Data berhasil diperbarui!");
    window.location.href = "daftar.php";
  </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Data</title>
  <link rel="stylesheet" href="../admin.css" />
</head>
<body>
  <div class="login-container">
    <form class="login-box" action="proses_edit.php" method="post">
      <h2>Edit Data</h2>
      
      <input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>" />
      
      <div class="input-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required />
      </div>
      
      <div class="input-group">
        <label for="harga_barang">Harga Barang</label>
        <input type="text" id="harga_barang" name="harga_barang" value="<?php echo $data['harga_barang']; ?>" required />
      </div>
      
      <div class="input-group">
        <label for="stok">Stok</label>
        <input type="text" id="stok" name="stok" value="<?php echo $data['stok']; ?>" required />
      </div>

      <div class="input-group"> 
        <label>Gambar (opsional)</label>
        <input type="file" name="image" accept="image/*">
      </div>      
      <button type="submit" class="login-button">UPDATE</button>

      <div class="bottom-links">
        <a href="daftar.php">Lihat Data</a>
      </div>
    </form>

    <div class="back-admin"><a href="../dashboard.php">Back</a></div>
  </div>
</body>
</html>


</body>
</html>






