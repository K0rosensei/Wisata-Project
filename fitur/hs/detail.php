<?php
include '../../config/session.php';
include '../../config/getdatahs.php';
$nama = $data['Nama'];
$foto1 = $data['Foto1'];
$foto2 = $data['Foto2'];
$foto3 = $data['Foto3'];
include '../../config/readaccount.php';
$fullname = $data['Fullname'];
require_once '../../config/payment.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homestay Jein</title>
    <link rel="stylesheet" href="list/hs.css" />
    <link rel="stylesheet" href="/bahoitourismv2/css/popup.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://app.sandbox.midtrans.com/snap/v2/transactions"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?= \Midtrans\Config::$clientKey ?>"></script>
</head>
<header>
    <nav>
        <ul>
            <li class="logo"><img src="../../asset/icon1/Logo1.png" alt="Logo" /></li>
            <li class="name"><a href="../../index.php">Bahoi Tourism</a></li>
            <li class="spacer"></li>
            <li class="center"><a href="../../index.php">Beranda</a></li>
            <li class="center"><a href="../../config/logout.php">Kontak</a></li>
            <li class="spacer"></li>
            <?php
            if (empty($token)) {
            ?>
            <li id="loginButton" class="button">
                <button id="showLoginBtn" class="masuk">
                    <img src="../../asset/icon1/User.png" alt="User Icon" class="icon" />Masuk
                </button>
            </li>
            <li id="registerButton" class="button">
                <button id="showRegisterBtn" class="daftar">Daftar</button>
            </li>
            <?php
            } else {
            ?>
            <li id="pemesananButton" class="center"><a href="fitur/pesan/pemesanan.php">Pemesanan</a>
            </li>
            <li id="usernameDisplay" class="username">
                <img src="../../asset/icon1/User.png" alt="User Icon" class="user-icon" />
                <span class="user-name"><?= $fullname; ?></span>
            </li>
            <?php
            }
            ?>
        </ul>
    </nav>

    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form id="loginForm" action="../../config/login.php" method="post">
                <div class="input-group">
                    <input type="email" name="email" id="loginEmail" required />
                    <label for="loginEmail">Email</label>
                    <img src="asset/icon2/Email.png" alt="Email Icon" class="input-icon" />
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="loginPassword" required />
                    <label for="loginPassword">Password</label>
                    <img src="asset/icon2/Lock.png" alt="Lock Icon" class="input-icon" />
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="remember" />
                    <label1 for="remember" class="label1">Remember me</label1>
                    <a href="#" class="forget-password">Forget Password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
            <p class="register-link">
                Don't have an account?
                <a href="#" id="showRegisterLink">Register</a>
            </p>
        </div>
    </div>

    <div id="registrationPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Registration</h2>
            <form id="registrationForm" action="../config/signup.php" method="post">
                <div class="input-group">
                    <input type="text" id="registerName" name="registerName" required />
                    <label for="registerName">Name</label>
                    <img src="/bahoitourismv2/asset/icon2/User.png" alt="User Icon" class="input-icon" />
                </div>
                <div class="input-group">
                    <input type="email" id="registerEmail" name="registerEmail" required />
                    <label for="registerEmail">Email</label>
                    <img src="/bahoitourismv2/asset/icon2/Email.png" alt="Email Icon" class="input-icon" />
                </div>
                <div class="input-group">
                    <input type="password" id="registerPassword" name="registerPassword" required />
                    <label for="registerPassword">Password</label>
                    <img src="/bahoitourismv2/asset/icon2/Lock.png" alt="Lock Icon" class="input-icon" />
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" required />
                    <label1 for="terms" class="label2">I agree to the Terms & Conditions</label1>
                </div>
                <button type="submit">Registration</button>
            </form>
            <p class="login-link">
                Already have an account? <a href="#" id="showLoginLink">Login</a>
            </p>
        </div>
    </div>

</header>

