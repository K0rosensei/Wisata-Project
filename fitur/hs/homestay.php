<?php
include '../../config/session.php';
include '../../config/getdatahs.php';
include_once '../../config/alert.php';
include '../../config/flash.php';
include '../../config/search.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/bahoitourismv2/css/Style2.css" />
  <link rel="stylesheet" href="/bahoitourismv2/css/popup.css" />
  <title>Document</title>
</head>

<body>
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

    <div class="search-bar">
      <button>
        <img src="/bahoitourismv2/asset/icon1/search.png" alt="Search" />
      </button>
      <form action="">
      <input type="text" placeholder="Homestay" name="search"/>
      </form>
    </div>
  </header>

  <div class="judul">
    <h1>
      Mau Menginap? Silahkan<br />
      cari homestay sesuai<br />
      keinginan kamu
    </h1>
  </div>
  <div class="container">
    <h1>Semua Homestay</h1>
    <div class="homestay-grid">
      <?php
      while ($data = mysqli_fetch_assoc($result)) {
        // Hitung avgdecimal berdasarkan hasil query
        $avgdecimal = round($data['avg_rating'], 1);
      ?>
        <div class="homestay-card">
          <img src="/bahoitourismv2/asset/homestay/<?= $data['Foto1'] ?>" alt="Homestay Amelia" />
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
          <a onclick="window.location.href='detail.php?id=<?php echo $data['Id']; ?>';"><button>Pesan Sekarang</button></a>
        </div>
      <?php
      }
      ?>
    </div>
    
    <?php include '../footer/footer.php'; ?>

    <script src="/bahoitourismv2/js/js.js"></script>
</body>

</html>
