<?php
include 'config.php';
include 'upload-file.php';


if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $query = mysqli_query($conn, "DELETE FROM `homestay` WHERE Id = '$id'");
    if ($query) {
        echo 'success|Data berhasil dihapus';
    } else {
        echo 'error|Data gagal dihapus';
    }
}

if (isset($_POST['nama'])) {
    // // Check if 'Id' is set
    // if (isset($_POST['Id'])) {
    //     $id = $_POST['Id'];
    // } else {
    //     echo "Error: 'Id' not provided.";
    //     exit;
    // }

    // Initialize variables safely
    $id = $_POST['id'] ?? '';
    $nameHomestay = $_POST['nama'] ?? '';
    $hargaHomestay = $_POST['harga'] ?? '';
    $pentik = $_POST['pentik'] ?? '';
    $snk = $_POST['snk'] ?? '';
    $inpo = $_POST['info_tambahan'] ?? '';
    $fasilitas = $_POST['fasilitas'] ?? '';
    $kapasitas = $_POST['kapasitas'] ?? '';
    $desk = $_POST['desk'] ?? '';
    $foto = $_POST['foto'] ?? '';
    $foto2 = $_POST['foto2'] ?? '';
    $foto3 = $_POST['foto3'] ?? '';
    $upfoto = $_FILES['foto'] ?? '';
    $upfoto2 = $_FILES['foto2'] ?? '';
    $upfoto3 = $_FILES['foto3'] ?? '';
    if (empty($upfoto['name'])) {
        $upfoto['name'] = $foto; // Assign existing photo value
    }

    if (empty($upfoto2['name'])) {
        $upfoto2['name'] = $foto2; // Assign existing photo2 value
    }

    if (empty($upfoto3['name'])) {
        $upfoto3['name'] = $foto3; // Assign existing photo3 value
    }
    print_r($upfoto);

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
    // // Prepare the query
    $query = mysqli_query($conn, "UPDATE `homestay` SET 
        `Nama`='$nameHomestay',
        `Harga`='$hargaHomestay',
        `Kapasitas`='$kapasitas',
        `Desk`='$desk',
        `Foto1`='$upfoto',
        `Foto2`='$upfoto2',
        `Foto3`='$upfoto3',
        `Pentik`='$pentik',
        `SnK`='$snk',
        `Infotambahan`='$inpo',
        `Fasilitas`='$fasilitas' 
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
