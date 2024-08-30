<?php

include 'config.php'; // Koneksi database
include 'session.php'; // Berisi pengaturan session atau mungkin kode tambahan

// Pastikan username di session ada
if (!isset($_SESSION['username'])) {
    die('Session tidak diatur.');
}

$username = $_SESSION['username']; // Ambil username dari session


function updateName($name, $username)
{
    global $conn;
    $update = "UPDATE user SET Fullname = '$name' WHERE Username = '$username'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function dateUpdate($date, $username)
{
    global $conn;
    $update = "UPDATE user SET Date = '$date' WHERE Username = '$username'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function genderUpdate($gender, $username)
{
    global $conn;

    $update = "UPDATE user SET Gender = '$gender' WHERE Username = '$username'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function numberUpdate($number, $username)
{
    global $conn;

    $update = "UPDATE user SET Nohp = '$number' WHERE Username = '$username'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
function emailUpdate($email, $username)
{
    global $conn;

    $update = "UPDATE user SET Email = '$email' WHERE Username = '$username'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        return 'Berhasil';
    } else {
        return 'Gagal: ' . mysqli_error($conn);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = $_POST['name'];
    $result = updateName($name, $username);
    echo $result; // Kirim respons kembali ke klien
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
    $date = $_POST['date'];
    $result = dateUpdate($date, $username);
    echo $result; // Kirim respons kembali ke klien
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    $result = genderUpdate($gender, $username);
    echo $result; // Kirim respons kembali ke klien
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
    $number = $_POST['number'];
    $result = numberUpdate($number, $username);
    echo $result; // Kirim respons kembali ke klien
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $result = emailUpdate($email, $username);
    echo $result; // Kirim respons kembali ke klien
}