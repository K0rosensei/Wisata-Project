// ====================DIVING PAYMENT===========================================

function calculateTotalPrice(price, person) {
  // Biaya tambahan per orang
  const price = 250000; // 250K dalam bentuk angka

  // Hitung total biaya
  let totalCost = price * person;

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

function getDivingPayment() {
  console.log('fungsi get diving');
  // let id_user = document.getElementById('id_user').value;
  // let id = document.getElementById('id-product').value;
  // let name = document.getElementById('nama').value;
  // let price = document.getElementById('harga').value;

  // Swal.fire({
  //   title: `Pembayaran ${name}`, // Menggunakan backticks untuk interpolasi variabel
  //   html: `
  //       <div>
  //           <input id="swal-input-quantity-per-person" class="swal2-input" placeholder="Kuantitas per Orang" type="number" min="1" value="1">
  //           <button id="decrease-button" style="margin-right: 5px;">-</button>
  //           <button id="increase-button">+</button>
  //       </div>
  //     `,
  //   focusConfirm: false,
  //   didOpen: () => {
  //     // Get the input and buttons
  //     const quantityInput = Swal.getPopup().querySelector('#swal-input-quantity-per-product');
  //     const decreaseButton = Swal.getPopup().querySelector('#decrease-button');
  //     const increaseButton = Swal.getPopup().querySelector('#increase-button');

  //     // Set up event listeners for buttons
  //     decreaseButton.addEventListener('click', () => {
  //       let currentValue = parseInt(quantityInput.value, 10);
  //       if (currentValue > 1) {
  //         // Ensure value does not go below 1
  //         quantityInput.value = currentValue - 1;
  //       }
  //     });

  //     increaseButton.addEventListener('click', () => {
  //       let currentValue = parseInt(quantityInput.value, 10);
  //       quantityInput.value = currentValue + 1;
  //     });
  //   },

  //   preConfirm: () => {
  //     const user = id_user;
  //     const id_product = id;
  //     const namaProduct = name;
  //     const quantityPerProduct = Swal.getPopup().querySelector('#swal-input-quantity-per-product').value;

  //     if (!quantityPerProduct) {
  //       Swal.showValidationMessage(`Silakan masukkan kuantitas per malam dan per orang.`);
  //     }

  //     // Hitung total harga
  //     const totalPrice = calculateTotalPrice(price, quantityPerProduct);

  //     return { quantityPerProduct, totalPrice, id_product, namaProduct, user };
  //   },
  // })
  //   .then((result) => {
  //     if (result.isConfirmed) {
  //       const id = result.value.id_product;
  //       const user = result.value.user;
  //       const name = result.value.namaProduct;
  //       const quantityPerProduct = result.value.quantityPerProduct;
  //       const totalPrice = result.value.totalPrice;
  //       console.log({ id });
  //       console.log({ user });
  //       console.log({ name });
  //       console.log({ quantityPerProduct });
  //       console.log({ totalPrice });

  //       // sendToDB(user, totalPrice, id, quantityPerNight, quantityPerPerson, name);
  //     }
  //   })
  //   .catch((error) => {
  //     // Handle fetch error
  //     Swal.fire({
  //       title: 'Gagal!',
  //       text: 'Terjadi kesalahan: ' + error.message,
  //       icon: 'error',
  //       confirmButtonText: 'OK',
  //     });
  //   });
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

// =========================== DIVING PAYMENT===============================
