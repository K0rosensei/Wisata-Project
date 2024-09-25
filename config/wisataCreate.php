<?php
include 'config.php';
include 'upload-file.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tambah']) {

    $nameWisata = $_POST['tempat'];
    $hargaWisata = $_POST['harga'];
    $foto1 = $_FILES['foto'];
    $foto2 = $_FILES['foto2'];
    $foto3 = $_FILES['foto3'];
    $foto4 = $_FILES['foto4'];
    $foto5 = $_FILES['foto5'];
    $foto6 = $_FILES['foto6'];
    $foto7 = $_FILES['foto7'];
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
    $upload_foto4 = uploadFile($foto4);
    if ($upload_foto4 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $string4 = basename($foto4['name']);
    $upload_foto5 = uploadFile($foto5);
    if ($upload_foto5 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $string5 = basename($foto5['name']);
    $upload_foto6 = uploadFile($foto6);
    if ($upload_foto6 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $string6 = basename($foto6['name']);
    $upload_foto7 = uploadFile($foto7);
    if ($upload_foto7 == 'Gagal') {
        echo 'File Sudah Ada Bosku';
    }
    $string7 = basename($foto7['name']);

    // Lakukan pemrosesan data sesuai kebutuhan

    $sql = "INSERT INTO wisata (Id, Tempat, Harga, Foto1, Foto2, Foto3,Foto4, Foto5, Foto6, Foto7) VALUES('$id','$nameWisata','$hargaWisata','$string1','$string2','$string3','$string4','$string5','$string6','$string7')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Berhasil';
    } else {
        echo 'Error' . mysqli_error($conn);
    }
} else {
    echo 'error' . mysqli_error($conn);
}
