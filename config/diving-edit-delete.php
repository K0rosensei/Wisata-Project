<?php
include 'config.php';
include 'upload-file.php';


if (isset($_POST['hapus'])) {
    $id = $_POST['hapus'];
    $query = mysqli_query($conn, "DELETE FROM `diving` WHERE Id = '$id'");
    if ($query) {
        echo 'success|Data berhasil dihapus';
    } else {
        echo 'error|Data gagal dihapus';
    }
}

if (isset($_POST['nama'])) {


    // Initialize variables safely
    $id = $_POST['id'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $status = $_POST['status'] ?? '';
    $keterangan = $_POST['keterangan'] ?? '';
    $foto = $_POST['foto'] ?? '';
    $upfoto = $_FILES['foto'] ?? '';
    if (empty($upfoto['name'])) {
        $upfoto['name'] = $foto; // Assign existing photo value
    }

    $string = uploadFile($upfoto);
    if ($string === 'Gagal') {
        echo 'error|Data gagal Diubah';
    }
    $upfoto = basename($upfoto['name']);

    // echo $upfoto;
    // Prepare the query
    $query = mysqli_query($conn, "UPDATE `diving` SET 
        `Alat`='$nama',
        `Harga`='$harga',
        `Jumlah`='$jumlah',
        `Status`='$status',
        `Keterangan`='$keterangan',
        `Image`='$upfoto' 
        WHERE Id = '$id'");

    // Check query success
    if ($query) {
        echo 'success|Data Berhasil Diubah';
    } else {
        echo 'error|' . mysqli_error($conn) . '';
    }
} else {
    echo "Error: 'nama' not provided.";
}
