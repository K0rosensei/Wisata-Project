<?php
include 'config.php';
include 'upload-file.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tambah']) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $gambar = $_FILES['foto'];
    $keterangan = $_POST['keterangan'];

    $id = rand(10, 99);

    if (mysqli_num_rows(mysqli_query($conn, "SELECT  * FROM diving WHERE Id = '$id'")) > 0) {
        $id = rand(10, 99);
    }

    $upload_foto = uploadFile($gambar);
    if ($upload_foto == 'Gagal') {
        echo 'File Sudah Ada';
    }
    $string = basename($gambar['name']);;


    // Lakukan pemrosesan data sesuai kebutuhan

    $sql = "INSERT INTO diving (Id, Alat, Harga, Jumlah, Keterangan, Status, Image) VALUES('$id','$nama','$harga','$jumlah','$keterangan','$status','$string')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Berhasil';
    } else {
        echo 'Error' . mysqli_error($conn);
    }
} else {
    echo 'error' . mysqli_error($conn);
}
