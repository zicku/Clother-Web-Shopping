const data = [
  { kode: "KD.A", harga: "500.000", stok: 10 },
  { kode: "KD.B", harga: "650.000", stok: 6 },
  { kode: "KD.C", harga: "500.000", stok: 7 },
  { kode: "KD.D", harga: "550.000", stok: 13 },
  { kode: "KD.E", harga: "300.000", stok: 3 },
  { kode: "KD.F", harga: "450.000", stok: 10 },
  { kode: "KD.G", harga: "550.000", stok: 6 },
  { kode: "KD.H", harga: "500.000", stok: 7 },
  { kode: "KD.I", harga: "450.000", stok: 13 },
  { kode: "KD.J", harga: "450.000", stok: 3 },
  { kode: "KD.K", harga: "550.000", stok: 8 },
  { kode: "KD.L", harga: "350.000", stok: 5 },
  { kode: "KD.M", harga: "400.000", stok: 12 },
  { kode: "KD.N", harga: "450.000", stok: 6 },
  { kode: "KD.O", harga: "600.000", stok: 9 }
];

const cardContainer = document.getElementById("cardContainer");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");

let page = 0;
const rowsPerPage = 5;
const totalPages = Math.ceil(data.length / rowsPerPage);

function renderCards() {
  cardContainer.innerHTML = "";
  const start = page * rowsPerPage;
  const end = start + rowsPerPage;

  data.slice(start, end).forEach((item, index) => {
    const card = document.createElement("div");
    card.className = "card";
    card.innerHTML = `
      <div class="card-item box1">${start + index + 1}</div>
      <div class="card-item box">${item.kode}</div>
      <div class="card-item box">${item.harga}</div>
      <div class="card-item box4">${item.stok}</div>
      <div class="card-item box5">EDIT</div>
    `;
    cardContainer.appendChild(card);
  });

  // Visibilitas tombol navigasi
  prevBtn.style.visibility = page === 0 ? "hidden" : "visible";
  nextBtn.style.visibility = page === totalPages - 1 ? "hidden" : "visible";
}

// Ganti pemanggilan renderTable() jadi renderCards()
nextBtn.onclick = () => {
  if (page < totalPages - 1) {
    page++;
    renderCards();
  }
};

prevBtn.onclick = () => {
  if (page > 0) {
    page--;
    renderCards();
  }
};

renderCards();