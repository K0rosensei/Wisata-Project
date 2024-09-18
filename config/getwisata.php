<?php
include 'config.php';

if (!session_id())
    session_start();

if (!empty($token)) {
    $iduser = $_SESSION['iduser'];
    $query = "SELECT * FROM wisata WHERE Id = 3 ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}
?>