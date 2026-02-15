<?php
session_start();

// Jika SUDAH login tapi maksa buka halaman tamu, lempar ke dashboard
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: ../dashboard");
    exit;
}