<?php
include 'config.php';

$sqlWisata = "SELECT * FROM wisata";
$queryWisata = mysqli_query($conn, $sqlWisata);
$totalWisata = mysqli_num_rows($queryWisata);