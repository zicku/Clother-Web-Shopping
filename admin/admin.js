// Ambil semua <a> dalam .nav
const navLinks = document.querySelectorAll('.nav li a');
const currentPage = window.location.pathname.split('/').pop(); // ambil nama file halaman, contoh: 'manajemen.html'

navLinks.forEach(link => {
  const href = link.getAttribute('href');
  if (href === currentPage || (currentPage === '' && href === 'dashboard.html')) {
    link.classList.add('active');
  }
});

document.querySelectorAll(".aksi-btn").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.stopPropagation();
    // Tutup semua menu
    document.querySelectorAll(".aksi-menu").forEach((menu) => {
      menu.style.display = "none";
    });

    // Tampilkan menu yang diklik
    const menu = this.nextElementSibling;
    menu.style.display = "block";
  });
});

// Menampilkan menu ketika tombol status diklik
document.querySelectorAll(".aksi-btn").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.stopPropagation(); // Biar tidak langsung tertutup
    // Tutup semua menu lainnya dulu
    document.querySelectorAll(".aksi-menu").forEach((menu) => {
      menu.style.display = "none";
    });
    // Tampilkan menu yang sesuai
    this.nextElementSibling.style.display = "block";
  });
});

// Saat tombol status dipilih
document.querySelectorAll(".aksi-menu button").forEach((item) => {
  item.addEventListener("click", function (e) {
    e.stopPropagation();
    alert("Kamu memilih: " + this.innerText);
    const menu = this.closest(".aksi-menu");
    const btn = menu.previousElementSibling;
    btn.innerText = this.innerText; // Ganti teks tombol jadi status terpilih
    menu.style.display = "none";
  });
});

// Klik di luar akan menutup semua menu
document.addEventListener("click", function () {
  document.querySelectorAll(".aksi-menu").forEach((menu) => {
    menu.style.display = "none";
  });
});


// Menampilkan menu saat tombol diklik
document.querySelectorAll(".status-btn").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.stopPropagation(); // Mencegah event bubbling
    document.querySelectorAll(".status-menu").forEach((menu) => {
      menu.style.display = "none"; // Tutup semua menu dulu
    });
    const menu = this.nextElementSibling;
    menu.style.display = "block";
  });
});

// Saat salah satu status dipilih
document.querySelectorAll(".status-menu button").forEach((item) => {
  item.addEventListener("click", function (e) {
    e.stopPropagation();
    const selectedStatus = this.innerText;
    const menu = this.closest(".status-menu");
    const btn = menu.previousElementSibling;
    btn.innerText = selectedStatus;
    menu.style.display = "none";
    alert("Kamu memilih: " + selectedStatus);
  });
});

// Klik di luar akan menutup semua menu
document.addEventListener("click", function () {
  document.querySelectorAll(".status-menu").forEach((menu) => {
    menu.style.display = "none";
  });
});


