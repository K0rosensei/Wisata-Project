<?php
include '../../../config/config.php';

$id = $_POST['id'];
$sql = "SELECT * FROM homestay WHERE Id = '$id'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    $nama = $data['Nama'];
    $harga = $data['Harga'];
    $foto = $data['Foto1'];
    $foto2 = $data['Foto2'];
    $foto3 = $data['Foto3'];
    $pentik = $data['Pentik'];
    $snk = $data['SnK'];
    $info = $data['Infotambahan'];
    $fasilitas = $data['Fasilitas'];
    $kapasitas = $data['Kapasitas'];
    $deskripsi = $data['Desk'];
    // echo $fasilitas;
}

?>
<form id="form-edit">
    <div class="row g-3">
        <div class="col">
            <label for="nameHomestay" class="form-label">Nama Homestay</label>
            <input name="nama" type="text" class="form-control" id="nameHomestay" placeholder="garuda"
                value="<?= $nama ?>">
            <input type="hidden" value="<?= $data['Id']; ?>" name="id">
        </div>
        <div class="col">
            <label for="hargaHomestay" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="hargaHomestay" placeholder="20000"
                value="<?= $harga ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input name="kapasitas" type="number" class="form-control" id="kapasitas" placeholder="2.."
                value="<?= $kapasitas ?>">
        </div>
        <div class="col">
            <label for="desk" class="form-label">Deskripsi</label>
            <input name="desk" type="text" class="form-control" id="desk" placeholder="deskripsi"
                value="<?= $deskripsi ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="foto1" class="form-label">Foto 1</label>
            <input type="file" name="foto" accept="image/" class="form-control" id="foto1" value="<?= $foto ?>">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto) ?></small>
        </div>
        <div class="col">
            <label for="foto2" class="form-label">Foto 2</label>
            <input type="file" name="foto2" accept="image/" class="form-control" id="foto2" value="<?= $foto2 ?>">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto2) ?></small>
        </div>
        <div class="col">
            <label for="foto3" class="form-label">Foto 3</label>
            <input type="file" name="foto3" accept="image/" class="form-control" id="foto3" value="<?= $foto3 ?>">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto3) ?></small>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="pentik" class="form-label">Pentik</label>
            <textarea class="form-control" name="pentik" id="pentik"
                rows="2"><?= htmlspecialchars($pentik) ?></textarea>
        </div>
        <div class="col">
            <label for="snk" class="form-label">SnK</label>
            <textarea class="form-control" name="snk" id="snk" rows="2"><?= htmlspecialchars($snk) ?></textarea>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="inpo" class="form-label">Info Tambahan</label>
            <textarea class="form-control" name="info_tambahan" id="inpo"
                rows="2"><?= htmlspecialchars($info) ?></textarea>
        </div>
        <div class="col">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <textarea class="form-control" name="fasilitas" id="fasilitas"
                rows="2"><?= htmlspecialchars($fasilitas) ?></textarea>
        </div>

    </div>
    <div class="d-grid mt-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit" id="submitBtn" edit-id="<?= $data['Id'] ?>" name="ubah">Update
            Homestay</button>
    </div>
</form>
<script>
    $('#form-edit').submit(function(e) {
        e.preventDefault();

        let formData = new FormData($(this)[0]);
        // var id = $(this).attr('edit-id');
        // formData.append('Id', id);


        // Check if any new files are uploaded
        const existingFiles = {
            foto: '<?= htmlspecialchars($foto) ?>',
            foto2: '<?= htmlspecialchars($foto2) ?>',
            foto3: '<?= htmlspecialchars($foto3) ?>'
        };

        // Check if files are uploaded, if not, append existing filenames
        formData.append('foto', existingFiles.foto);
        formData.append('foto2', existingFiles.foto2);
        formData.append('foto3', existingFiles.foto3);

        // Log the form data for debugging
        // for (let [key, value] of formData.entries()) {
        //     console.log(key, value);
        // }

        $.ajax({
            url: '../../../config/hs-edit-delete.php', // Replace with your URL
            type: 'POST',
            data: formData,
            processData: false, // Do not process data
            contentType: false, // Let jQuery set the Content-Type
            success: function(response) {
                var pecah = response.split('|');
                Swal.fire({
                    position: 'center',
                    icon: pecah[0],
                    title: pecah[1],
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = 'home.php';
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });
</script>