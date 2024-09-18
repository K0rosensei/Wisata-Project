<?php
error_reporting(E_ERROR | E_PARSE);
include 'config.php';

// Pastikan sesi dimulai
if (!session_id()) {
    session_start();
}

if (!empty($_SESSION['iduser'])) {
    $iduser = $_SESSION['iduser'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_REQUEST['search'])) {
        $search = mysqli_real_escape_string($conn, $_REQUEST['search']);
        $query = "
            SELECT homestay.*, 
                   COALESCE(AVG(rh.rating), 0) AS avg_rating 
            FROM homestay
        LEFT JOIN ratinghomestay rh ON homestay.Id = rh.Idhomestay
        LEFT JOIN cekpesan ON homestay.Id = cekpesan.idpesanan AND cekpesan.iduser = $iduser AND cekpesan.tipepesanan = 'hs'
        WHERE homestay.Nama LIKE '%$search%'
        GROUP BY homestay.Id
        ";
    } else {
        $query = "
        SELECT homestay.*, 
               COALESCE(AVG(rh.rating), 0) AS avg_rating 
        FROM homestay
        LEFT JOIN ratinghomestay rh ON homestay.Id = rh.Idhomestay
        LEFT JOIN cekpesan ON homestay.Id = cekpesan.idpesanan AND cekpesan.iduser = $iduser AND cekpesan.tipepesanan = 'hs'
        GROUP BY homestay.Id
    ";
    }

} else {
    // Query untuk menampilkan semua homestay dan rata-rata rating tanpa user login
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_REQUEST['search'])) {
        $search = mysqli_real_escape_string($conn, $_REQUEST['search']);
        $query = "
            SELECT homestay.*, 
                   COALESCE(AVG(rh.rating), 0) AS avg_rating 
            FROM homestay
            LEFT JOIN ratinghomestay rh ON homestay.Id = rh.Idhomestay
            WHERE homestay.Nama LIKE '%$search%'
            GROUP BY homestay.Id
        ";
    } else {
        $query = "
            SELECT homestay.*, 
                   COALESCE(AVG(rh.rating), 0) AS avg_rating 
            FROM homestay
            LEFT JOIN ratinghomestay rh ON homestay.Id = rh.Idhomestay
            GROUP BY homestay.Id
        ";
    }
}

if (isset($_REQUEST['id'])) {
    $id = (int) $_REQUEST['id']; // Sanitasi ID untuk menghindari SQL Injection
    $query = "SELECT * FROM homestay WHERE Id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    $penukarantiket = "SELECT Pentik FROM homestay WHERE Id = $id";
    $resultpenukarantiket = mysqli_query($conn, $penukarantiket);
    $datapenukarantiket = mysqli_fetch_assoc($resultpenukarantiket);

    $syaratketentuan = "SELECT SnK FROM homestay WHERE Id = $id";
    $resultsyaratketentuan = mysqli_query($conn, $syaratketentuan);
    $datasyaratketentuan = mysqli_fetch_assoc($resultsyaratketentuan);

    $informasitambahan = "SELECT Infotambahan FROM homestay WHERE Id = $id";
    $resultinformasitambahan = mysqli_query($conn, $informasitambahan);
    $datainformasitambahan = mysqli_fetch_assoc($resultinformasitambahan);

    $fasilitas = "SELECT Fasilitas FROM homestay WHERE Id = $id";
    $resultfasilitas = mysqli_query($conn, $fasilitas);
    $datafasilitas = mysqli_fetch_assoc($resultfasilitas);
}

$result = mysqli_query($conn, $query);