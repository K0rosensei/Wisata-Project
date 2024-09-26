$(document).ready(function () {
  // fungsi ketika klik buka
  $('.edit').on('click', function (e) {
    e.preventDefault();

    let id = $(this).attr('edit-id');
    console.log({ id });
    $('#modalShow').modal('show');
    $('#modalTittle').html('Edit Homestay');
    $.post(
      'modal-editWS.php',
      {
        id: id,
      },
      function (respon) {
        $('#bdModalKuisioner').html(respon);
        $('#headerModal').removeClass();
        $('#headerModal').addClass('modal-header bg-primary text-white');
      }
    );
  });

  $('.delete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('delete-id');
    Swal.fire({
      title: 'Yakin Ingin Menghapus?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
      if (result.isConfirmed) {
        $.post('../../../config/wisataEditDelete.php', 'hapus=' + id, function (respon) {
          var pecah = respon.split('|');
          if (pecah[0] == 'success') {
            Swal.fire({
              position: 'center',
              icon: pecah[0],
              title: 'Data berhasil Dihapus',
              showConfirmButton: false,
              timer: 1500,
            }).then(() => {
              window.location.href = 'wisata.php';
            });
          }
        });
      }
    });
  });
});
