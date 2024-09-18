<?php
include '../../config/session.php';
include '../../config/getdatahs.php';
include '../../config/reviewhs.php';
include_once '../../config/alert.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homestay Jein</title>
    <link rel="stylesheet" href="list/hs.css" />
    <link rel="stylesheet" href="../review/review.css">
    <link rel="stylesheet" href="/bahoitourismv2/css/popup.css" />
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
                    <span class="user-name"><?= $_SESSION['username'] ?></span>
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
        <img src="/bahoitourismv2/asset/homestay/<?= $data['Foto1'] ?>" alt="Homestay Jein" class="main-image" />
        <div class="thumbnail-images">
            <img src="/bahoitourismv2/asset/homestay/<?= $data['Foto2'] ?? 'notfound.png' ?>" alt="Bedroom 1" class="thumbnail" />
            <img src="/bahoitourismv2/asset/homestay/<?= $data['Foto3'] ?? 'notfound.png' ?>" alt="Bedroom 2" class="thumbnail" />
        </div>
    </div>
    <div class="info">
        <div class="left">
            <h1><?= $data['Nama'] ?></h1>
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
            <button id="cekharga" class="btn">Lihat Paket</button>
        </div>
    </div>
    <div class="review-summary">
        <h2>Review</h2>
        <p class="summary-rating">
            <?= $avgdecimal ?>/5 <?= $descavg ?> <?= $datacount['countrating'] ?> Review
        </p>
    </div>

    <div class="reviewscomment">
        <button id="openReviewModal">Tulis review</button>
    </div>

    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Tulis Review Anda</h2>
            <form method="POST" action="">
                <input type="hidden" name="idhomestay" value="<?php echo htmlspecialchars($homestayData['id']); ?>">

                <p><?php echo htmlspecialchars($homestayData['nama']); ?></p>
                <label3 for="rating">Rating:</label3>
                <select id="rating" name="rating" required>
                    <option value="5">5 Bintang</option>
                    <option value="4">4 Bintang</option>
                    <option value="3">3 Bintang</option>
                    <option value="2">2 Bintang</option>
                    <option value="1">1 Bintang</option>
                </select>
                <labe3 for="review">Review:</labe3>
                <textarea id="review" name="review" required></textarea>
                <button type="submit">Kirim Review</button>
            </form>
        </div>
    </div>

    <?php if (isset($successMessage)): ?>
        <div class="success-message"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>

    <?php if (isset($errorMessage)): ?>
        <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php endif; ?>

    <div class="wrapper">
        <?php
        while ($datareview = mysqli_fetch_assoc($resultreview)) {
        ?>
            <?php include '../review/review.php'; ?>
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
            <?= $datapenukarantiket['Pentik'] ?>
        </div>
        <hr class="line" />
        <div class="section">
            <h3>
                <img src="/bahoitourismv2/asset/icon2/OrderCompleted.png" alt="Info Icon" class="icon" />
                Syarat & Ketentuan
            </h3>
            <?= $datasyaratketentuan['SnK'] ?>
        </div>
        <hr class="line" />
        <div class="section">
            <h3>
                <img src="/bahoitourismv2/asset/icon2/About.png" alt="Warning Icon" class="icon" />
                Informasi Tambahan
            </h3>
            <?= $datainformasitambahan['Infotambahan'] ?>
        </div>
        <hr class="line" />
        <div class="section">
            <h5>Fasilitas</h5>
            <div class="facilities">
                <?= $datafasilitas['Fasilitas'] ?>
            </div>
        </div>
    </div>
</div>

<?php include '../footer/footer.php'; ?>

<script src="/bahoitourismv2/js/js.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cekharga = document.getElementById("cekharga");

        function showAlert() {
            <?php
            if (empty($token)) {
            ?>
                alert('Silahkan Login Dahulu')
            <?php
            } else {
            ?>
                document.location.href = '../../../index.php';
            <?php
            }
            ?>
        }
        cekharga.addEventListener("click", showAlert);
    })
</script>
<script>
    const openReviewModal = document.getElementById('openReviewModal');
    const reviewModal = document.getElementById('reviewModal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const reviewForm = document.getElementById('reviewForm');

    openReviewModal.onclick = function() {
        reviewModal.style.display = "block";
    }

    closeBtn.onclick = function() {
        reviewModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == reviewModal) {
            reviewModal.style.display = "none";
        }
    }

    // reviewForm.onsubmit = function(e) {
    //     e.preventDefault();
    //     const name = document.getElementById('name').value;
    //     const rating = document.getElementById('rating').value;
    //     const review = document.getElementById('review').value;

    //     // Di sini Anda bisa menambahkan logika untuk mengirim data ke server
    //     console.log('Review submitted:', {
    //         name,
    //         rating,
    //         review
    //     });

    //     // Reset form dan tutup modal
    //     reviewForm.reset();
    //     reviewModal.style.display = "none";

    //     // Tampilkan pesan sukses (opsional)
    //     alert('Terima kasih atas review Anda!');
    // }
</script>
<script>
    function closeModal() {
        document.getElementById('reviewModal').style.display = 'none';
    }

    document.getElementById('reviewForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Di sini Anda bisa menambahkan kode untuk mengirim form menggunakan AJAX
        // Untuk contoh sederhana, kita hanya akan menutup modal
        closeModal();

        // Tampilkan pesan sukses (dalam praktik nyata, ini akan ditampilkan setelah respons AJAX)
        alert('Terima kasih atas review Anda!');
    });
</script>
</body>

</html>