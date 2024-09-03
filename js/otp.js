function sendOTP(email) {
  const lastSentTime = window.sessionStorage.getItem('otp_sent_time');
  const now = new Date().getTime();
  const cooldownTime = 2 * 60 * 1000; // 2 menit dalam milidetik

  if (lastSentTime && now - lastSentTime < cooldownTime) {
    const timeRemaining = Math.ceil((cooldownTime - (now - lastSentTime)) / 1000);
    Swal.fire('Tunggu Sebentar', `Anda dapat mengirim OTP lagi dalam ${timeRemaining} detik.`, 'info');
    return Promise.reject('Cooldown time not elapsed');
  }
  const otp = Math.floor(100000 + Math.random() * 900000); // Generate 6 digit OTP

  return emailjs
    .send('YOUR SERVICE ID', 'YOUR TEMPLATE ID', {
      to_email: email,
      otp_code: otp,
    })
    .then(() => {
      // Simpan OTP di variabel global atau session storage untuk verifikasi nanti
      window.sessionStorage.setItem('otp_code', otp);
      window.sessionStorage.setItem('otp_sent_time', now);
      return otp;
    })
    .catch((error) => {
      console.error('Failed to send OTP:', error);
      Swal.fire('Gagal!', 'Terjadi kesalahan saat mengirim OTP.', 'error');
      throw error;
    });
}

// show alert
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

// content
function getNumber() {
  Swal.fire({
    title: 'Masukkan Email Anda untuk mengirim OTP',
    html: `<input id="swal-input1" class="swal2-input" placeholder="Email Anda">`,
    focusConfirm: false,
    preConfirm: () => {
      const email = Swal.getPopup().querySelector('#swal-input1').value;

      if (!email) {
        Swal.showValidationMessage(`Silahkan Isi Email Anda`);
        return false; // Menandakan bahwa validasi gagal
      }

      return sendOTP(email);
    },
  }).then((result) => {
    if (result.value) {
      // Tampilkan dialog untuk memasukkan OTP
      Swal.fire({
        title: 'Masukkan OTP',
        html: `<input id="swal-input2" class="swal2-input" placeholder="Masukkan OTP">`,
        focusConfirm: false,
        preConfirm: () => {
          const otp = Swal.getPopup().querySelector('#swal-input2').value;
          const sentOtp = window.sessionStorage.getItem('otp_code');

          if (otp !== sentOtp) {
            Swal.showValidationMessage(`OTP tidak valid`);
            return false; // Menandakan bahwa validasi gagal
          }

          // OTP valid, tampilkan dialog untuk nomor telepon
          return Swal.fire({
            title: 'Masukkan Nomor Telepon Baru',
            html: `<input id="swal-input3" class="swal2-input" placeholder="+62....">`,
            focusConfirm: false,
            preConfirm: () => {
              const number = Swal.getPopup().querySelector('#swal-input3').value;

              if (!number) {
                Swal.showValidationMessage(`Silahkan Isi Nomor Baru Anda`);
                return false; // Menandakan bahwa validasi gagal
              }

              // Mengirim data ke server menggunakan fetch
              return fetch('../../config/acountSetting.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                  number: number,
                  user: user, // Pastikan variabel user didefinisikan sebelumnya
                }),
              })
                .then((response) => response.text())
                .then((responseText) => {
                  window.sessionStorage.removeItem('otp_code');
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
        },
      });
    }
  });
}

// get Email
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

      return sendOTP(email);
    },
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: 'Masukkan OTP',
        html: `<input type="text" id="swal-input2" class="swal2-input" placeholder="Masukkan OTP">`,
        focusConfirm: false,
        preConfirm: () => {
          const otp = Swal.getPopup().querySelector('#swal-input2').value;
          const sentOtp = window.sessionStorage.getItem('otp_code');

          if (otp !== sentOtp) {
            Swal.showValidationMessage(`OTP tidak valid`);
            return false;
          }

          return Swal.fire({
            title: 'Konfirmasi Email Baru',
            text: 'Email baru sudah diverifikasi. Apakah Anda ingin menyimpan perubahan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
          }).then((result) => {
            if (result.isConfirmed) {
              // Simpan email baru ke database
              return fetch('../../config/acountSetting.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                  email: email,
                  user: user, // Pastikan variabel user didefinisikan sebelumnya
                }),
              })
                .then((response) => response.text())
                .then((responseText) => {
                  window.sessionStorage.removeItem('otp_code');
                  if (responseText.includes('Berhasil')) {
                    Swal.fire('Sukses!', 'Email berhasil diperbarui.', 'success');
                  } else {
                    Swal.fire('Gagal!', 'Terjadi kesalahan: ' + responseText, 'error');
                  }
                })
                .catch((error) => {
                  Swal.fire('Gagal!', 'Terjadi kesalahan: ' + error.message, 'error');
                });
            } else {
            }
          });
        },
      });
    }
  });
}
