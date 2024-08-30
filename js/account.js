// Fungsi untuk menampilkan notifikasi menggunakan SweetAlert2
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

function getOTP() {
  return Math.floor(100000 + Math.random() * 900000);
}

function sendOTP(number) {
  const msg = getOTP();
  const key = fetch('https://textbelt.com/text', {
    // Ganti URL dengan endpoint server kamu
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ number, msg, key }),
  })
    .then((response) => response.text())
    .then((data) => (document.getElementById('responseMessage').innerText = `Response: ${data}`))
    .catch((error) => (document.getElementById('responseMessage').innerText = `Error: ${error}`));
}

function getName() {
  Swal.fire({
    title: 'Nama Lengkap',
    html: `<input id="swal-input1" class="swal2-input" placeholder="Name">`,
    focusConfirm: false,
    preConfirm: () => {
      const name = Swal.getPopup().querySelector('#swal-input1').value;

      if (!name) {
        Swal.showValidationMessage(`Silahkan Isi Nama Lengkap Anda`);
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

function getDate() {
  let date = document.getElementById('birth-date').value;
  let user = document.getElementById('user').value;

  fetch('../../config/acountSetting.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      date: date,
      user: user,
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      if (data.includes('Berhasil')) {
        showAlert('success', 'Sukses!', 'Tanggal lahir berhasil diperbarui.', true);
      } else {
        showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + data);
      }
    })
    .catch((error) => {
      showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + error);
    });
}

function getGender() {
  let dropdown = document.getElementById('dropdown');
  let gender = dropdown.value;
  let user = document.getElementById('user').value;

  fetch('../../config/acountSetting.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      gender: gender,
      user: user,
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      if (data.includes('Berhasil')) {
        showAlert('success', 'Sukses!', 'Jenis kelamin Anda berhasil diperbarui.', true);
      } else {
        showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + data);
      }
    })
    .catch((error) => {
      showAlert('error', 'Gagal!', 'Terjadi kesalahan: ' + error);
    });
}

function getNumber() {
  Swal.fire({
    title: 'Masukkan Nomor Baru',
    html: `<input id="swal-input1" class="swal2-input" placeholder="+62....">`,
    focusConfirm: false,
    preConfirm: () => {
      const number = Swal.getPopup().querySelector('#swal-input1').value;

      if (!number) {
        Swal.showValidationMessage(`Silahkan Isi Nomor Baru Anda`);
        return false; // Menandakan bahwa validasi gagal
      }

      // Mengirim data ke server menggunakan fetch
      //   return sendOTP(number);

      // Input ke database
      return fetch('../../config/acountSetting.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          number: number,
          user: user,
        }),
      })
        .then((response) => response.text())
        .then((responseText) => {
          // Menangani respons dari server
          if (responseText.includes('Berhasil')) {
            showAlert('success', 'Sukses!', 'Nomor berhasil diperbarui.', true);
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

function getEmail() {
  Swal.fire({
    title: 'Masukkan Email Baru',
    html: `<input type="email" id="swal-input1" class="swal2-input" placeholder="example@....">`,
    focusConfirm: false,
    preConfirm: () => {
      const email = Swal.getPopup().querySelector('#swal-input1').value;

      if (!email) {
        Swal.showValidationMessage(`Silahkan Isi Email Baru Anda`);
        return false; // Menandakan bahwa validasi gagal
      }

      // Mengirim data ke server menggunakan fetch
      //   return sendOTP(number);

      // Input ke database
      return fetch('../../config/acountSetting.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
          email: email,
          user: user,
        }),
      })
        .then((response) => response.text())
        .then((responseText) => {
          // Menangani respons dari server
          if (responseText.includes('Berhasil')) {
            showAlert('success', 'Sukses!', 'Nomor berhasil diperbarui.', true);
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