<div class="container">
    <div class="images">
        <img src="/bahoitourismv2/asset/homestay/<?= $foto1 ?>" alt="Homestay Jein" class="main-image" />
        <div class="thumbnail-images">
            <img src="/bahoitourismv2/asset/homestay/<?= $foto2 ?? 'notfound.png' ?>" alt="Bedroom 1"
                class="thumbnail" />
            <img src="/bahoitourismv2/asset/homestay/<?= $foto3 ?? 'notfound.png' ?>" alt="Bedroom 2"
                class="thumbnail" />
        </div>
    </div>
    <div class="info">
        <div class="left">
            <h1><?= $nama ?></h1>
            <input type="hidden" id="nama" value="<?= $nama ?>">
            <input type="hidden" id="id_user" value="<?= $id_user ?>">
            <div class="rating-container">
                <span class="stars">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $starsRating) {
                            echo '<span class="star">&#9733;</span>';
                        } else {
                            echo '<span class="star">&#9734;</span>';
                        }
                    }
                    ?>
                </span>
                <span class="rating"><?= $avgdecimal ?>/5 (<?= $datacountuser['countuser'] ?> Review)</span>
            </div>
        </div>
        <div class="right">
            <p class="price">
                Mulai dari <br />
                <span>RP. 150.000</span> <br />
                /Orang/Malam
            </p>
            <input type="hidden" id="id-product" value="<?= $data['Id'] ?>">
            <!-- <input type="hidden" id="harga" value="<?= $data['Harga'] ?>"> -->
            <input type="hidden" id="harga" value="150000">
            <button id="cekharga" class="btn">Lihat Paket</button>
        </div>
    </div>
    <div class="review-summary">
        <h2>Review</h2>
        <p class="summary-rating">
            <?= $avgdecimal ?>/5 <?= $descavg ?> <?= $datacount['countrating'] ?> Review
        </p>
    </div>
    <div class="reviews-navigation">
        <img src="/bahoitourismv2/asset/icon2/BackArrow.png" alt="Previous" class="prev-reviews" />
        <img src="/bahoitourismv2/asset/icon2/NextArrow.png" alt="Next" class="next-reviews" />
    </div>
    <div class="reviews">
        <?php
        while ($datareview = mysqli_fetch_assoc($resultreview)) {
        ?>
        <div class="review-card">
            <div class="review-header">
                <div class="review-rating"><?= $datareview['Rating'] ?>/5 ★★★★★</div>
                <div class="review-date"><?= $datareview['Tanggal'] ?></div>
            </div>
            <div class="review-text">
                <?= $datareview['Review'] ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="location-map">
        <h4>Lokasi</h4>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4481621380357!2d106.80161381533532!3d-6.230364995483137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f430f0c192f5%3A0x50ef6a9a7c11d81!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1627403989750!5m2!1sen!2sid"
            width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
        <div class="keterangan">
            <img src="/bahoitourismv2/asset/icon2/PlaceMarker.png" alt="">
            <p>jein, Bahoi Jaga I, Likupang Barat,<br />
                Minahasa Utara, Sulawesi Utara <br>
                Indonesia</p>
        </div>
    </div>

    <div class="info-lainnya">
        <h2>Info Lainnya</h2>
        <div class="section">
            <h3>
                <img src="/bahoitourismv2/asset/icon2/GivingTickets.png" alt="Ticket Icon" class="icon" />
                Penukaran Tiket
            </h3>
            <ul>
                <li>Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li>
            </ul>
        </div>
        <hr class="line" />
        <div class="section">
            <h3>
                <img src="/bahoitourismv2/asset/icon2/OrderCompleted.png" alt="Info Icon" class="icon" />
                Syarat & Ketentuan
            </h3>
            <h4>Umum</h4>
            <ul>
                <li>Harga termasuk pajak.</li>
                <li>
                    Tiket yang sudah dibeli bisa dicancel apabila memenuhi
                    persyaratan.
                </li>
                <li>
                    Pelanggan harus mengisi data pribadi dengan benar saat membuat
                    booking. Jika data pribadi yang diberikan salah, maka e-tiket
                    tidak akan dapat diterima.
                </li>
                <li>
                    Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh
                    bahoitourism dengan mengikuti kebijakan dari pengelola wisata.
                </li>
            </ul>
            <h4>E-Tiket</h4>
            <ul>
                <li>
                    E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun
                    seluruhnya.
                </li>
            </ul>
        </div>
        <hr class="line" />
        <div class="section">
            <h3>
                <img src="/bahoitourismv2/asset/icon2/About.png" alt="Warning Icon" class="icon" />
                Informasi Tambahan
            </h3>
            <ul>
                <li>
                    Akan dikenakan denda apabila merusak/membawa pulang barang dari
                    homestay.
                </li>
                <li>Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li>
            </ul>
        </div>
        <hr class="line" />
        <div class="section">
            <h5>Fasilitas</h5>
            <div class="facilities">
                <div class="facility-item">
                    <img src="/bahoitourismv2/asset/icon2/Parking.png" alt="Parking Icon" class="icon" />
                    <span>Parkir</span>
                </div>
                <div class="facility-item">
                    <img src="/bahoitourismv2/asset/icon2/Noodles.png" alt="Breakfast Icon" class="icon" />
                    <span>Sarapan</span>
                </div>
                <div class="facility-item">
                    <img src="/bahoitourismv2/asset/icon2/Toilet.png" alt="Toilet Icon" class="icon" />
                    <span>Toilet/WC/Kamar Mandi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-about">
        <h3>About Bahoi Tourism</h3>
        <ul>
            <li>Cara Memesan</li>
            <li>Cara Membatalkan</li>
            <li>Pusat Bantuan</li>
            <li>Kupon</li>
            <li>About Us</li>
        </ul>
    </div>
    <div class="footer-links">
        <h3>Ikuti Kami di</h3>
        <ul class="social-icons">
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/facebook.png" alt="Facebook" /> Facebook</a>
            </li>
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/Instagram.png" alt="Instagram" /> Instagram</a>
            </li>
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/Telegram.png" alt="Telegram" /> Telegram</a>
            </li>
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/Whatsapp.png" alt="WhatsApp" /> WhatsApp</a>
            </li>
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/Yt.png" alt="Youtube" /> Youtube</a>
            </li>
            <li>
                <a href="#"><img src="/bahoitourismv2/asset/icon4/Tiktok.png" alt="Tiktok" /> Tiktok</a>
            </li>
        </ul>
    </div>
    <div class="footer-qr">
        <h3>QR code</h3>
        <img src="/bahoitourismv2/asset/icon4/qrcode.jpeg" alt="Scan untuk terhubung ke grup WhatsApp" />
        <p>Scan untuk terhubung ke grup WhatsApp</p>
    </div>
    <div style="clear: both"></div>
</footer>

<div class="copyright">
    <p>
        Hak Cipta © 2024 Bahoi Tourism. Seluruh hak cipta dilindungi undang -
        undang
    </p>
</div>

<script src="/bahoitourismv2/js/js.js"></script>
<script src="../../js/paymentSetting.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const cekharga = document.getElementById("cekharga");


    function showAlert() {
        <?php
            if (empty($token)) {
            ?>
        alert('Silahkan Login Dahulu');
        <?php
            } else {
            ?>
        getPayment();
        // window.location.href = '../pesan/pemesanan.php';
        <?php
            }
            ?>
    }
    cekharga.addEventListener("click", showAlert);
})
</script>
</body>

</html>