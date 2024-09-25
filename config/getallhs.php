<?php
include 'config.php';

$sql = "SELECT * FROM homestay";
$query = mysqli_query($conn, $sql);
$totalHS = mysqli_num_rows($query);
