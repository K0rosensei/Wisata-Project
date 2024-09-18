<?php
include 'config.php';
include 'getdatahs.php';
include_once 'alert.php';

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
function saveReview($conn, $kategoriRating, $username, $rating, $tanggal, $review, $idhomestay) {
    if ($kategoriRating === "ratinghomestay") {
        mysqli_query($conn, "INSERT INTO ratinghomestay (Username, Rating, Tanggal, Review, Idhomestay) VALUES ('$username', '$rating', '$tanggal', '$review', '$idhomestay')");
    } else if ($kategoriRating === "ratingWisata") {
        mysqli_query($conn, "INSERT INTO ratingwisata (Username, Rating, Tanggal, Review) VALUES ('$username', '$rating', '$tanggal', '$review', '$idhomestay')");
    }
}

function checkUsernameInReview($conn, $kategoriRating, $username, $idhomestay) {
    if ($kategoriRating === "ratinghomestay") {
        $query = "SELECT * FROM ratinghomestay WHERE Username = '$username' AND Idhomestay = '$idhomestay'";
    } else if ($kategoriRating === "ratingWisata") {
        $query = "SELECT * FROM ratingwisata WHERE Username = '$username'";
    }

    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 5]]);
    $review = trim(filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING));
    $idhomestay = filter_input(INPUT_POST, 'idhomestay', FILTER_VALIDATE_INT);
    // var_dump($rating, $review, $idhomestay);
    
    if ($rating && $review && $idhomestay) {
        // Asumsikan bahwa username disimpan dalam sesi setelah login
        $username = $_SESSION['username'] ?? 'Anonymous';
        $tanggal = date('Y-m-d');

        // Cek apakah username sudah pernah memberikan review
        if (checkUsernameInReview($conn, $kategoriRating = "ratinghomestay", $username, $idhomestay)) {
            flash('error', 'Anda sudah memberikan review untuk homestay ini.');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        
        try {
            $insert = saveReview($conn, $kategoriRating = "ratinghomestay", $username, $rating, $tanggal, $review, $idhomestay);
            if (!$insert) {
                flash('success', 'Terima kasih atas review Anda!');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                flash('error', 'Terjadi kesalahan saat menyimpan review.');
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } catch (PDOException $e) {
            $errorMessage = "Terjadi kesalahan database: " . $e->getMessage();
        }
    } else {
        flash('error', 'Semua field harus diisi dengan benar.');
    }
}

?>
