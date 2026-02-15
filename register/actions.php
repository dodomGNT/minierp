<?php
// Membuat angka acak jika belum ada atau halaman di-refresh
if (!isset($_SESSION['reg_captcha_ans']) || $_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['reg_captcha_a'] = rand(1, 9);
    $_SESSION['reg_captcha_b'] = rand(1, 9);
    $_SESSION['reg_captcha_ans'] = $_SESSION['reg_captcha_a'] + $_SESSION['reg_captcha_b'];
}