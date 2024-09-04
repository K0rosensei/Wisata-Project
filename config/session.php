<?php
session_start();
// mengecek admin login atau tidak
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $username = $_SESSION['username'];
    $id_user = $_SESSION['id'];
    // var_dump($_SESSION['token']);
    return false;
}