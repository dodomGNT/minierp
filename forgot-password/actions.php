<?php
// Inisialisasi Captcha jika belum ada atau halaman di-refresh
if (!isset($_SESSION['forgot_captcha_ans']) || $_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['forgot_captcha_a'] = rand(1, 9);
    $_SESSION['forgot_captcha_b'] = rand(1, 9);
    $_SESSION['forgot_captcha_ans'] = $_SESSION['forgot_captcha_a'] + $_SESSION['forgot_captcha_b'];
}