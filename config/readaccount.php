<?php
include 'config.php';


$username = $_SESSION['username'];
$select = "SELECT * FROM user WHERE Username = '$username'";
$query = mysqli_query($conn, $select);
$data = mysqli_fetch_assoc($query);

foreach ($data as $key => $value) {
    if (empty($value)) {
        $data[$key] = '(empty)';
    }
}

if ($data['Nohp'] == '(empty)') {
    $statusHp = 'Silahkan Tambahkan Nomor HP dan Verifikasi';
} else {
    $statusHp = 'Sudah diverifikasi';
}