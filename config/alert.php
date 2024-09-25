<?php
function flash($name, $text = '') {
    if (!session_id()) session_start(); // Memulai sesi jika belum dimulai

    if (!empty($text)) {
        $_SESSION[$name] = $text;
    } elseif (isset($_SESSION[$name])) {
        $msg = $_SESSION[$name];
        unset($_SESSION[$name]); // Menghapus pesan setelah ditampilkan sekali
        return $msg;
    }
    return '';
}
?>