<?php
session_start();

// Jika TIDAK ada session, tendang ke login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: ../login");
    exit;
}

// 2. Cek apakah User Agent berubah (Celah Session Hijacking)
if ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    // Jika tidak cocok, kemungkinan besar sesi dicuri!
    session_unset();
    session_destroy();
    header("Location: ../login/index.php?status=security_alert");
    exit;
}