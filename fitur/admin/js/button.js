document.getElementById('homestay').addEventListener('click', homestay);
function homestay() {
  let main = document.getElementById('main'); // Mengambil elemen dengan ID 'main'
  console.log('main yuk');
  fetch('menu/homestay.php')
    .then((response) => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then((data) => {
      // Menampilkan konten yang diambil ke dalam elemen 'main'
      main.innerHTML = data; // Ganti contentDiv dengan main
    })
    .catch((error) => {
      console.error('There has been a problem with your fetch operation:', error);
      main.innerHTML = '<p>Terjadi kesalahan saat memuat halaman.</p>'; // Ganti contentDiv dengan main
    });
}
