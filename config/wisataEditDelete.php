<?php
include 'config.php';
include 'upload-file.php';


if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $query = mysqli_query($conn, "DELETE FROM `wisata` WHERE Id = '$id'");
    if ($query) {
        echo 'success|Data berhasil dihapus';
    } else {
        echo 'error|' . mysqli_error($conn) . '';
    }
}

if (isset($_POST['tempat'])) {
    // Initialize variables safely
    $id = $_POST['id'] ?? '';
    $nameWisata = $_POST['tempat'] ?? '';
    $hargaWisata = $_POST['harga'] ?? '';
    $foto = $_POST['foto'] ?? '';
    $foto2 = $_POST['foto2'] ?? '';
    $foto3 = $_POST['foto3'] ?? '';
    $foto4 = $_POST['foto4'] ?? '';
    $foto5 = $_POST['foto5'] ?? '';
    $foto6 = $_POST['foto6'] ?? '';
    $foto7 = $_POST['foto7'] ?? '';
    $upfoto = $_FILES['foto'] ?? '';
    $upfoto2 = $_FILES['foto2'] ?? '';
    $upfoto3 = $_FILES['foto3'] ?? '';
    $upfoto4 = $_FILES['foto4'] ?? '';
    $upfoto5 = $_FILES['foto5'] ?? '';
    $upfoto6 = $_FILES['foto6'] ?? '';
    $upfoto7 = $_FILES['foto7'] ?? '';
    if (empty($upfoto['name'])) {
        $upfoto['name'] = $foto; // Assign existing photo value
    }

    if (empty($upfoto2['name'])) {
        $upfoto2['name'] = $foto2; // Assign existing photo2 value
    }

    if (empty($upfoto3['name'])) {
        $upfoto3['name'] = $foto3; // Assign existing photo3 value
    }
    if (empty($upfoto4['name'])) {
        $upfoto4['name'] = $foto4; // Assign existing photo2 value
    }

    if (empty($upfoto5['name'])) {
        $upfoto5['name'] = $foto5; // Assign existing photo3 value
    }
    if (empty($upfoto6['name'])) {
        $upfoto6['name'] = $foto6; // Assign existing photo2 value
    }

    if (empty($upfoto7['name'])) {
        $upfoto7['name'] = $foto7; // Assign existing photo3 value
    }
    // print_r($upfoto);

    $status = uploadFile($upfoto);
    if ($status === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto = basename($upfoto['name']);
    $status2 = uploadFile($upfoto2);
    if ($status2 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto2 = basename($upfoto2['name']);
    $status3 = uploadFile($upfoto3);
    if ($status3 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto3 = basename($upfoto3['name']);
    $status4 = uploadFile($upfoto4);
    if ($status4 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto4 = basename($upfoto4['name']);
    $status5 = uploadFile($upfoto5);
    if ($status5 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto5 = basename($upfoto5['name']);
    $status6 = uploadFile($upfoto6);
    if ($status6 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto6 = basename($upfoto6['name']);
    $status7 = uploadFile($upfoto7);
    if ($status7 === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto7 = basename($upfoto7['name']);
    // // Prepare the query
    $query = mysqli_query($conn, "UPDATE `wisata` SET 
        `Tempat`='$nameWisata',
        `Harga`='$hargaWisata',
        `Foto1`='$upfoto',
        `Foto2`='$upfoto2',
        `Foto3`='$upfoto3',
        `Foto4`='$upfoto4',
        `Foto5`='$upfoto5',
        `Foto6`='$upfoto6',
        `Foto7`='$upfoto7'
        WHERE Id = '$id'");

    // Check query success
    if ($query) {
        echo 'success|Data Berhasil Diubah';
    } else {
        echo 'error|Data gagal Diubah';
    }
} else {
    echo "Error: 'nama' not provided.";
}
