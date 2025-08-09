const produk = [
  {
    nama: "Minimalist Button-up Blouse",
    kode: "KD.A",
    gambar: "../image/model1.png",
  },
  { nama: "Oversize Denim Shirt", kode: "KD.B", gambar: "../image/model2.png" },
  {
    nama: "Sharp Collar Button-up Shirt",
    kode: "KD.C",
    gambar: "../image/model3.png",
  },
  {
    nama: "Gathered Puff Sleeve Blouse",
    kode: "KD.D",
    gambar: "../image/model4.png",
  },
  {
    nama: "Minimalist Knit Pullover",
    kode: "KD.E",
    gambar: "../image/model5.png",
  },
  {
    nama: "Striped Oversized Shirt",
    kode: "KD.F",
    gambar: "../image/model6.png",
  },
  {
    nama: "Puff Sleeve Cropped Style",
    kode: "KD.G",
    gambar: "../image/model7.png",
  },
  { nama: "Pocket Front Shirt", kode: "KD.H", gambar: "../image/model8.png" },
  { nama: "Wrap Tie Blazer", kode: "KD.I", gambar: "../image/model9.png" },
  { nama: "Wrap Tier Blazer", kode: "KD.J", gambar: "../image/model10.png" },
  {
    nama: "Kolar Color Fitlook Blouse",
    kode: "KD.K",
    gambar: "../image/model11.png",
  },
  { nama: "Colorbox Sheer", kode: "KD.L", gambar: "../image/model12.png" },
  { nama: "Scarf Collar Blouse", kode: "KD.M", gambar: "../image/model13.png" },
  { nama: "Blousewing Waist", kode: "KD.N", gambar: "../image/model1.png" },
  {
    nama: "White Shirt Button-up",
    kode: "KD.O",
    gambar: "../image/model15.png",
  },
];

const container = document.getElementById("produk-container");

produk.forEach((item) => {
  const produkEl = document.createElement("div");
  produkEl.className = "produk-item";
  produkEl.innerHTML = `
    <img src="${item.gambar}" alt="${item.nama}">
    <div class="nama-produk">${item.nama}</div>
    <div class="kode-produk">${item.kode}</div>
    <button class="buy-button">Buy</button>
  `;
  container.appendChild(produkEl);
});

console.log("Produk dimuat.");
