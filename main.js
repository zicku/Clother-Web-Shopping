const hamburger = document.querySelector(".hamburger");
const dropdownMenu = document.querySelector(".dropdown-menu");
const track = document.querySelector(".carousel-track");
const slides = document.querySelectorAll(".carousel");
const produk = [
  {
    nama: "Minimalist Button-up Blouse",
    harga: 99000,
    gambar: "images/model1.png",
  },
  { nama: "Oversize Denim Shirt", harga: 82000, gambar: "images/model2.png" },
  {
    nama: "Sharp Collar Button-up Shirt",
    harga: 65000,
    gambar: "images/model3.png",
  },
  {
    nama: "Gathered Puff Sleeve Blouse",
    harga: 98000,
    gambar: "images/model4.png",
  },
  {
    nama: "Minimalist Knit Pullover",
    harga: 90000,
    gambar: "images/model5.png",
  },
  {
    nama: "Striped Oversized Shirt",
    harga: 102000,
    gambar: "images/model6.png",
  },
  {
    nama: "Puff Sleeve Cropped Style",
    harga: 85000,
    gambar: "images/model7.png",
  },
  { nama: "Pocket Front Shirt", harga: 91000, gambar: "images/model8.png" },
  { nama: "Wrap Tie Blazer", harga: 105000, gambar: "images/model9.png" },
  { nama: "Wrap Tier Blazer", harga: 106000, gambar: "images/model10.png" },
  {
    nama: "Kolar Color Fitlook Blouse",
    harga: 88000,
    gambar: "images/model11.png",
  },
  { nama: "Colorbox Sheer", harga: 89000, gambar: "images/model12.png" },
  { nama: "Scarf Collar Blouse", harga: 94500, gambar: "images/model13.png" },
  { nama: "Blousewing Waist", harga: 99000, gambar: "images/model1.png" },
  { nama: "White Shirt Button-up", harga: 92000, gambar: "images/model15.png" },
];
let currentSlide = 0;

document.addEventListener("DOMContentLoaded", function () {
  AOS.init({
    duration: 1000, // durasi animasi dalam ms
    once: false, // animasi hanya muncul sekali saat scroll
    mirror: true,
  });
});

hamburger.addEventListener("click", () => {
  dropdownMenu.classList.toggle("show");
});

function moveToSlide(index) {
  currentSlide = index;
  const slideWidth = slides[0].offsetWidth;
  track.style.transform = `translateX(-${slideWidth * currentSlide}px)`;
}

// Geser otomatis tiap 4 detik
setInterval(() => {
  currentSlide = (currentSlide + 1) % slides.length;
  moveToSlide(currentSlide);
}, 3500);

function showProducts(jumlah = 5) {
  const container = document.getElementById("product-list");
  if (!container) return;
  container.innerHTML = "";
  produk.slice(0, jumlah).forEach((p) => {
    container.innerHTML += `
      <div class="card">
        <img src="${p.gambar}" alt="${p.nama}">
        <h3>${p.nama}</h3>
        <p>${p.harga.toLocaleString("id-ID", {
          style: "currency",
          currency: "IDR",
          minimumFractionDigits: 2,
        })}</p>
      </div>
    `;
  });
}

// document.addEventListener("DOMContentLoaded", () => {
//   showProducts(5);
// });
