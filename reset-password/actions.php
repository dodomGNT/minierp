<?php
// Inisialisasi Captcha khusus untuk reset password
if (!isset($_SESSION['reset_captcha_ans']) || $_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['reset_captcha_a'] = rand(1, 9);
    $_SESSION['reset_captcha_b'] = rand(1, 9);
    $_SESSION['reset_captcha_ans'] = $_SESSION['reset_captcha_a'] + $_SESSION['reset_captcha_b'];
}