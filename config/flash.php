<?php
// Pastikan sesi dimulai
if (!session_id())
  session_start();

// Tampilkan pesan flash
$successMessage = flash('success');
$errorMessage = flash('error');

if ($successMessage) {
  echo "<div class='custom-alert' id='successAlert'>
            <div class='custom-alert-content'>
                <span class='custom-alert-close' onclick='closeCustomAlert(\"successAlert\")'>&times;</span>
                <h2>Berhasil!</h2>
                <p>$successMessage</p>
                <button onclick='closeCustomAlert(\"successAlert\")'>Oke</button>
            </div>
          </div>";
}

if ($errorMessage) {
  echo "<div class='custom-alert' id='errorAlert'>
            <div class='custom-alert-content'>
                <span class='custom-alert-close' onclick='closeCustomAlert(\"errorAlert\")'>&times;</span>
                <h2>Gagal!</h2>
                <p>$errorMessage</p>
                <button onclick='closeCustomAlert(\"errorAlert\")'>Oke</button>
            </div>
          </div>";
}
?>