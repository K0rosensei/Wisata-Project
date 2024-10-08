<?php
include '../../config/session.php';
include '../../config/getwisata.php';
include '../../config/reviewwisata.php';
include_once '../../config/alert.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/bahoitourismv2/css/Style4.css" />
  <link rel="stylesheet" href="../review/review.css">
  <link rel="stylesheet" href="/bahoitourismv2/css/popup.css" />
  <link rel="stylesheet" href="/bahoitourismv2/css/alert.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
  </header>

  <div class="judul">
    <h1>
      Liburan sekeluarga? Tidak<br />
      lengkap rasanya kalau tidak<br />
      mampir ke wisata mangrove<br />
      desa ekowisata bahoi<br />
    </h1>
  </div>

  <div class="container">
    <h1>Wisata Mangrove</h1>
    <div class="tour-container">
      <div class="collage-container">
        <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto1'] ?>" alt="Image 1" class="horizontal" />
        <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto2'] ?>" alt="Image 2" />
        <div class="vertical">
          <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto3'] ?>" alt="Image 3" />
          <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto4'] ?>" alt="Image 4" />
        </div>
        <div class="vertical">
          <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto5'] ?>" alt="Image 5" />
          <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto6'] ?>" alt="Image 6" />
        </div>
        <img src="/bahoitourismv2/asset/wisata/<?= $data['Foto7'] ?>" alt="Image 7" />
      </div>
      <div class="tour-info">
        <div class="tour-details">
          <h2><?= $data['Tempat'] ?></h2>
          <div class="rating">
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
        <div class="price">
          <span>Mulai dari <br></span>
          <span class="price-amount">Rp.<?= $data['Harga'] ?></span>
          <span>/Orang</span>
          <br>
          <button id="cekharga" class="book-now">Lihat Paket</button>
        </div>
      </div>

      <div id="alertAuth"></div>

      <div class="reviewscomment">
        <button id="openReviewModal">Tulis review</button>
      </div>

      <div id="reviewModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <h2>Tulis Review Anda</h2>
          <form method="POST" action="">
            <input type="hidden" name="idhomestay" value="<?php echo htmlspecialchars($data['Id']); ?>">

            <p><?php echo htmlspecialchars($data['Tempat']); ?></p>
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

      <div class="wrapper">
        <?php
        while ($datareview = mysqli_fetch_assoc($resultreview)) {
        ?>
          <?php include '../review/review.php'; ?>
        <?php
        }
        ?>
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
              document.location.href = '../../index.php';
            <?php
            }
            ?>
          }
          cekharga.addEventListener("click", showAlert);
        })
      </script>
</body>

</html>