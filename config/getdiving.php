<?php
include 'config.php';
include_once 'alert.php';

// Pastikan sesi dimulai
if (!session_id()) session_start();

$iduser = $_SESSION['iduser'];
$query = "
SELECT diving.*, cekpesan.iduser as already_ordered 
FROM diving 
LEFT JOIN cekpesan ON diving.Id = cekpesan.idpesanan AND cekpesan.iduser = $iduser AND cekpesan.tipepesanan = 'diving'
";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pesansaja'])) {
        $idpesan = $_POST['id'];
        $query = "UPDATE diving SET Jumlah = Jumlah - 1 WHERE Id = $idpesan";
        $resultjumlah = mysqli_query($conn, $query);
        if ($resultjumlah) {
            $query = "INSERT INTO cekpesan (tipepesanan, idpesanan, iduser) VALUES ('diving', $idpesan, $iduser)";
            $resultpesan = mysqli_query($conn, $query);
            if ($resultpesan) {
                flash('success', 'Pesan Diving Berhasil Dipesan');
            } else {
                flash('error', 'Pesan Diving Gagal Dipesan');
            }
        } else {
            flash('error', 'Pesan Diving Gagal');
        }
        header("Location: diving.php"); // Redirect untuk mencegah pengiriman ulang formulir
        exit();
    }
    if (isset($_POST['batalsaja'])) {
        $idpesan = $_POST['id'];
        $query = "UPDATE diving SET Jumlah = Jumlah + 1 WHERE Id = $idpesan";
        $resultjumlah = mysqli_query($conn, $query);
        if ($resultjumlah) {
            $query = "DELETE FROM cekpesan WHERE idpesanan = $idpesan AND iduser = $iduser AND tipepesanan = 'diving'";
            $resultpesan = mysqli_query($conn, $query);
            if ($resultpesan) {
                flash('success', 'Pesan Diving Telah Dibatalkan');
            } else {
                flash('error', 'Pesan Diving Gagal Dibatalkan');
            }
        } else {
            flash('error', 'Pesan Diving Gagal');
        }
        header("Location: diving.php"); // Redirect untuk mencegah pengiriman ulang formulir
        exit();
    }
}
?>