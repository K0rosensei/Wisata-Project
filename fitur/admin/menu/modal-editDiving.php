<?php
include '../../../config/config.php';

$id = $_POST['id'];
$sql = "SELECT * FROM diving WHERE Id = '$id'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    $nama = $data['Alat'];
    $harga = $data['Harga'];
    $jumlah = $data['Jumlah'];
    $keterangan = $data['Keterangan'];
    $status = $data['Status'];
    $image = $data['Image'];
}

?>
<form id="form-edit">
    <div class="row g-3">
        <div class="col">
            <label for="name" class="form-label">Alat Diving</label>
            <input name="nama" type="text" class="form-control" id="name" placeholder="Pelampung" value="<?= $nama ?>">
        </div>
        <div class="col">
            <label for="harga" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="harga" placeholder="20000" value="<?= $harga ?>">
        </div>
        <div class=" col">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= $jumlah ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" class="form-control" id="Status" value="<?= $status ?>">
        </div>
        <div class="col">
            <label for="foto" class="form-label">Gambar</label>
            <input type="file" name="foto" accept="image/" class="form-control" id="foto">
            <?= htmlspecialchars($image) ?>
        </div>
        <div class="col">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" rows="1"
                value="<?= $keterangan ?>"><?= htmlspecialchars($keterangan) ?></textarea>
        </div>
    </div>
    <div class="d-grid mt-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit" id="submitBtn">Tambah
            Homestay</button>
    </div>
</form>
<script>
    $('#form-edit').submit(function(e) {
        e.preventDefault();

        let formData = new FormData($(this)[0]);
        var id = '<?= $id ?>';
        formData.append('id', id);


        // Check if any new files are uploaded
        const existingFiles = {
            foto: '<?= htmlspecialchars($image) ?>',
        };

        // Check if files are uploaded, if not, append existing filenames
        formData.append('foto', existingFiles.foto);

        // Log the form data for debugging
        // for (let [key, value] of formData.entries()) {
        //     console.log(key, value);
        // }

        $.ajax({
            url: '../../../config/diving-edit-delete.php', // Replace with your URL
            type: 'POST',
            data: formData,
            processData: false, // Do not process data
            contentType: false, // Let jQuery set the Content-Type
            success: function(response) {
                console.log(response);
                var pecah = response.split('|');
                Swal.fire({
                    position: 'center',
                    icon: pecah[0],
                    title: pecah[1],
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = 'diving.php';
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });
</script>