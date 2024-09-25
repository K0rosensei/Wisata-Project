<?php

include 'config.php'; // Koneksi database

function getDiving($divingId)
{
    global $conn;
    $sql = "SELECT * FROM diving WHERE Id = '$divingId'";
    $queryDiving = mysqli_query($conn, $sql);
    if ($queryDiving) {
        $divingData = mysqli_fetch_assoc($queryDiving);
        if ($divingData) {
            return $divingData;
        } else {
            return 'Gagal: ' . mysqli_error($conn);
        }
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function getAllDiving()
{
    global $conn;
    $sql = "SELECT * FROM diving'";
    $queryDiving = mysqli_query($conn, $sql);
    if ($queryDiving) {
        $divingData = mysqli_fetch_assoc($queryDiving);
        if ($divingData) {
            return $divingData;
        } else {
            return 'Gagal: ' . mysqli_error($conn);
        }
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function updateDiving($divingId, $harga)
{
    global $conn;
    $sql = "UPDATE diving SET Harga = '$harga' WHERE Id = '$divingId'";
    $queryDiving = mysqli_query($conn, $sql);
    if ($queryDiving) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}