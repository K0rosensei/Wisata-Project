function calculateTotalPrice(quantityPerNight, quantityPerPerson) {
  // Biaya dasar per malam untuk 2 orang
  const baseCostPerNight = 150000; // 150K dalam bentuk angka
  // Biaya tambahan per orang di atas 2 orang
  const additionalCostPerPerson = 20000; // 20K dalam bentuk angka

  // Hitung biaya tambahan berdasarkan jumlah orang di atas 2
  let additionalPeople = Math.max(quantityPerPerson - 2, 0);
  let additionalCost = additionalPeople * additionalCostPerPerson;

  // Hitung total biaya
  let totalCost = baseCostPerNight * quantityPerNight + additionalCost;

  return totalCost;
}
function showAlert(icon, title, text, reload = false) {
  return Swal.fire({
    icon: icon,
    title: title,
    text: text,
  }).then(() => {
    if (reload) {
      location.reload(); // Reload halaman setelah alert ditutup
    }
  });
}

function fetchPayment(id_user, price, id_product, quantityPerNight, quantityPerPerson, name) {
  Swal.fire({
    title: 'Konfirmasi Pembayaran',
    text: `Anda Ingin Booking ${name} dengan jumlah ${price}?`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      console.log(`USER ID: ${id_user}`);
      console.log(`ID_HomeStay: ${id_product}`);
      console.log(`Nama HomeStay: ${name}`);
      console.log(`Kuantitas per Malam: ${quantityPerNight}`);
      console.log(`Kuantitas per Orang: ${quantityPerPerson}`);
      console.log(`Total Harga: ${price}`);
      // Simpan email baru ke database
      return fetch('../../config/payment.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          id_user: id_user,
          id_product: id_product, // Pastikan variabel user didefinisikan sebelumnya
          nama: name,
          quantityPerPerson: quantityPerPerson,
          quantityPerNight: quantityPerNight,
          totalPrice: price,
        }),
      })
        .then((response) => response.text())
        .then((responseText) => {
          window.location.href = responseText;
        })
        .catch((error) => {
          Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
        });
    }
  });
}

function getPayment() {
  let id_user = document.getElementById('id_user').value;
  let id = document.getElementById('id-product').value;
  let name = document.getElementById('nama').value;

  Swal.fire({
    title: `Pembayaran ${name}`, // Menggunakan backticks untuk interpolasi variabel
    html: `
        <div>
          <input id="swal-input-quantity-per-night" class="swal2-input" placeholder="Kuantitas per Malam" type="number" min="1">
          <input id="swal-input-quantity-per-person" class="swal2-input" placeholder="Kuantitas per Orang" type="number" min="1">
        </div>
      `,
    focusConfirm: false,
    preConfirm: () => {
      const user = id_user;
      const id_product = id;
      const namaHome = name;
      const quantityPerNight = Swal.getPopup().querySelector('#swal-input-quantity-per-night').value;
      const quantityPerPerson = Swal.getPopup().querySelector('#swal-input-quantity-per-person').value;

      if (!quantityPerNight || !quantityPerPerson) {
        Swal.showValidationMessage(`Silakan masukkan kuantitas per malam dan per orang.`);
      }

      // Hitung total harga
      const totalPrice = calculateTotalPrice(quantityPerNight, quantityPerPerson);

      return { quantityPerNight, quantityPerPerson, totalPrice, id_product, namaHome, user };
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const id = result.value.id_product;
      const user = result.value.user;
      const name = result.value.namaHome;
      const quantityPerNight = result.value.quantityPerNight;
      const quantityPerPerson = result.value.quantityPerPerson;
      const totalPrice = result.value.totalPrice;

      // Lakukan sesuatu dengan nilai-nilai tersebut
      console.log(`ID_HomeStay: ${id}`);
      console.log(`Nama HomeStay: ${name}`);
      console.log(`Kuantitas per Malam: ${quantityPerNight}`);
      console.log(`Kuantitas per Orang: ${quantityPerPerson}`);
      console.log(`Total Harga: ${totalPrice}`);

      fetchPayment(user, totalPrice, id, quantityPerNight, quantityPerPerson, name);
    }
  });
}

function statusPayment(id, status) {
  fetch('../../../config/payment.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      status: status,
      id: id,
    }),
  })
    .then((response) => response.text())
    .then((responseText) => {
      // Assuming responseText is 'success' or 'error'
      if (responseText === 'success') {
        // Display success alert
        Swal.fire({
          title: 'Pembayaran Berhasil!',
          text: 'Pembayaran Anda berhasil diproses.',
          icon: 'success',
          confirmButtonText: 'OK',
        }).then((result) => {
          if (result.isConfirmed) {
            // Go back to the previous page
            window.location.href = '../../../fitur/hs/detail.php';
          }
        });
      } else {
        // Handle error
        Swal.fire({
          title: 'Gagal!',
          text: 'Terjadi kesalahan saat memproses pembayaran.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
      }
    })
    .catch((error) => {
      // Handle fetch error
      Swal.fire({
        title: 'Gagal!',
        text: 'Terjadi kesalahan: ' + error.message,
        icon: 'error',
        confirmButtonText: 'OK',
      });
    });
}
