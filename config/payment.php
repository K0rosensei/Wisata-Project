<?php

namespace Midtrans;

include 'config.php';


require_once dirname(__FILE__) . '/midtrans/Midtrans.php';
Config::$clientKey = 'SB-Mid-server-QpvuaAyAiWPZyw-GBHqLCLZw';

// ===========================HOMESTAY PAYMENT CONFIG===================================
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
        // $token = midtransPayment($transaksiId, $total);
        // echo "../../midtrans/examples/snap/checkout-process.php?order_id=$transaksiId&&total=$total";
        echo json_encode(array('transaksiId' => $transaksiId, 'total' => $total, 'name' => $nama));
        // echo $transaksiId;
    } else {
        echo json_encode(array('error' => 'Gagal: ' . mysqli_error($conn)));
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaksiId'])) {

    $orderID = $_POST['transaksiId'];
    $price = $_POST['total'];
    require_once dirname(__FILE__) . '/midtrans/Midtrans.php';


    //SAMPLE REQUEST START HERE

    // Set your Merchant Server Key
    Config::$serverKey = 'SB-Mid-server-QpvuaAyAiWPZyw-GBHqLCLZw';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    Config::$isProduction = false;
    // Set sanitization on (default)
    Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => $orderID,
            'gross_amount' => $price,
        ),
        // 'customer_details' => array(
        //     'first_name' => 'budi',
        //     'last_name' => 'pratama',
        //     'email' => 'budi.pra@example.com',
        //     'phone' => '08111222333',
        // ),
    );

    $snapToken = Snap::getSnapToken($params);
    if ($snapToken) {
        echo json_encode(array('token' => $snapToken));
    } else {
        echo json_encode(array('error' => 'Gagal: ' . mysqli_error($conn)));
    }
}

// ================================END HOMESTAY PAYMENT CONFIG===============================