<?php

include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_user'])) {
    $id =  $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $nama = $_POST['nama'];
    $quantityPerson = $_POST['quantityPerPerson'];
    $quantityNight = $_POST['quantityPerNight'];
    $total = $_POST['totalPrice'];
    $transaksiId = rand();
    $tanggal = date('Y-m-d');
    $status = 'pending';

    $sql = "INSERT INTO pesanhomestay (Id, Homestay_id, Tanggal, Total, CheckIn, IsCheckin, Checkout, Ischeckout, StatusPayment) VALUES('$transaksiId', '$id_product', '$tanggal', '$total', '','','','','$status')";
    if (mysqli_query($conn, $sql)) {
        echo "../../midtrans/examples/snap/checkout-process.php?order_id=$transaksiId&&total=$total";
        // return 'success';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $id =  $_POST['id_transaksi'];
    $status = $_POST['status'];

    $sql = "UPDATE pesanhomestay SET status = '$status' WHERE Id = '$id'";
    if (mysqli_query($conn, $sql)) {
        return 'success';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}