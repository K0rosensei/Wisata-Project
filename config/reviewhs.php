<?php
include 'config.php';
include 'getdatahs.php';

$queryreview = "SELECT * FROM ratinghomestay WHERE Idhomestay = $id";
$resultreview = mysqli_query($conn, $queryreview);
// while ($datareview = mysqli_fetch_assoc($resultreview)) {
//     var_dump($datareview);
// }
//$datareview = mysqli_fetch_assoc($resultreview);
// var_dump($datareview);

$count = "SELECT COUNT(*) AS countrating FROM ratinghomestay WHERE Idhomestay = $id";
$resultcount = mysqli_query($conn, $count);
$datacount = mysqli_fetch_assoc($resultcount);
// var_dump($datacount);

$countuser = "SELECT COUNT(*) AS countuser FROM ratinghomestay WHERE Idhomestay = $id";
$resultcountuser = mysqli_query($conn, $countuser);
$datacountuser = mysqli_fetch_assoc($resultcountuser);
// var_dump($datacountuser);

$avarage = "SELECT AVG(rating) AS avgrating FROM ratinghomestay WHERE Idhomestay = $id";
$resultavarage = mysqli_query($conn, $avarage);
$dataavarage = mysqli_fetch_assoc($resultavarage);
$starsRating = round($dataavarage['avgrating']);
// var_dump($dataavarage);

$avgdecimal = round($dataavarage['avgrating'], 1);
    // var_dump($avgdecimal);

    $descavg = "";
    if ($dataavarage['avgrating'] >= 4 && $dataavarage['avgrating'] <= 5) {
        $descavg = "<span class='good'>BAGUS</span>";
    } else if ($dataavarage['avgrating'] >= 2 && $dataavarage['avgrating'] < 4) {
        $descavg = "<span class='medium'>SEDANG</span>";
    } else if ($dataavarage['avgrating'] >= 1 && $dataavarage['avgrating'] < 2) {
        $descavg = "<span class='bad'>BURUK</span>";
    } else {
        $descavg = "<span class='nothing'>BELUM ADA RATING</span>";
    }

// Fungsi untuk menyimpan review
function saveReview($pdo, $username, $rating, $review, $idhomestay) {
    $sql = "INSERT INTO reviews (username, rating, review, idhomestay) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $rating, $review, $idhomestay]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 5]]);
    $review = trim(filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING));
    $idhomestay = filter_input(INPUT_POST, 'idhomestay', FILTER_VALIDATE_INT);
    print_r($rating,);
    
    if ($rating && $review && $idhomestay) {
        // Asumsikan bahwa username disimpan dalam sesi setelah login
        $username = $_SESSION['username'] ?? 'Anonymous';
        
        try {
            if (saveReview($pdo, $username, $rating, $review, $idhomestay)) {
                $successMessage = "Terima kasih atas review Anda!";
            } else {
                $errorMessage = "Maaf, terjadi kesalahan saat menyimpan review Anda.";
            }
        } catch (PDOException $e) {
            $errorMessage = "Terjadi kesalahan database: " . $e->getMessage();
        }
    } else {
        $errorMessage = "Semua field harus diisi dengan benar.";
    }
}

?>