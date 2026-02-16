<?php
// Masukkan file class database tadi (asumsi namanya CoreDatabase.php)
require_once('../core_database.php');

// 1. Logika untuk Request AJAX (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    header('Content-Type: application/json');
    
    $db = new CoreDatabase();

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $user_captcha = $_POST['captcha_input'] ?? '';
    $correct_ans = $_SESSION['captcha_ans'] ?? 0;

    $response = []; // Inisialisasi array response

    // Cek Captcha dulu
    if ($user_captcha != $correct_ans) {
        $response = ["status" => "error", "message" => "Jawaban keamanan salah!"];
    } else {
        // 2. Cari User menggunakan class CoreDatabase
        $db->query("SELECT * FROM users WHERE email = :email");
        $db->bind(':email', $email);
        $user = $db->single();

        if ($user) {
            // 3. Verifikasi Password (asumsi pakai password_hash)
            if (password_verify($password, $user->password)) {
                session_regenerate_id(true);
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_email'] = $user->email;

                // SIMPAN SIDIK JARI BROWSER
                $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

                $response = ["status" => "success", "message" => "Berhasil masuk!"];
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Password salah!']);
            }
        } else {
            // Jika user tidak ditemukan, tetap beri response error yang sama
            // untuk menghindari informasi tentang keberadaan email
            $response = ["status" => "error", "message" => "Email atau password salah!"];
        }
    }

    // PENTING: Selalu buat angka baru setelah submit (baik sukses maupun gagal)
    // agar captcha berubah secara real-time via AJAX
    generateNewCaptcha();
    $response['new_captcha'] = $_SESSION['captcha_a'] . " + " . $_SESSION['captcha_b'];
    
    echo json_encode($response);
    exit; // Berhenti di sini untuk request AJAX
}

// 2. Logika untuk Refresh Halaman (GET)
// Jika diakses langsung/refresh, buat captcha baru
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    generateNewCaptcha();
}

function generateNewCaptcha() {
    $_SESSION['captcha_a'] = rand(1, 9);
    $_SESSION['captcha_b'] = rand(1, 9);
    $_SESSION['captcha_ans'] = $_SESSION['captcha_a'] + $_SESSION['captcha_b'];
}