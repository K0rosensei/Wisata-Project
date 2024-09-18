<?php
include 'config.php';

$query = "SELECT homestay.*, COALESCE(AVG(rh.rating), 0) AS avg_rating FROM homestay LEFT JOIN ratinghomestay rh ON homestay.Id = rh.Idhomestay
GROUP BY homestay.Id
ORDER BY avg_rating DESC LIMIT 3
";
$result = mysqli_query($conn, $query);
?>