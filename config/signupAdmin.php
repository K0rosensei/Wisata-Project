<?php
include 'config.php'; // Pastikan file config.php berisi detail koneksi database

// Pastikan metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'admin';


    // Mengenkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query untuk menyimpan data ke database
    $sql = "INSERT INTO User (Role, Username, Fullname, Email, Password) VALUES ('$role', '$username', '$name', '$email', '$hashed_password')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'registration Succesfull';
        header("Location: ../fitur/admin/login.php");
        exit(); // Pastikan untuk menggunakan exit() setelah header
    } else {
        echo mysqli_error($conn);
    }
}