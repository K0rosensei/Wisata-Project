document.getElementById('form').addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  formData.append('tambah', 'true');

  fetch('../../../config/divingCreate.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data == 'Berhasil') {
        console.log(data); // Handle success response
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Data Berhasil Ditambahkan',
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
          window.location.href = 'diving.php';
        });
      } else {
        alert(data);
      }
    })
    .catch((error) => {
      console.error('Error:', error); // Handle error
      alert('An error occurred. Please try again.');
    });
});
