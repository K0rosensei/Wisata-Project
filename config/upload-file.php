<?php
function uploadFile($foto)
{
    $targetDir = "../uploads/"; // Pastikan folder ini ada dan memiliki izin
    $targetFile = $targetDir . $foto['name']; // Menggunakan nama asli file



    // Cek apakah file sudah ada
    if (file_exists($targetFile)) {
        return ['status' => 'berhasil'];
    }

    // Coba untuk meng-upload file
    if (move_uploaded_file($foto["tmp_name"], $targetFile)) {
        return ['status' => 'berhasil'];
    } else {
        return ['status' => 'Gagal'];
    }
}
