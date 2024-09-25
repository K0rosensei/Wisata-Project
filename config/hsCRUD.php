<?php
include 'config.php';
include 'upload-file.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tambah']) {

    $nameHomestay = $_POST['nama'];
    $hargaHomestay = $_POST['harga'];
    $kapasitas = $_POST['kapasitas'];
    $desk = $_POST['desk'];
    $pentik = $_POST['pentik'];
    $foto1 = $_FILES['foto'];
    $foto2 = $_FILES['foto2'];
    $foto3 = $_FILES['foto3'];
    $snk = $_POST['snk'];
    $inpo = $_POST['info_tambahan'];
    $fasilitas = $_POST['fasilitas'];
    $id = $randomNumber = rand(10, 99);

    $upload_foto = uploadFile($foto1);
    if ($upload_foto == 'Gagal') {
        echo 'File Sudah Ada';
    }
    $string1 = basename($foto1['name']);;

    $upload_foto2 = uploadFile($foto2);
    $string2 = basename($foto2['name']);
    if ($upload_foto2 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $upload_foto3 = uploadFile($foto3);
    if ($upload_foto3 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $string3 = basename($foto3['name']);

    // Lakukan pemrosesan data sesuai kebutuhan

    $sql = "INSERT INTO homestay (Id, Nama, Harga, Kapasitas, Desk, Foto1, Foto2, Foto3, Pentik, SnK, Infotambahan, Fasilitas) VALUES('$id','$nameHomestay','$hargaHomestay','$kapasitas','$desk','$string1','$string2','$string3','$pentik','$snk','$inpo', '$fasilitas')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Berhasil';
    } else {
        echo 'Error' . mysqli_error($conn);
    }
} else {
    echo 'error' . mysqli_error($conn);
}
