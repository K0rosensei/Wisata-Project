<?php
include 'config/session.php';
include 'config/bestreview.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/Style1.css" />
  <link rel="stylesheet" href="css/popup.css" />
  <title>Bahoi Tourism</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li class="logo"><img src="asset/icon1/Logo1.png" alt="Logo" /></li>
        <li class="name"><a href="index.php">Bahoi Tourism</a></li>
        <li class="spacer"></li>
        <li class="center"><a href="index.php">Beranda</a></li>
        <li class="center"><a href="config/logout.php">Kontak</a></li>
        <li class="spacer"></li>
        <?php
        if (empty($token)) {
          ?>
          <li id="loginButton" class="button">
            <button id="showLoginBtn" class="masuk">
              <img src="asset/icon1/User.png" alt="User Icon" class="icon" />Masuk
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
            <a href="fitur/akun/akunsaya.php">
              <img src="asset/icon1/User.png" alt="User Icon" class="user-icon" />
              <span class="user-name"><?= $_SESSION['username'] ?></span>
            </a>
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
        <form id="loginForm" action="config/login.php" method="post">
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
        <form id="registrationForm" action="config/signup.php" method="post">
          <div class="input-group">
            <input type="text" id="registerName" name="registerName" required />
            <label for="registerName">Name</label>
            <img src="asset/icon2/User.png" alt="User Icon" class="input-icon" />
          </div>
          <div class="input-group">
            <input type="email" id="registerEmail" name="registerEmail" required />
            <label for="registerEmail">Email</label>
            <img src="asset/icon2/Email.png" alt="Email Icon" class="input-icon" />
          </div>
          <div class="input-group">
            <input type="password" id="registerPassword" name="registerPassword" required />
            <label for="registerPassword">Password</label>
            <img src="asset/icon2/Lock.png" alt="Lock Icon" class="input-icon" />
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

    <div class="header-container">
      <h1>Hai, mau liburan sekeluarga?</h1>
      <div class="search-bar">
        <input type="text" placeholder="Homestay" />
        <button>
          <img src="asset/icon1/search.png" alt="Search" />
        </button>
      </div>
      <div class="icon-container">
        <div class="icon-row">
          <div class="icon">
            <a href="fitur/hs/homestay.php"><img src="asset/icon1/homestay.png" alt="Homestay" />
              <p>Homestay</p>
            </a>
          </div>
          <div class="icon">
            <a href="fitur/diving/diving.php"><img src="asset/icon1/diving.png" alt="Diving & Snorkeling" />
              <p>Diving & Snorkeling</p>
            </a>
          </div>
          <div class="icon">
            <a href="fitur/wisata/mangrove.php">
              <img src="asset/icon1/mangrove.png" alt="Wisata Mangrove" />
              <p>Wisata Mangrove</p>
            </a>
          </div>
          <div class="icon">
            <img src="asset/icon1/kuliner.png" alt="Kuliner" />
            <p>Kuliner</p>
          </div>
        </div>
        <div class="icon-row">
          <div class="icon">
            <img src="asset/icon1/budaya.png" alt="Budaya" />
            <p>Budaya</p>
          </div>
          <div class="icon">
            <img src="asset/icon1/mancing.png" alt="Wisata Mancing" />
            <p>Wisata Mancing</p>
          </div>
          <div class="icon">
            <img src="asset/icon1/trip.png" alt="Trip Antar Pulau" />
            <p>Trip Antar Pulau</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container" id="homestay">
    <h1>Rekomendasi Homestay</h1>
    <h2>Berdasarkan review teratas</h2>
    <div class="homestay-grid">
      <?php
      while ($data = mysqli_fetch_assoc($result)) {
        // Hitung avgdecimal berdasarkan hasil query
        $avgdecimal = round($data['avg_rating'], 1);
        ?>
        <div class="homestay-card">
          <img src="asset/homestay/<?= $data['Foto1'] ?>" alt="Homestay Aget" />
          <h3><?= $data['Nama'] ?></h3>
          <p><?= $data['Desk'] ?></p>
          <div class="info">
            <div class="rating">
              <span class="stars">
                <?php
                // Tampilkan bintang berdasarkan nilai rating
                $starsRating = round($data['avg_rating']);
                for ($i = 0; $i < 5; $i++) {
                  if ($i < $starsRating) {
                    echo '★'; // Full star
                  } else {
                    echo '☆'; // Empty star
                  }
                }
                ?>
              </span>
              <span><?= $avgdecimal ?>/5</span>
            </div>
            <div class="details">
              <p>Maksimal <?= $data['Kapasitas'] ?> Orang</p>
              <p class="price">Rp. <?= $data['Harga'] ?>/Malam /Org</p>
            </div>
          </div>
          <a href="fitur/hs/detail.php?id=1"><button>Pesan Sekarang</button></a>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="view-all">
        <a href="fitur/hs/homestay.php"><button>Lihat Semua</button></a>
      </div>

    <div class="owner" id="kontak">
      <div>
        <img src="asset/icon1/DekiTamamilang.png" alt="" />
        <h4>Dekky Tamamilang</h4>
        <p>Sekretaris Desa</p>
        <div class="contact">
          <img src="asset/icon1/fb.png" alt="Facebook" />
          <img src="asset/icon1/ig.png" alt="Instagram" />
          <img src="asset/icon1/wa.png" alt="WhatsApp" />
        </div>
      </div>
      <div>
        <img src="asset/icon1/JecelineMelvandaDalero.png" alt="" />
        <h4>Jaceline M. Dalero</h4>
        <p>Ketua Pengelola Homestay</p>
        <div class="contact">
          <img src="asset/icon1/fb.png" alt="Facebook" />
          <img src="asset/icon1/ig.png" alt="Instagram" />
          <img src="asset/icon1/wa.png" alt="WhatsApp" />
        </div>
      </div>
      <div>
        <img src="asset/icon1/OIP.png" alt="" />
        <h4>Maxi Lahading (the monster)</h4>
        <p>Pengelola Daerah Perlindungan Laut</p>
        <div class="contact">
          <img src="asset/icon1/fb.png" alt="Facebook" />
          <img src="asset/icon1/ig.png" alt="Instagram" />
          <img src="asset/icon1/wa.png" alt="WhatsApp" />
        </div>
      </div>
    </div>

    <div class="location-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8540.987556656964!2d125.0123935377705!3d1.7209034284464684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287b9c99f133b2b%3A0xe42b6e3af1c2237a!2sBahoi%2C%20Kec.%20Likupang%20Bar.%2C%20Kabupaten%20Minahasa%20Utara%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1724567597955!5m2!1sid!2sid"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php
    include 'fitur/footer/footer.php';
    ?>

    <script src="js/js.js"></script>
</body>

</html>