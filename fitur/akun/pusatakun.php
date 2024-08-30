<?php
include '../../config/session.php';
include '../../config/account.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homestay Jein</title>
    <link rel="stylesheet" href="pakun.css" />
</head>

<body>
    <div class="account-container">
        <div class="sidebar">
            <a href="#" class="back-button" onclick="history.back()"><img
                    src="/bahoitourismv2/asset/icon1/ArrowBack.png" alt="">Kembali</a>
            <div class="logo">
                <img src="/bahoitourismv2/asset/icon1/Logo1.png" alt="" class="logo1">
                <img src="/bahoitourismv2/asset/icon1/Logo2.png" alt="" class="logo2">
            </div>
            <h2>Pusat Akun</h2>
            <p>Semua perubahan yang dibuat <br>
                di sini akan mengubah data di <br>
                akun kamu</p>
        </div>
        <div class="main-content">
            <div class="profile-section">
                <div class="profile-header">
                    <img src="/bahoitourismv2/asset/icon3/Usereeee.png" alt="Profile Icon" class="profile-icon">
                    <div class="profile-info">
                        <h2>Profil</h2>
                        <a href="editakun.php" class="edit-link">Edit</a>
                    </div>
                </div>
                <div class="profile-details">
                    <p><strong>Nama lengkap:</strong> <?= $data['Name']; ?></p>
                    <p><strong>Nomor HP:</strong> <?= $data['Nohp']; ?></p>
                    <p><strong>Email:</strong> <?= $data['Email']; ?></p>
                    <p><strong>Tanggal lahir:</strong> <?= $data['Date']; ?></p>
                    <p><strong>Jenis kelamin:</strong> <?= $data['Gender']; ?></p>
                </div>
            </div>
            <div class="settings-section">
                <h3>Pengaturan</h3>
                <div class="setting-option">
                    <img src="/bahoitourismv2/asset/icon3/Password.png" alt="Ubah kata sandi">
                    <p>Ubah kata sandi</p>
                </div>
                <div class="setting-option">
                    <img src="/bahoitourismv2/asset/icon3/Translation.png" alt="Language">
                    <p>Language</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>© 2024. Seluruh hak cipta dilindungi undang - undang</p>
    </footer>
</body>

</html>