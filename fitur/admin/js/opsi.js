function editButton() {
  // Ambil elemen tombol berdasarkan ID
  const button = document.getElementById('edit');
  const editId = button.getAttribute('edit-id');

  Swal.fire({
    title: 'Edit User Form',
    html: `<input id="swal-input1" class="swal2-input" placeholder="Name">
    <input id="swal-input2" class="swal2-input" placeholder="Number">
    <input id="swal-input3" class="swal2-input" placeholder="Date">
    <input id="swal-input4" class="swal2-input" placeholder="Gender">
    `,
    focusConfirm: false,
    preConfirm: () => {
      const name = Swal.getPopup().querySelector('#swal-input1').value;
      const number = Swal.getPopup().querySelector('#swal-input2').value;
      const date = Swal.getPopup().querySelector('#swal-input3').value;
      const gender = Swal.getPopup().querySelector('#swal-input4').value;

      if (!name && !number && !date && !gender) {
        Swal.showValidationMessage(`Silahkan Lengkapi Form`);
        return false; // Menandakan bahwa validasi gagal
      }

      // Mengirim data ke server menggunakan fetch
      return fetch('../../config/acountSetting.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          name: name,
          user: user,
        }),
      })
        .then((response) => response.text())
        .then((responseText) => {
          // Menangani respons dari server
          if (responseText.includes('Berhasil')) {
            showAlert('success', 'Sukses!', 'Nama berhasil diperbarui.', true);
          } else {
            showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + responseText);
          }
        })
        .catch((error) => {
          Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
        });
    },
  });
}

function deleteUser() {
  // Ambil elemen tombol berdasarkan ID
  const button = document.getElementById('delete');
  const deleteId = button.getAttribute('delete-id');

  Swal.fire({
    title: `Do you want to delete this?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      return fetch('../../config/acountSetting.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          id: deleteId,
        }),
      })
        .then((response) => response.text())
        .then((responseText) => {
          // Menangani respons dari server
          if (responseText.includes('Berhasil')) {
            showAlert('success', 'Sukses!', 'Data berhasil dihapus.', true);
          } else {
            showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + responseText);
          }
        })
        .catch((error) => {
          Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
        });
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info');
    }
  });
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
