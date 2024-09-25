<?php

include 'config.php';

function readAllUser()
{
    global $conn;
    $sqlRead = mysqli_query($conn, "SELECT * FROM user WHERE Role = 'User'");
    $total = mysqli_num_rows($sqlRead);
    if ($total < 0) {
        $total =  "Data Kosong";
    }
    return [$sqlRead, $total];
}

function readUser($username)
{
    global $conn;
    $sqlRead = mysqli_query($conn, "SELECT * FROM user WHERE Username = '$username'");
    $total = mysqli_num_rows($sqlRead);
    if ($total < 0) {
        $total =  "Data Kosong";
    }
    $readData = mysqli_fetch_assoc($sqlRead);
    return $readData;
}
