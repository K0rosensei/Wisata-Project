<?php

namespace Midtrans;

include 'config.php';


require_once dirname(__FILE__) . '/midtrans/Midtrans.php';
Config::$clientKey = 'SB-Mid-server-QpvuaAyAiWPZyw-GBHqLCLZw';
// ============================== DIIVING PAYMENT CONFIG =====================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    $id =  $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $nama = $_POST['nama'];
    $quantityPerson = $_POST['quantityPerPerson'];
    $total = $_POST['totalPrice'];
    $transaksiId = rand();
    $tanggal = date('Y-m-d');
    $status = 'pending';


    $sql = "INSERT INTO pesanwisata (Id, User_Id, Diving_Id, Tanggal, Jumlah, Total, Status) VALUES('$transaksiId', '$id', '$id_product', '$tanggal','$quantityPerson', '$total','$status')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('orderId' => $transaksiId, 'totalPrice' => $total, 'name' => $nama));
        // echo $transaksiId;
    } else {
        echo json_encode(array('error' => 'Gagal: ' . mysqli_error($conn)));
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
//============================== END DIVING PAYMENT CONFIG ===================================