<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>YouthVibe</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script defer src="main.js"></script>
</head>
<body>
  
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="images/logo-nav.png" alt="">
    </div>
    <ul class="nav-links">
      <li><a href="#navbar">Home</a></li>
      <li><a href="#our-product">Our product</a></li>
      <li><a href="#best-sellers">Best sellers</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="icons">
      <span class="hamburger">&#9776;</span>
    </div>
  </nav>

  <!-- Dropdown Menu (Mobile) -->
  <div class="dropdown-menu">
    <ul>
      <li class="only-mobile"><a href="index.php">Home</a></li>
      <li class="only-mobile"><a href="index.php#our-product">Our product</a></li>
      <li class="only-mobile"><a href="index.php#best-sellers">Best sellers</a></li>
      <li class="only-mobile"><a href="index.php#contact">Contact</a></li>

      <?php if (isset($_SESSION['username'])): ?>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="sign-in.php">Sign in</a></li>
      <?php endif; ?>

      <li><a href="admin/login.php">Admin</a></li>
    </ul>
  </div>

  <!-- Carousel -->
  <div id="navbar" class="carousel-container">
    <div class="carousel-slide">
      <div class="carousel-track">
        <!-- Banner 1 -->
        <div class="carousel">
          <div class="slide" style="--bg1: #a385aff5; --bg2: #d9c2e4e0;">
            <div class="text-left">
              <h1>Express<br>Your Youth<br>with Every<br>
                <span class="colorful1" style="--bg1: #b289c4; --bg2: #d9c2e4;">Colorful</span> Move.
              </h1>
            </div>
            <div class="image">
              <img src="images/model3.png" alt="Model 1" />
              <p class="tag">broken<br>white.</p>
            </div>
            <p class="desc">We offer simple yet eye-catching clothing that combines comfort and style to express limitless youthful energy.</p>
          </div>
        </div>

        <!-- Banner 2 -->
        <div class="carousel">
          <div class="slide" style="--bg1: #fde3b8; --bg2: #d6c3dc;">
            <div class="text-left">
              <h1>Express<br>Your Youth<br>with Every<br>
                <span class="colorful2">Colorful</span> Move.
              </h1>
            </div>
            <div class="image">
              <img src="images/model4.png" alt="Model 2" />
              <p class="tag2">daisy<br>yellow.</p>
            </div>
            <p class="desc">We offer simple yet eye-catching clothing that combines comfort and style to express limitless youthful energy.</p>
          </div>
        </div>

        <!-- Banner 3 -->
        <div class="carousel">
          <div class="slide" style="--bg1: #59cffacb; --bg2: #f9d4c6;">
            <div class="text-left">
              <h1>Express<br>Your Youth<br>with Every<br>
                <span class="colorful3">Colorful</span> Move.
              </h1>
            </div>
            <div class="image">
              <img src="images/banner3.png" alt="Model 3" />
              <p class="tag3">light<br>blue.</p>
            </div>
            <p class="desc">We offer simple yet eye-catching clothing that combines comfort and style to express limitless youthful energy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Our Product -->
  <div class="product-section" id="our-product">
    <h2 class="our-product-title">Our Product</h2>
    <div class="product-container" id="product-list">
      <?php
      $query = "SELECT nama_barang, harga_barang, image FROM product LIMIT 5";
      $result = mysqli_query($koneksi, $query);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="card">';
              echo '<img src="admin/image/product/' . $row['image'] . '" alt="' . $row['image'] . '">';
              echo '<h3>' . $row['nama_barang'] . '</h3>';
              echo '<p>' . number_format($row['harga_barang'], 2, ',', '.') . '</p>';
              echo '</div>';
          }
      } else {
          echo '<p>Tidak ada produk tersedia.</p>';
      }
      ?>
    </div>
    <div class="view-all">
      <a href="produk.php">View all &gt;&gt;</a>
    </div>
  </div>

  <!-- Best Sellers -->
  <section id="best-sellers" class="wrapper" data-aos="fade-up">
    <div class="headline" data-aos="fade-up">
      <h1>Best Sellers</h1>
      <p>Habis terus diburu! Ini dia item-item paling hits yang bikin kamu selalu tampil beda. Jangan sampai kehabisan</p>
    </div>

    <?php
    $query = "SELECT 
            p.id_barang, 
            p.nama_barang, 
            p.harga_barang, 
            p.image, 
            SUM(o.jumlah) AS total_dipesan
          FROM pesanan o
          JOIN product p ON o.id_produk = p.id_barang
          GROUP BY p.id_barang
          ORDER BY total_dipesan DESC
          LIMIT 5";
 
    $result = mysqli_query($koneksi, $query);
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    ?>

    <div class="produk-highlight" data-aos="fade-up">
      <!-- Kiri besar -->
      <?php if (!empty($products[0])): ?>
      <div class="kiri-besar" data-aos="fade-up">
        <img src="admin/image/product/<?= $products[0]['image'] ?>" alt="<?= $products[0]['nama_barang'] ?>">
        <div class="label1"><?= strtoupper($products[0]['nama_barang']) ?></div>
        <div class="overlay">
          <div>
            <h4><?= $products[0]['nama_barang'] ?></h4>
            <p>Rp. <?= number_format($products[0]['harga_barang'], 2, ',', '.') ?></p>
          </div>
           <a href="detailProduct.php?id=<?= $products[0]['id_barang'] ?>" class="arrow" >↗</a>
        </div>
      </div>
      <?php endif; ?>

      <!-- Kanan atas -->
      <div class="kanan-atas hover-group" data-aos="fade-up">
        <?php for ($i = 1; $i <= 2; $i++): ?>
          <?php if (!empty($products[$i])): ?>
          <div class="produk-item">
            <img src="admin/image/product/<?= $products[$i]['image'] ?>" alt="<?= $products[$i]['nama_barang'] ?>">
            <div class="label<?= $i+1 ?>"><?= strtoupper($products[$i]['nama_barang']) ?></div>
            <div class="overlay">
              <div>
                <h4><?= $products[$i]['nama_barang'] ?></h4>
                <p>Rp. <?= number_format($products[$i]['harga_barang'], 2, ',', '.') ?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>

      <!-- Kanan bawah -->
      <div class="kanan-bawah" data-aos="fade-up">
        <?php for ($i = 3; $i <= 4; $i++): ?>
          <?php if (!empty($products[$i])): ?>
          <div class="produk-item">
            <img src="admin/image/product/<?= $products[$i]['image'] ?>" alt="<?= $products[$i]['nama_barang'] ?>">
            <div class="label<?= $i+1 ?>"><?= strtoupper($products[$i]['nama_barang']) ?></div>
            <div class="overlay">
              <div>
                <h4><?= $products[$i]['nama_barang'] ?></h4>
                <p>Rp. <?= number_format($products[$i]['harga_barang'], 2, ',', '.') ?></p>
              </div>
               <a href="detailProduct.php?id=<?= $products[$i]['id_barang'] ?>" class="arrow" >↗</a>
            </div>
          </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- Contact Us -->
  <section class="contact-section" id="contact" data-aos="fade-up">
    <h1>Contact us</h1>
    <div class="contact-container">
      <div class="contact-info">
        <p>Got questions or need help? Our team is ready to assist you</p>
        <p><i class="fab fa-whatsapp"></i> : +62 xxx-xxxx-xxxx</p>
        <p><i class="fas fa-location-dot"></i> : YouthVibe HQ, Semarang, Indonesia</p>
        <p><i class="fas fa-envelope"></i> : support@youthvibe.com</p>
      </div>
      <div class="contact-hours">
        <strong>Customer Service Hours:</strong>
        <p>Monday – Friday, 09:00 – 18:00 WIB</p>
        <p>Feel free to reach out — we’re here to keep your vibe bright and bold!</p>
      </div>
    </div>
  </section>  

</body>
</html>
