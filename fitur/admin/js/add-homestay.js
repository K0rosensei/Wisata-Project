document.getElementById('form').addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  formData.append('tambah', 'true');

  fetch('../../../config/hsCRUD.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data == 'Berhasil') {
        console.log(data); // Handle success response
        showAlert('success', 'success', 'Data Berhasil Disimpan');
      } else {
        alert(data);
      }
    })
    .catch((error) => {
      console.error('Error:', error); // Handle error
      alert('An error occurred. Please try again.');
    });
});

function showAlert(icon, title, text, reload = false) {
  return Swal.fire({
    icon: icon,
    title: title,
    text: text,
    showConfirmButton: false,
    timer: 1500,
  }).then(() => {
    then(() => {
      window.location.href = 'home.php';
    });
  });
}
