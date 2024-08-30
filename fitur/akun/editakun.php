<?php
include '../../config/session.php';
include '../../config/readaccount.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homestay Jein</title>
    <link rel="stylesheet" href="editakun.css" />
    <script src="../../js/account.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
            <h2>Pengaturan</h2>
            <p>Semua informasi di sini digunakan di Bohai Tourism</p>
            <div class="edit-account">
                <h3>Masukkan Kata Sandi Saat Ini</h3>
                <div class="input-group">
                    <label for="full-name">Nama lengkap</label>
                    <input type="text" id="full-name" value="<?= $data['Fullname']; ?>" disabled>
                    <input type="hidden" id="user" value="<?= $_SESSION['username']; ?>">
                    <button class="edit-button" onclick="getName()"><img src="/bahoitourismv2/asset/icon3/edit.png"
                            alt=""></button>
                </div>
                <div class="input-group">
                    <label for="birth-date">Tanggal lahir</label>
                    <input type="date" id="birth-date"
                        value="<?= isset($data['Date']) ? date('Y-m-d', strtotime($data['Date'])) : ''; ?>">
                    <button class="edit-button" onclick="getDate()"><img
                            src="/bahoitourismv2/asset/icon3/GoogleCalendar.png" alt=""></button>
                </div>
                <div class="input-group">
                    <label for="dropdown">Pilih opsi:</label>
                    <select id="dropdown" name="dropdown">
                        <option value="">- Pilih -</option>
                        <option value="laki-laki" <?= $data['Gender'] === 'laki-laki' ? 'selected' : ''; ?>>Laki-laki
                        </option>
                        <option value="perempuan" <?= $data['Gender'] === 'perempuan' ? 'selected' : ''; ?>>Perempuan
                        </option>
                    </select>
                    <button class="edit-button" onclick="getGender()"><img
                            src="/bahoitourismv2/asset/icon3/ChevronLeft.png" alt=""></button>
                </div>
            </div>
            <div class="contact-info">
                <h3>Nomor HP dan Email</h3>
                <div class="info-item">
                    <div class="info-content">
                        <p><?= $data['Nohp']; ?></p>
                        <span class="verification-status"><img src="/bahoitourismv2/asset/icon3/Approval.png"
                                alt="Verified"> <?= $statusHp ?></span>
                    </div>
                    <button class="edit-button" onclick="getNumber()">Ubah</button>
                </div>
                <div class="info-item">
                    <div class="info-content">
                        <p><?= $data['Email']; ?></p>
                        <span class="verification-status"><img src="/bahoitourismv2/asset/icon3/Approval.png"
                                alt="Verified"> Sudah diverifikasi</span>
                    </div>
                    <button class="edit-button" onclick="getEmail()">Ubah</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>© 2024. Seluruh hak cipta dilindungi undang - undang</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </script>
</body>

</html>