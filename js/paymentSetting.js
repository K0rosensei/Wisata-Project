// ====================HOME STAY PAYMENT===========================================

function calculateTotalPrice(price, quantityPerNight, quantityPerPerson) {
  // Biaya dasar per malam untuk 2 orang
  const baseCostPerNight = 150000;
  // const baseCostPerNight = price;
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

function fetchPayment(name, price, transaksiId) {
  Swal.fire({
    title: 'Konfirmasi Pembayaran',
    text: `Anda Ingin Booking ${name} dengan jumlah ${price}?`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      return fetch('../../config/payment.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          transaksiId: transaksiId,
          total: price,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          window.snap.pay(data.token);
        })
        .catch((error) => {
          Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
        });
    }
  });
}

function sendToDB(id_user, price, id_product, quantityPerNight, quantityPerPerson, name) {
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
    .then((response) => response.json())
    .then((responseText) => {
      const { transaksiId, total, name } = responseText;
      // console.log(responseText);
      fetchPayment(name, total, transaksiId);
    })
    .catch((error) => {
      Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
    });
}

function getPayment() {
  let id_user = document.getElementById('id_user').value;
  let id = document.getElementById('id-product').value;
  let name = document.getElementById('nama').value;
  let price = document.getElementById('harga').value;

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
      const totalPrice = calculateTotalPrice(price, quantityPerNight, quantityPerPerson);

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

      sendToDB(user, totalPrice, id, quantityPerNight, quantityPerPerson, name);
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

// =========================== END HOMESTAY PAYMENT===============================

// ===============================DIVING PAYMENT=================================
