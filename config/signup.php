<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $role = 'user';

    // Mengenkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Menyesuaikan nama tabel dan kolom dengan entitas tabel Anda
    $sql = "INSERT INTO user (Username, Email, Password, Role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Memastikan bahwa bind_param menggunakan tipe data yang benar
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error; // Menggunakan $stmt->error untuk kesalahan yang lebih spesifik
    }

    $stmt->close();
}

$conn->close();