// menu
// Ambil semua elemen dengan kelas "card"
const cards = document.querySelectorAll(".card");

// Fungsi untuk memeriksa apakah elemen sudah terlihat di dalam jendela
function isElementInViewport(element) {
  const rect = element.getBoundingClientRect();
  return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
}

// Fungsi untuk memeriksa setiap elemen ketika menggulir
function checkCards() {
  cards.forEach((card) => {
    if (isElementInViewport(card)) {
      card.classList.add("fade-in");
    }
  });
}

// Tambahkan event listener untuk menggulir
window.addEventListener("scroll", checkCards);

// Panggil fungsi saat halaman pertama kali dimuat
checkCards();
