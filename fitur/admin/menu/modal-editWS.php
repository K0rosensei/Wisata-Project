<?php
include '../../../config/config.php';

$id = $_POST['id'];
$sql = "SELECT * FROM wisata WHERE Id = '$id'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);

    $nama = $data['Tempat'];
    $harga = $data['Harga'];
    $foto = $data['Foto1'];
    $foto2 = $data['Foto2'];
    $foto3 = $data['Foto3'];
    $foto4 = $data['Foto4'];
    $foto5 = $data['Foto5'];
    $foto6 = $data['Foto6'];
    $foto7 = $data['Foto7'];
}

?>
<form id="form-edit">
    <div class="row g-3">
        <div class="col">
            <label for="tempatWisata" class="form-label">Nama Tempat</label>
            <input name="tempat" type="text" class="form-control" id="tempatWisata" placeholder="Dungaliyo"
                value="<?= $nama ?>">
            <input name="id" type="hidden" class="form-control" id="tempatWisata" value="<?= $data['Id'] ?>">
        </div>
        <div class="col">
            <label for="hargaWisata" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="hargaHomestay" placeholder="20000"
                value="<?= $harga ?>">
        </div>
        <div class="col">
            <label for="foto1" class="form-label">Foto 1</label>
            <input type="file" name="foto" accept="image/" class="form-control" id="foto1">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto) ?></small>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="foto2" class="form-label">Foto 2</label>
            <input type="file" name="foto2" accept="image/" class="form-control" id="foto2">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto2) ?></small>
        </div>
        <div class="col">
            <label for="foto3" class="form-label">Foto 3</label>
            <input type="file" name="foto3" accept="image/" class="form-control" id="foto3">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto3) ?></small>
        </div>
        <div class="col">
            <label for="foto4" class="form-label">Foto 4</label>
            <input type="file" name="foto4" accept="image/" class="form-control" id="foto4">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto4) ?></small>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for="foto5" class="form-label">Foto 5</label>
            <input type="file" name="foto5" accept="image/" class="form-control" id="foto5">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto5) ?></small>
        </div>
        <div class="col">
            <label for="foto6" class="form-label">Foto 6</label>
            <input type="file" name="foto6" accept="image/" class="form-control" id="foto6">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto6) ?></small>

        </div>
        <div class="col">
            <label for="foto7" class="form-label">Foto 7</label>
            <input type="file" name="foto7" accept="image/" class="form-control" id="foto7">
            <small id="currentFile" class="form-text text-muted"> <?= htmlspecialchars($foto7) ?></small>
        </div>
    </div>

    <div class="d-grid mt-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit" id="submitBtn">Tambah
            Wisata</button>
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
            foto3: '<?= htmlspecialchars($foto3) ?>',
            foto4: '<?= htmlspecialchars($foto4) ?>',
            foto5: '<?= htmlspecialchars($foto5) ?>',
            foto6: '<?= htmlspecialchars($foto6) ?>',
            foto7: '<?= htmlspecialchars($foto7) ?>'
        };

        // Check if files are uploaded, if not, append existing filenames
        formData.append('foto', existingFiles.foto);
        formData.append('foto2', existingFiles.foto2);
        formData.append('foto3', existingFiles.foto3);
        formData.append('foto4', existingFiles.foto4);
        formData.append('foto5', existingFiles.foto5);
        formData.append('foto6', existingFiles.foto6);
        formData.append('foto7', existingFiles.foto7);

        // Log the form data for debugging
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        $.ajax({
            url: '../../../config/wisataEditDelete.php', // Replace with your URL
            type: 'POST',
            data: formData,
            processData: false, // Do not process data
            contentType: false, // Let jQuery set the Content-Type
            success: function(response) {
                // Handle response from server
                console.log(response);
                var pecah = response.split('|');
                Swal.fire({
                    position: 'center',
                    icon: pecah[0],
                    title: pecah[1],
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = 'wisata.php';
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });
</script>