function wisataPayment() {
  let id_user = document.getElementById('id_user').value;
  let id = document.getElementById('id-product').value;
  let name = document.getElementById('name').value;
  let price = parseFloat(document.getElementById('harga').value); // Pastikan price adalah angka

  Swal.fire({
    title: `Pembayaran ${name}`, // Menggunakan backticks untuk interpolasi variabel
    html: `
        <div>
          <input id="swal-input-quantity-per-person" class="swal2-input" placeholder="Kuantitas per Orang" type="number" min="1" value="1">
        </div>
      `,
    focusConfirm: false,
    preConfirm: () => {
      const quantityPerPerson = Swal.getPopup().querySelector('#swal-input-quantity-per-person').value; // Gunakan ID yang sesuai
      if (!quantityPerPerson) {
        Swal.showValidationMessage(`Silakan masukkan jumlah yang ingin disewa.`);
      }

      // Hitung total harga
      const totalPrice = quantityPerPerson * price;

      return { quantityPerPerson, totalPrice, id_product: id, namaProduct: name, user: id_user };
    },
  })
    .then((result) => {
      if (result.isConfirmed) {
        const { id_product, user, namaProduct, quantityPerPerson, totalPrice } = result.value;
        inputToDB(id_product, user, namaProduct, quantityPerPerson, totalPrice);
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

function inputToDB(id_product, user, namaProduct, quantityPerPerson, totalPrice) {
  return fetch('../../config/divingPayment.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      category: 'diving',
      id_user: user,
      id_product: id_product, // Pastikan variabel user didefinisikan sebelumnya
      nama: namaProduct,
      quantityPerPerson: quantityPerPerson,
      totalPrice: totalPrice,
    }),
  })
    .then((response) => response.json())
    .then((dataRes) => {
      const { orderId, totalPrice, name } = dataRes;
      console.log({ orderId, totalPrice, name });
      fetchWisataPayment(name, totalPrice, orderId);
    })
    .catch((error) => {
      Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
    });
}

function fetchWisataPayment(name, total, transaksiId) {
  Swal.fire({
    title: 'Konfirmasi Pembayaran',
    text: `Anda Ingin Booking ${name} dengan jumlah ${total}?`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      return fetch('../../config/divingPayment.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          transaksiId: transaksiId,
          total: total,
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
