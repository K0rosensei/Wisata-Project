<?php
include 'config.php';

$sqlDiving = "SELECT * FROM diving";
$queryDiving = mysqli_query($conn, $sqlDiving);
$totalDiving = mysqli_num_rows($queryDiving);