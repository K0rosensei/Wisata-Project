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

function getPayment() {
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
      const quantityPerNight = Swal.getPopup().querySelector('#swal-input-quantity-per-night').value;
      const quantityPerPerson = Swal.getPopup().querySelector('#swal-input-quantity-per-person').value;

      if (!quantityPerNight || !quantityPerPerson) {
        Swal.showValidationMessage(`Silakan masukkan kuantitas per malam dan per orang.`);
      }

      // Hitung total harga
      const totalPrice = calculateTotalPrice(quantityPerNight, quantityPerPerson);

      return { quantityPerNight, quantityPerPerson, totalPrice };
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const quantityPerNight = result.value.quantityPerNight;
      const quantityPerPerson = result.value.quantityPerPerson;
      const totalPrice = result.value.totalPrice;

      // Lakukan sesuatu dengan nilai-nilai tersebut
      console.log(`Kuantitas per Malam: ${quantityPerNight}`);
      console.log(`Kuantitas per Orang: ${quantityPerPerson}`);
      console.log(`Total Harga: ${totalPrice}`);
    }
  });
}
